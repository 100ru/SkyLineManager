<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drop_flight</title>
</head>
<body>
<button><a href="index.html">Back</button></a> 




<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "dbms";

// Create connection
$conn = new mysqli("localhost:3306", "root", "", "dbms");

// Table name to drop (you can change it according to your requirements)
$tableName = "flight";

// Construct the SQL query
$sql = "DROP TABLE IF EXISTS $tableName";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table $tableName dropped successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
</body>
</html>
