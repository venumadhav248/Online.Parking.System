<?php
// Database connection settings
$hostname = "localhost"; // Your database hostname (e.g., localhost)
$database = "id21116086_users_db";     // Your database name
$username = "id21116086_poorva"; // Your database username
$password = "Poorva@123"; // Your database password

// Create a database connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user data from the form
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

// Insert user data into the database
$sql = "INSERT INTO user_registration (name, username, password, mobile_number, email) VALUES ('$name', '$username', '$password', '$mobile', '$email')";

if (mysqli_query($conn, $sql)) {
    // Retrieve the username and display it in the success alert
    echo '<script>alert("Registration successful! Username: ' . $username . '");</script>';
} else {
    // Error alert
    echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
}

// Close the database connection
mysqli_close($conn);
?>
