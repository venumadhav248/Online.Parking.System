
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: https://vpsdhasinisindhu.000webhostapp.com/carparking5.html"); // Redirect to the login page
    exit();
}

// Display the dashboard content for the logged-in user
echo "Welcome to your dashboard, " . $_SESSION['username'];
?> 