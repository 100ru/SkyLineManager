<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query 10: Male Passengers with Jet Agency</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
        }

        table {
            width: 80%;
            max-width: 800px;
            background-color: white;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease forwards;
        }

        thead {
            background-color: #3498db;
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
            opacity: 0;
            animation: slideIn 0.5s ease forwards;
            animation-delay: var(--delay);
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ecf0f1;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <h2>(10.) Details of all male passengers who are associated with the Jet agency</h2>
    
    <table>
        <thead>
            <tr>
                <th>Passenger ID</th>
                <th>Passenger Gender</th>
                <th>Passenger Name</th>
                <th>Passenger City</th>
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

            // SQL query to fetch male passengers associated with Jet agency
            $sql1 = "SELECT p.p_id, p.p_gender, p.p_name, p.p_city 
                      FROM passenger p 
                      INNER JOIN booking b ON p.p_id = b.p_id 
                      INNER JOIN agency a ON b.a_id = a.a_id 
                      WHERE p.p_gender = 'Male' AND a.a_name = 'Jet'";

            if ($res = mysqli_query($conn, $sql1)) {
                if (mysqli_num_rows($res) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr style='--delay: 0.2s;'><td>{$row['p_id']}</td><td>{$row['p_gender']}</td><td>{$row['p_name']}</td><td>{$row['p_city']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No matching records are found.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    
    <div>
        <button><a href="index.html#all_query" style="color: white; text-decoration: none;">Back</a></button>
    </div>
</body>
</html>
