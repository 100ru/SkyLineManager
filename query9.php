<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>query9</title>
    <style>
        /* Body background with a gradient */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Heading styling */
        h2 {
            color: #333;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
            font-size: 26px;
            margin-bottom: 20px;
            text-align: center;
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
            animation: tableFadeIn 1.5s ease-in-out;
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
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Table fade-in animation */
        @keyframes tableFadeIn {
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

    <!-- Page heading -->
    <h2>(9.) Agency names for agencies that do not have any bookings for the passenger with id 123</h2>

    <!-- Table containing agency details -->
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

            // Query to fetch agency names without bookings for passenger ID 123
            $sql1 = "SELECT a_name FROM agency WHERE a_id NOT IN (SELECT a_id FROM booking WHERE p_id = 123);";
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
                echo "<tr><td>Error: Could not execute $sql1. " . mysqli_error($conn) . "</td></tr>"; 
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
