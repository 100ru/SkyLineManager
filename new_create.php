<!DOCTYPE html>
<html>
<head>
    <title>Create Table with PHP</title>
</head>
<body>
<?php 
$servername="localhost:3306";
$username="root";
$password="";
$database="dbms";
$con=mysqli_connect($servername,$username,$password,$database);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the table exists
    $tableName = "customers";
    $checkTableExists = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($checkTableExists);

    if ($result->num_rows == 0) {
        // Table does not exist, create it
        $createTableSql = "CREATE TABLE $tableName (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($createTableSql) === TRUE) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Table already exists";
    }

    // Close the database connection
    $conn->close();
    ?>

    <form method="POST">
        <button type="submit" name="start">Start</button>
        <button type="submit" name="reset">Reset</button>
    </form>

    <?php
    if (isset($_POST['start'])) {
        // Perform start button action here
        echo "Start button clicked";
    }

    if (isset($_POST['reset'])) {
        // Perform reset button action here
        echo "Reset button clicked";
    }
    ?>
</body>
</html>