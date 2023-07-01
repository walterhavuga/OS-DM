<?php
if (isset($_POST["sub"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $newpassword = $_POST["newpassword"];

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

    $sql = "INSERT INTO signup (email, name, username, password, newpassword) VALUES ('$email', '$name', '$username', '$password', '$newpassword')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to signup.html
        header("Location: Login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

