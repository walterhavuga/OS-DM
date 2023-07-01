
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data (perform additional validation as needed)
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // Handle validation errors
        echo 'Please fill in all the required fields.';
        exit;
    }

    // Database configuration
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "shop";

    // Connect to the database
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check the database connection
    if (!$conn) {
        die('Database connection error: ' . mysqli_connect_error());
    }

    // Prepare the SQL query
    $sql = "INSERT INTO contacts(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Email sending code here

        echo 'Your message has been sent and stored in the database successfully!';
    } else {
        echo 'An error occurred while storing the message. Please try again later.';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'Invalid request method.';
}
?>
