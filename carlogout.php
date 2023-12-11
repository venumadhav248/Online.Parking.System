<?php
session_start();

// Clear admin session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: https://vpsdhasinisindhu.000webhostapp.com/carparking1.html");
exit();
?>
