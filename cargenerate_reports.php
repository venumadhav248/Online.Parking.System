<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Reports</title>
    <!-- Add your HTML head content here (e.g., stylesheets, scripts) -->
</head>
<body>
    <h1>Generate Reports</h1>

    <!-- Add a form for specifying report criteria -->
    <form action="generate_reports_process.php" method="post">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required><br><br>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required><br><br>

        <input type="submit" value="Generate Report">
    </form>

    <a href="caradmin_dashboard.php">Back to Dashboard</a>
</body>
</html>
