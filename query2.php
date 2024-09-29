<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details with Animation</title>
    <style>
        /* Animate background color for the rows */
        @keyframes colorChange {
            0% {
                background-color: #f0f8ff;
            }
            50% {
                background-color: #add8e6;
            }
            100% {
                background-color: #f0f8ff;
            }
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 2px solid #dddddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        /* Apply animation to rows */
        tr {
            animation: colorChange 5s infinite;
        }

        /* Add hover effect for rows */
        tr:hover {
            background-color: #ffa;
            transition: background-color 0.5s ease;
        }

        /* Styling the Back button */
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: white;
        }

    </style>
</head>
<body>
    <h2>Details about all flights from Chennai to New Delhi</h2>
    <table border="2" cellspacing="7">
        <tr>
            <th>Flight ID</th>
            <th>Flight Date</th>
            <th>Flight Time</th>
            <th>Flight Source</th>
            <th>Flight Destination</th>
        </tr>
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

        // Query to fetch flights from Chennai to New Delhi
        $sql1 = "SELECT * FROM flight WHERE Source='Chennai' AND Destination='New Delhi';";
        if ($res = mysqli_query($conn, $sql1)) {
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['f_id'] . "</td>";
                echo "<td>" . $row['f_date'] . "</td>";
                echo "<td>" . $row['f_time'] . "</td>";
                echo "<td>" . $row['Source'] . "</td>";
                echo "<td>" . $row['Destination'] . "</td>";
                echo "</tr>";
            }
            mysqli_free_result($res);
        } else {
            echo "<tr><td colspan='5'>No matching records found.</td></tr>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </table>

    <button><a href="index.html#all_query">Back</a></button>

</body>
</html>
