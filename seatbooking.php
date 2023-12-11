<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['book_slot'])) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Define your database connection variables here
        $servername = 'localhost'; // Replace with your database hostname
        $username = 'id21116086_sindhu'; // Replace with your database username
        $password = 'Speci@123'; // Replace with your database password
        $dbname = 'id21116086_login'; // Replace with your database name

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the data from the form
        $vehicle_number = $_POST['vehicle_number'];
        $vehicle_type = $_POST['vehicle_type'];
        $owner_name = $_POST['owner_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Define an array to store the selected slot numbers
        $selected_slots = $_POST['selected_slots'];

        // Check if any slots were selected
        if (empty($selected_slots)) {
            echo "No slots selected. Please select at least one slot.";
        } else {
            // Iterate through the selected slots and book them
            foreach ($selected_slots as $slot_number) {
                // Insert the booking into the database
                insertBooking($conn, $vehicle_number, $vehicle_type, $owner_name, $date, $time, $slot_number);

                // Update the status of the slot in the database to "occupied"
                updateSlotStatus($conn, $slot_number);
            }

            echo "Slots booked successfully!";
        }

        // Function to insert a booking into the database
        function insertBooking($conn, $vehicleNumber, $vehicleType, $ownerName, $date, $time, $slotNumber) {
            $sql = "INSERT INTO seatbookings (vehicle_number, vehicle_type, owner_name, date, time, slot_number)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssii", $vehicleNumber, $vehicleType, $ownerName, $date, $time, $slotNumber);

            $stmt->execute();
        }

        // Function to update the slot status to "occupied"
        function updateSlotStatus($conn, $slotNumber) {
            $sql = "UPDATE slots SET status = 'occupied' WHERE slot_number = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $slotNumber);

            $stmt->execute();
        }
    }
}

// Function to retrieve bookings from the database
function getBookings($conn) {
    $sql = "SELECT * FROM seatbookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Booking ID: " . $row["id"] . "<br>";
            echo "Vehicle Number: " . $row["vehicle_number"] . "<br>";
            echo "Vehicle Type: " . $row["vehicle_type"] . "<br>";
            echo "Owner Name: " . $row["owner_name"] . "<br>";
            echo "Date: " . $row["date"] . "<br>";
            echo "Time: " . $row["time"] . "<br>";
            echo "Slot Number: " . $row["slot_number"] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "No bookings found.";
    }

    // Close the database connection
    $conn->close();
}
?>
