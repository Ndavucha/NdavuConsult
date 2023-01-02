<?php

// Check for form submission
if (isset($_POST['get'])) {
  // Get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate form data
  if (!empty($name) &&  !empty($email) && !empty($subject) && !empty($message)) {
    // Connect to MySQL database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "data";

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Escape special characters to prevent SQL injection attacks
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $subject = mysqli_real_escape_string($conn, $subject);
    $message = mysqli_real_escape_string($conn, $message);    

    // Insert form data into MySQL database
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
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





