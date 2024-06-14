<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('pa2.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative; /* Add position relative */
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h2 {
            margin-bottom: 20px;
            color: #007BFF;
        }
        .container h1 {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .logo {
            position: absolute;
            top: 20px; /* Adjust top position */
            right: 20px; /* Adjust right position */
            width: 100px; /* Adjust width */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <img src="logoo.jpg" alt="Logo" class="logo"> <!-- Move logo outside container -->
    <div class="container">
        <h2>ONLINE MEDICAL APPOINTMENT SYSTEM</h2>
        <h1>Welcome to Our Service</h1>
        <a href="reg.php" class="btn">Register</a>
        <a href="log.php" class="btn">Login</a>
    </div>
</body>
</html>
