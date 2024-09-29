<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>query6</title>
    <style>
        /* Body styling without background color */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #34495e;
            background-color: #f0f0f0; /* Optional: set a solid color for the background */
        }

        /* Heading styling */
        h2 {
            color: #34495e;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            font-size: 26px;
            margin-bottom: 20px;
        }

        /* Table styling */
        table {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }

        th {
            background-color: #2980b9;
            color: white;
            font-size: 20px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ecf0f1;
            cursor: pointer;
        }

        /* Button styling */
        button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <!-- Page heading -->
    <h2>(6.) Agency names for agencies located in the same city as the passenger with passenger id 123</h2>

    <!-- Table containing agency names -->
    <table border="2" cellspacing="7">
        <thead>
            <tr>
                <th>Agency Name</th>
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

            // Query to fetch agency names in the same city as passenger id 123
            $sql1 = "SELECT a_name FROM agency WHERE a_city = ( SELECT p_city FROM passenger WHERE p_id = '123')";
            if ($res = mysqli_query($conn, $sql1)) { 
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) { 
                        echo "<tr>"; 
                        echo "<td>".$row['a_name']."</td>"; 
                        echo "</tr>";
                    } 
                } else {
                    echo "<tr><td>No matching records are found.</td></tr>"; 
                }
            } else { 
                echo "<tr><td>Error executing query.</td></tr>"; 
            }

            // Close connection
            mysqli_close($conn); 
            ?>
        </tbody>
    </table>

    <!-- Back button -->
    <button><a href="index.html#all_query">Back</a></button>

</body>
</html>
