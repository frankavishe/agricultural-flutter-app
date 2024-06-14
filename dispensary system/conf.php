<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('PA2.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointment Confirmed</h2>
        <p>Your appointment number is: <strong id="appointmentNumber"></strong></p>
    </div>

    <script>
        function generateAppointmentNumber() {
            return Math.floor(Math.random() * 100000); // Generate a random 5-digit number
        }

        document.getElementById('appointmentNumber').innerText = generateAppointmentNumber();
    </script>
</body>
</html>
