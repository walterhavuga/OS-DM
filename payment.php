<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $fullName = $_POST["full-name"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["phone"];
  $cityProvince = $_POST["city"];
  $district = $_POST["district"];
  $sector = $_POST["sector"];
  $cell = $_POST["cell"];
  $paidAmount = $_POST["paid_amount"];
  $proofOfPayment = $_FILES["proof_of_payment"]["name"];
  
  // Database connection settings
  $host = "localhost"; 
  $username = "root"; 
  $password = ""; 
  $database = "shop"; 
  
  // Create a new database connection
  $conn = new mysqli($host, $username, $password, $database);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Prepare and execute SQL query
  $sql = "INSERT INTO payment (full_name, email, phone_number, city_province, district, sector, cell, paid_amount, proof_of_payment) VALUES ('$fullName', '$email', '$phoneNumber', '$cityProvince', '$district', '$sector', '$cell', '$paidAmount', '$proofOfPayment')";
  $stmt = $conn->prepare($sql);
  
  if ($stmt->execute()) {
    // Retrieve uploaded files
    $proofFiles = $_FILES["proof_of_payment"]["name"];
    $proofFileCount = count($proofFiles);
    
    // Loop through the uploaded files
    for ($i = 0; $i < $proofFileCount; $i++) {
      $proofOfPayment = $_FILES["proof_of_payment"]["name"][$i];
  
      // File upload directory
      $uploadDir = "uploads/";
      $uploadFile = $uploadDir . basename($_FILES["proof_of_payment"]["name"][$i]);
  
      // Move uploaded file to the specified directory
      if (move_uploaded_file($_FILES["proof_of_payment"]["tmp_name"][$i], $uploadFile)) {
        echo "Payment record inserted successfully.";
      }
    }
  
    // Close the database connection
    $conn->close();

    // Redirect back to payment.html
    header("Location: payment.html");
    exit();
  } else {
    echo "Error inserting payment record: " . $conn->error;
  }
}
?>
