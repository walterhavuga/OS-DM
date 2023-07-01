<?php
// Assuming you have a MySQL database set up with the following details
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "shop";

// Establish a connection to the MySQL database
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Prepare and execute the SQL statement to insert the email into a table
    $stmt = $conn->prepare("INSERT INTO subscriptions (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Thank you for subscribing!";
    } else {
        echo "Oops! Something went wrong.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
