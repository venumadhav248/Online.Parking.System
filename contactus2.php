<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You can customize this part to send the email to your parking system's support team.
    $to = "support@yourparkingsystem.com";
    $subject = "Contact Us Form Submission";
    $headers = "From: $email";
    $message = "Name: $name\nEmail: $email\nMessage: $message";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Your message has been sent. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>
