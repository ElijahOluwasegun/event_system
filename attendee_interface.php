<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendee Information</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- Do your own css styling -->
</head>
<body>
    <h1 class="header">Enter Attendee Details: </h1>
    <form action="InsertAttendee.php" method="post">
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Attendee no:</label>
            <input type="text" name="Attno" required>
        </div>
        <div class="input-group">
            <label for="">First Name:</label>
            <input class="wide_text" type="text" name="AttFname" required>
        </div>
        <div class="input-group">
            <label for="">Last Name:</label>
            <input class="wide_text" type="text" name="AttLname" required>
        </div>
    </div>
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Email: </label>
            <input type="email" name="Attemail" required>
        </div>
        <div class="input-group">
            <label for="">Phone Number:</label>
            <input type="text" name="Attphoneno" required>
        </div>
        <div class="input-group">
                <label for="">Event No:</label>
                    <select name="Eventno" required>
                        <option value="">==== Select Event ====</option>
                        <?php
                        // Fetch staff members from the database
                        include("configurations/connect.php");
                        $stmt = $conn->query("SELECT id, Eventno, EventName FROM event");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['id']}'>{$row['Eventno']} {$row['EventName']}</option>";
                        }
                        ?>
                    </select>
        </div>
    </div>
    <div class="btn">
        <button type="submit" name="Save">Submit Attendee Details</button>
    </div>
    </form>
</body>
</html>