<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>query8</title>
    <style>
        /* Body background with smooth animation */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f6d365, #fda085);
            background-size: 400% 400%;
            animation: backgroundShift 15s ease infinite;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Background animation keyframe */
        @keyframes backgroundShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Heading styling */
        h2 {
            color: #333;
            text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.8);
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
    <h2>(8.) Flights scheduled on either of the dates 01/12/2020 or 02/12/2020 or both at 16:00 hours</h2>

    <!-- Table containing flight details -->
    <table border="2" cellspacing="7">
        <thead>
            <tr>
                <th>Flight ID</th>
                <th>Flight Date</th>
                <th>Flight Time</th>
                <th>Flight Source</th>
                <th>Flight Destination</th>
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

            // Query to fetch flights scheduled on the specified dates and time
            $sql1 = "SELECT * FROM flight WHERE (f_date = '2020-12-01' OR f_date = '2020-12-02') AND f_time = '16:00';";
            if ($res = mysqli_query($conn, $sql1)) { 
                if (mysqli_num_rows($res) > 0) { 
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
            } else { 
                echo "ERROR: Could not execute $sql1. " . mysqli_error($conn); 
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
