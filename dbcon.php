<!DOCTYPE html>
<html>
<head>
    <title>REGISTRATION</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form method="POST">
        Username: <input type='text' id="id1" name="id1" /><br>
        Password: <input type='text' id="pass" name="pass" /><br>
        Email: <input type='text' id="email" name="email" /><br>
        Phone Number: <input type='text' id="phonenumber" name="phonenumber" /><br>
        <input type="submit" value="Register" name="submit" id="submit"/>
    </form>

    <?php
    // Define database credentials from .env file or directly here
    $servername = "localhost"; // Replace with your database host if needed
    $username = "id21116086_sindhu"; // Replace with your database username
    $password = "Sin@123dhu"; // Replace with your database password
    $database = "id21116086_login"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $username = isset($_POST['id1']) ? $_POST['id1'] : '';
        $password = isset($_POST['pass']) ? $_POST['pass'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';

        // Check if the username already exists
        $check_query = "SELECT * FROM login WHERE username = '$username'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            echo "Username already exists. Please choose a different one.";
        } else {
            // Insert data into the 'login' table
            $insert_query = "INSERT INTO login (username, password, email, phonenumber) 
                            VALUES ('$username', '$password', '$email', '$phonenumber')";

            if ($conn->query($insert_query) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>






