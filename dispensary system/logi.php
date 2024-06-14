<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$registrationNumber = $_POST['registrationNumber'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert the data into the database
$sql = "INSERT INTO users (fname, lname, registrationNumber, email, phoneNumber, age, sex, password)
VALUES ('$fname', '$lname', '$registrationNumber', '$email', '$phoneNumber', '$age', '$sex', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: dash.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
