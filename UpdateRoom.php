<?php
include("configurations/connect.php");
$message = "";

// Check if an ID was passed to the page
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the room's current details
    try {
        $stmt = $conn->prepare("SELECT * FROM room WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$room) {
            die("Room not found.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Handle form submission for updating the room
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the new values or retain old ones if fields are empty
        $Rmno = !empty($_POST['Roomno']) ? $_POST['Roomno'] : $room['Roomno'];
        $name = !empty($_POST['Rname']) ? $_POST['Rname'] : $room['Rname'];
        $lo = !empty($_POST['Rlocation']) ? $_POST['Rlocation'] : $room['Rlocation'];
        $STNo = !empty($_POST['Staffno']) ? $_POST['Staffno'] : $room['Staffno'];
        $Evno = !empty($_POST['Eventno']) ? $_POST['Eventno'] : $room['Eventno'];

        try {
            $stmt = $conn->prepare("UPDATE room SET Roomno = :r, Rname = :n, Rlocation = :p, Staffno = :s, Eventno = :e WHERE id = :id");
            $stmt->bindParam(':r', $Rmno);
            $stmt->bindParam(':n', $name);
            $stmt->bindParam(':p', $lo);
            $stmt->bindParam(':s', $STNo);
            $stmt->bindParam(':e', $Evno);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Room details updated successfully.";
                header("Location: ViewRoom.php");
                exit();
            } else {
                $message = "Error updating room details.";
            }
        } catch (PDOException $e) {
            $message = "Error: " . $e->getMessage();
        }
    }
} else {
    die("Invalid request.");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Room</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <h1 class="header">Update Room Details</h1>
    <?php if ($message): ?>
        <p style="color: green; text-align: center;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="UpdateRoom.php?id=<?= htmlspecialchars($id) ?>" method="post">
        <div class="outside-form">
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Room Number:</label>
                    <input type="text" name="Roomno" value="<?= htmlspecialchars($room['Roomno']) ?>" placeholder="R999" required>
                </div>
                <div class="input-group">
                    <label for="">Room Name:</label>
                    <input type="text"  name="Rname" value="<?= htmlspecialchars($room['Rname']) ?>" required>
                </div>
                <div class="input-group">
                    <label for="">Location:</label>
                    <input type="text"  name="Rlocation" value="<?= htmlspecialchars($room['Rlocation']) ?>" required>
                </div>
            </div>
        </div>
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Staff No:</label>
                    <select name="Staffno" id="" value="<?= htmlspecialchars($room['Staffno']) ?>">
                        <option value="">==== Select ====</option>
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
                    <select name="Eventno" id="" value="<?= htmlspecialchars($room['Eventno']) ?>">
                        <option value="">==== Select ====</option>
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
        </div>
        <div class="btn">
            <button type="submit">Update Room</button>
        </div>
    </form>
</body>
</html>