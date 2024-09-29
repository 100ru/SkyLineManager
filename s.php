<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subscribe</title>
</head>
<body>
<button><a href="index.html#contact_us">Back</button></a>
</body>
</html>

<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "dbms";


$conn = new mysqli("localhost:3306", "root", "", "dbms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data on submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email input
    $email = $_POST["email"];

    // Validate email format

    // Insert email into the database
    $sql = "INSERT INTO subscriptions (email) VALUES ('$email')";

    if ($conn->query($sql) === true) {
        echo "Subscription successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!-- HTML form -->
<!--<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br>
    <button type="submit">Subscribe</button>
</form>-->
