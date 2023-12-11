<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Parking System</title>
    <!-- Add your HTML head content here (e.g., stylesheets, scripts) -->
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ff9900;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .dashboard-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .dashboard-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .dashboard-option {
            margin: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .dashboard-option a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="carmanage_parking_spaces.php">Manage Parking Spaces</a></li>
                <li><a href="carmanage_users.php">Manage Users</a></li>
                <li><a href="cargenerate_reports.php">Generate Reports</a></li>
                <li><a href="carlogout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <div class="dashboard-options">
            <div class="dashboard-option">
                <a href="carmanage_parking_spaces.php">
                    <h2>Manage Parking Spaces</h2>
                    <p>View, add, edit, or delete parking spaces.</p>
                </a>
            </div>
            <div class="dashboard-option">
                <a href="carmanage_users.php">
                    <h2>Manage Users</h2>
                    <p>Manage user accounts, permissions, and access.</p>
                </a>
            </div>
            <div class="dashboard-option">
                <a href="cargenerate_reports.php">
                    <h2>Generate Reports</h2>
                    <p>Create and view reports on parking activity.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
