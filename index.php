<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Navigation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            background-color: rgba(102, 51, 0, 0.75);
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <h1>Welcome to the System</h1>
    <p>Select an interface to proceed:</p>
    <div class="button-container">
        <a href="staff_interface.php" class="button">Staff Interface</a>
        <a href="event_interface.php" class="button">Event Interface</a>
        <a href="room_interface.php" class="button">Room Interface</a>
        <a href="attendee_interface.php" class="button">Attendee Interface</a>
    </div>
</body>
</html>
