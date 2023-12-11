<?php
// Define database connection parameters
$servername = "localhost";
$username = "id21116086_poorva";
$password = "Poorva@123";
$dbname = "id21116086_users_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["booking_time"])) {
        echo "Booking time is required.";
    } else {
        // Construct and execute the SQL query for booking
        $date = $_POST["date"];
        $bookingTime = $_POST["booking_time"];
        $hours = $_POST["hours"];
        $vehicle = $_POST["vehicle"];
        $slotID = $_POST["slot_id"]; // Slot ID from the hidden input

        // Check if the provided slot_id exists in the slots table
        $checkSql = "SELECT id FROM slots WHERE id = $slotID";
        $result = $conn->query($checkSql);
       

        if ($result->num_rows > 0) {
            // The slot_id exists, proceed with booking
            $sql = "INSERT INTO bookings (date, booking_time, hours, vehicle, slot_id) 
                    VALUES ('$date', '$bookingTime', $hours, '$vehicle', $slotID)";

            if ($conn->query($sql) === TRUE) {
                // Update the slot's status to "booked" in the 'slots' table
                $updateSql = "UPDATE slots SET status = 'booked' WHERE id = $slotID";

                if ($conn->query($updateSql) === TRUE) {
                    echo "Booking successful!";
                } else {
                    echo "Error updating slot status: " . $conn->error;
                }
            } else {
                echo "Error booking: " . $conn->error;
            }
        } else {
            echo "Invalid slot ID. Please select a valid slot.";
        }
    }
}

// Close the database connection
$conn->close();
?>
