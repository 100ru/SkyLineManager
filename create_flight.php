<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flight Table</title>
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
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Flight Table</h2>

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
    $tableName = "flight";
    $checkTableExists = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($checkTableExists);

    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $createTableSql = "CREATE TABLE flight (
            f_id VARCHAR(60) PRIMARY KEY,
            f_date DATE,
            f_time TIME,
            Source VARCHAR(255),
            Destination VARCHAR(255)
        )";

        if ($conn->query($createTableSql) === TRUE) {
            echo "<p class='message'>Table created successfully.</p>";
        } else {
            echo "<p class='message'>Error creating table: " . $conn->error . "</p>";
        }
    } else {
        echo "<p class='message'>Table already exists.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>

    <form method="POST">
        <button type="submit" name="start">Start</button>
        <button><a href="index.html#create">Back</a></button>
        <button><a href="http://localhost/php%20code/flight_drop.php">Drop</a></button>
    </form>

    <?php
    if (isset($_POST['start'])) {
        // Perform start button action here
        echo "<p class='message'>Start button clicked.</p>";
    }

    if (isset($_POST['reset'])) {
        // Perform reset button action here
        echo "<p class='message'>Reset button clicked.</p>";
    }
    ?>
</div>

</body>
</html>
