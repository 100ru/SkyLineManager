<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger List - No Bookings</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ffafbd, #ffc3a0, #ffafbd, #ffc3a0);
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
            color: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h2 {
            color: white;
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 80%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        th, td {
            padding: 15px;
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
            cursor: pointer;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #c0392b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<h2>Passenger Names Without Any Bookings</h2>

<table border="2" cellspacing="7">
    <thead>
        <tr>
            <th>Passenger Name</th>
        </tr>
    </thead>
    <tbody>
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

        $sql1 = "SELECT p_name FROM passenger WHERE p_id NOT IN (SELECT p_id FROM booking)";
        if ($res = mysqli_query($conn, $sql1)) { 
            while ($row = mysqli_fetch_array($res)) { 
                echo "<tr>"; 
                echo "<td>".$row['p_name']."</td>"; 
                echo "</tr>";
            } 
        } else { 
            echo "<tr><td>No matching records found.</td></tr>"; 
        }

        mysqli_close($conn); 
        ?>
    </tbody>
</table>

<button><a href="index.html#all_query">Back</a></button>

</body>
</html>
