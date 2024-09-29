<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Details with Slide-in Animation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            border-bottom: 2px solid #ddd;
        }

        tr {
            transform: translateX(-100%);
            opacity: 0;
            transition: transform 0.6s ease-out, opacity 0.6s ease-out;
        }

        tr.show {
            transform: translateX(0);
            opacity: 1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            margin: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Get the Complete Details of All Flights to New Delhi</h2>
    <table border="0">
        <thead>
            <tr>
                <th>Flight ID</th>
                <th>Flight Date</th>
                <th>Flight Time</th>
                <th>Source</th>
                <th>Destination</th>
            </tr>
        </thead>
        <tbody id="flightData">
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

            $sql1 = "SELECT * FROM flight WHERE Destination = 'New Delhi'";
            if ($res = mysqli_query($conn, $sql1)) { 
                while ($row = mysqli_fetch_array($res)) { 
                    echo "<tr>"; 
                    echo "<td>".$row['f_id']."</td>"; 
                    echo "<td>".$row['f_date']."</td>"; 
                    echo "<td>".$row['f_time']."</td>";
                    echo "<td>".$row['Source']."</td>";    
                    echo "<td>".$row['Destination']."</td>";            
                    echo "</tr>";
                } 
            } else { 
                echo "<tr><td colspan='5'>No matching records are found.</td></tr>"; 
            }
            mysqli_close($conn); 
            ?> 
        </tbody>
    </table>
    
    <button><a href="index.html#all_query">Back</a></button>

    <script>
        // Add JavaScript to apply the 'show' class to each row after it is loaded
        document.addEventListener("DOMContentLoaded", function () {
            const rows = document.querySelectorAll('#flightData tr');
            rows.forEach((row, index) => {
                setTimeout(() => {
                    row.classList.add('show');
                }, index * 150); // Delay between each row animation
            });
        });
    </script>
</body>
</html>
