<?php
session_start();

// Check if username and password POST parameters are set
if (isset($_POST["username"]) && isset($_POST["password"])) {
    // Database configuration
    $db_host = 'localhost'; // Replace with your database hostname
    $db_user = 'id21116086_poorva'; // Replace with your database username
    $db_pass = 'Poorva@123'; // Replace with your database password
    $db_name = 'id21116086_users_db'; // Replace with your database name
    $table_name = 'user_registration'; // Replace with your table name

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check user credentials
    $sql = "SELECT * FROM user_registration WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful, redirect to the user dashboard or another page
        header("Location: https://vpsdhasinisindhu.000webhostapp.com/carparking5.html"); // Replace with the desired destination
        exit();
    } else {
        // Authentication failed, redirect back to the login page with an error message
        $error_message = "Invalid username or password."; // Customize the error message as needed

        // Pass the error message to JavaScript
        echo '<script>';
        echo 'alert("Error: ' . $error_message . '");';
        echo 'window.location.href = "caruser_login.php";';
        echo '</script>';
        exit();
    }

    // Close the database connection
    $conn->close();

}
?>
