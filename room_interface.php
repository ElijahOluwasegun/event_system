<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room Information</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- Do your own css styling -->
</head>
<body>
    <h1 class="header">Enter Room Details: </h1>
    
    <form action="InsertRoom.php" method="post" autocomplete="on">
        <div class="outside-input-group">
            <div class="input-group">
                <label for="">Room no:</label>
                <input type="text" name="Roomno" placeholder="R999" required>
            </div>
            <div class="input-group">
                <label for="">Room Name:</label>
                <input type="text" name="Rname" required>
            </div>
            <div class="input-group">
                <label for="">Location</label>
                <input type="text" name="Rlocation" required>
            </div>
        </div>
        <div class="outside-input-group">
            <div class="input-group">
                <label for="">Staff No:</label>
                    <select name="Staffno" required>
                        <option value="">==== Select Staff ====</option>
                        <?php
                        // Fetch staff members from the database
                        include("configurations/connect.php");
                        $stmt = $conn->query("SELECT id, Stno, Fname, Lname FROM staff");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['id']}'>{$row['Stno']} {$row['Fname']} {$row['Lname']}</option>";
                        }
                        ?>
                    </select>
            </div>
            <div class="input-group">
                <label for="">Event No:</label>
                    <select name="Eventno" required>
                        <option value="">==== Select Staff ====</option>
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
        <div class="outside-buttons">
                <div class="btn">
                    <button type="submit" name="Save">Submit</button>
                </div>
                <div class="links">
                    <a href="ViewRoom.php">View Room</a>
                </div>
            </div>
    </form>
</body>
</html>