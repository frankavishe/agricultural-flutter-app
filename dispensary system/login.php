<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include "db_connection.php";

    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials
    $sql = "SELECT * FROM students_registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check if query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Authentication successful, redirect to dashboard
        header("Location: dash.php");
        exit();
    } else {
        // Authentication failed, redirect back to login page with error message
        header("Location: log.php?error=1");
        exit();
    }
} else {
    // Redirect back to login page if accessed directly
    header("Location: log.php");
    exit();
}
?>
