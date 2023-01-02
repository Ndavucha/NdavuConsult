<?php

// Check for form submission
if (isset($_POST['email'])) {
  
    // Get form data
  $email = $_POST['email'];
  

  // Validate form data
  if (!empty($email)) {
    // Connect to MySQL database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "sub";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection attacks
    $email = mysqli_real_escape_string($conn, $email);
    
    // Insert form data into MySQL database
    $sql = "INSERT INTO users (email) VALUES ( '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "Form submitted successfully!";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close MySQL connection
    mysqli_close($conn);
  } else {
    echo "All fields are required!";
  }
}
     
?>