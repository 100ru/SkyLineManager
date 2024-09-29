<?php
// Establish a connection to the database
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "dbms";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// 1. Get the complete details of all flights to New Delhi
$query1 = "SELECT * FROM flight WHERE Destination = 'New Delhi'";
$result1 = $conn->query($query1)->fetchAll(PDO::FETCH_ASSOC);

// 2. Get the details about all flights from Chennai to New Delhi
$query2 = "SELECT * FROM flight WHERE Source = 'Chennai' AND Destination = 'New Delhi'";
$result2 = $conn->query($query2)->fetchAll(PDO::FETCH_ASSOC);

// 3. Find only the flight numbers for the passenger with pid 123 for flights to Chennai before 06/11/2020
//$query3 = "SELECT f_id FROM booking WHERE p_id = 123 AND f_date ='2020-06-11' AND Destination = 'Chennai'";
//$result3 = $conn->query($query3)->fetchAll(PDO::FETCH_ASSOC);

// 4. Find the passenger names for passengers who have bookings on at least one flight
$query4 = "SELECT DISTINCT p_name FROM passenger WHERE p_id IN (SELECT p_id FROM booking)";
$result4 = $conn->query($query4)->fetchAll(PDO::FETCH_ASSOC);

// 5. Find the passenger names for those who do not have any bookings in any flights
$query5 = "SELECT p_name FROM passenger WHERE p_id NOT IN (SELECT p_id FROM booking)";
$result5 = $conn->query($query5)->fetchAll(PDO::FETCH_ASSOC);

// 6. Find the agency names for agencies located in the same city as the passenger with passenger id 123
$query6 = "SELECT a_name FROM agency WHERE a_city = (SELECT p_city FROM passenger WHERE p_id = 123)";
$result6 = $conn->query($query6)->fetchAll(PDO::FETCH_ASSOC);

// 7. Get the details of flights that are scheduled on both dates 01/12/2020 and 02/12/2020 at 16:00 hours
$query7 = "SELECT * FROM flight WHERE (f_date = '2020-12-01' OR f_date = '2020-12-02') AND f_time = '16:00'";
$result7 = $conn->query($query7)->fetchAll(PDO::FETCH_ASSOC);

// 8. Get the details of flights that are scheduled on either of the dates 01/12/2020 or 02/12/2020 or both at 16:00 hours
$query8 = "SELECT * FROM flight WHERE (f_date = '2020-12-01' OR f_date = '2020-12-02') AND f_time = '16:00'";
$result8 = $conn->query($query8)->fetchAll(PDO::FETCH_ASSOC);

// 9. Find the agency names for agencies that do not have any bookings for the passenger with id 123
//$query9 = "SELECT a_name FROM a_gency WHERE a_id NOT IN (SELECT a_id FROM booking WHERE p_id = 123)";
//$result9 = $conn->query($query9)->fetchAll(PDO::FETCH);