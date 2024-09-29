<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Query Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            margin: 20px;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: scale(0.95);
            transition: transform 0.5s ease-out, opacity 0.5s ease-out;
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d1ecf1;
        }

        table.show {
            opacity: 1;
            transform: scale(1);
        }

        button {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <h2>Flight Numbers for Passenger with ID 123 (Chennai Flights before 06/11/2020)</h2>

    <table border="2" cellspacing="7">
        <thead>
            <tr>
                <th>f_id</th>
            </tr>
        </thead>
        <tbody id="flightData">
        </tbody>
    </table>

    <button><a href="index.html#all_query">Back</a></button>

    <script>
        // This will ensure the table appears with the fade and zoom effect
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.querySelector("table");
            setTimeout(() => {
                table.classList.add("show");
            }, 100); // Delay to ensure animation is visible
        });
    </script>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = "SELECT f.f_id FROM flight f JOIN booking b ON f.f_id = b.f_id WHERE b.p_id = 123 AND f.Destination = 'Chennai' AND f.f_date < '2020-11-06';
";
if ($res = mysqli_query($conn, $sql1)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<tr>"; 
        echo "<td>Flight ID</td>"; 
        echo "</tr>"; 

        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['f_id']."</td>"; 			
            echo "</tr>";
        } 
        echo "</table>"; 
    } else { 
        echo "No matching records are found."; 
    } 
} else { 
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn); 
} 

mysqli_close($conn); 
?> 
</body>
</html>
