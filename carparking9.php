<?php
// Start or resume the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other appropriate page
    header("Location: https://vpsdhasinisindhu.000webhostapp.com/carparking1.html"); // Change the URL to your login page
    exit();
} else {
    // If the user is not logged in, redirect them to the login page
    header("Location: https://vpsdhasinisindhu.000webhostapp.com/carparking1.html"); // Change the URL to your login page
    exit();
}
?>
