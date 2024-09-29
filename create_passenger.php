<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Passenger Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a8c0ff, #3f2b96);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #fff;
        }
        h2 {
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
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
            background-color: #45a049;
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
    <h2>Create Passenger Table</h2>

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
    $tableName = "passenger";
    $checkTableExists = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($checkTableExists);

    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $createTableSql = "CREATE TABLE passenger (
            p_id VARCHAR(10) PRIMARY KEY,
            p_name VARCHAR(30) NOT NULL, 
            p_gender VARCHAR(10) NOT NULL, 
            p_city VARCHAR(10)
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
        <button><a href="http://localhost/php%20code/passenger_drop.php">Drop</a></button>
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
