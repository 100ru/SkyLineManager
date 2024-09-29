<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Table with PHP</title>
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
            color: #333;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8);
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s;
            text-decoration: none;
        }
        button:hover {
            background-color: #2980b9;
        }
        a {
            color: white;
            text-decoration: none;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Booking Table</h2>

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

    // Check if the table exists
    $tableName = "booking";
    $checkTableExists = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($checkTableExists);

    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $createTableSql = "CREATE TABLE booking1 (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,  -- Assuming you want a unique identifier for each booking
    p_id VARCHAR(10),
    a_id VARCHAR(10),
    f_id VARCHAR(10),
    f_date DATE NOT NULL,
    FOREIGN KEY (p_id) REFERENCES passenger(p_id),
    FOREIGN KEY (a_id) REFERENCES agency(a_id),
    FOREIGN KEY (f_id) REFERENCES flight(f_id)
);

        )";

        if ($conn->query($createTableSql) === TRUE) {
            echo "<p>Table created successfully.</p>";
        } else {
            echo "<p>Error creating table: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Table already exists.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <form method="POST">
        <button type="submit" name="start">Start</button>
        <button><a href="index.html#create">Back</a></button>  
        <button><a href="http://localhost/php%20code/booking_drop.php">Drop</a></button>
    </form>

    <?php
    if (isset($_POST['start'])) {
        // Perform start button action here
        echo "<p>Start button clicked</p>";
    }

    if (isset($_POST['reset'])) {
        // Perform reset button action here
        echo "<p>Reset button clicked</p>";
    }
    ?>
</div>

</body>
</html>
