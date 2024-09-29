<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger List with Animation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #34495e;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        th {
            background-color: #3498db;
            color: white;
            position: relative;
        }

        th::after {
            content: '';
            display: block;
            height: 2px;
            background: #2980b9;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        tr {
            opacity: 0;
            transform: translateY(-30px);
            transition: transform 0.6s ease-out, opacity 0.6s ease-out;
        }

        tr.show {
            opacity: 1;
            transform: translateY(0);
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

<h2>Passenger Names for Passengers Who Have Bookings on At Least One Flight</h2>

<table>
    <thead>
        <tr>
            <th>Passenger Name</th>
        </tr>
    </thead>
    <tbody id="passengerData">
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

        $sql1 = "SELECT DISTINCT p.p_name 
        FROM passenger p 
        JOIN booking b ON p.p_id = b.p_id;";

        if ($res = mysqli_query($conn, $sql1)) {
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['p_name']) . "</td>"; // Added htmlspecialchars for security
                echo "</tr>";
            }
        } else {
            echo "<tr><td>No matching records are found.</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </tbody>
</table>

<button><a href="index.html#all_query">Back</a></button>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            setTimeout(() => {
                row.classList.add('show');
            }, index * 150); // Delay between each row animation for a staggered effect
        });
    });
</script>

</body>
</html>
