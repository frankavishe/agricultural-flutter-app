<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Database configuration
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create a table for appointments
$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    paymentMode VARCHAR(50) NOT NULL,
    doctor VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentMode = $_POST['paymentMode'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $stmt = $conn->prepare("INSERT INTO appointments (username, paymentMode, doctor, date, time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $paymentMode, $doctor, $date, $time);

    if ($stmt->execute()) {
        header("Location: conf.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('pa1.jpg') no-repeat center center fixed;
            background-size: cover;
            transition: background-image 1s ease-in-out;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book an Appointment</h2>
        <form id="appointmentForm" method="POST" action="">
            <div class="form-group">
                <label for="paymentMode">Mode of Payment</label>
                <select id="paymentMode" name="paymentMode" required>
                    <option value="nhif">NHIF</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Which Doctor</label>
                <select id="doctor" name="doctor" required>
                    <option value="medical">Medical Doctor</option>
                    <option value="counselor">Counselor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>
            </div>
            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>

    <script>
        // JavaScript to alternate background images
        let backgroundIndex = 0;
        const backgrounds = ['pa1.jpg', 'pa2.jpg'];

        function changeBackground() {
            document.body.style.backgroundImage = `url('${backgrounds[backgroundIndex]}')`;
            backgroundIndex = (backgroundIndex + 1) % backgrounds.length;
        }

        setInterval(changeBackground, 5000); // Change background every 5 seconds
        changeBackground(); // Initial call to set the first background
    </script>
</body>
</html>
