<?php
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Example code for connecting to MySQL database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "shop";

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Redirect to index.html
        header("Location: index.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>
