<?php
include("configurations/connect.php");
$message = "";

// Check if an ID was passed to the page
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the Attendee's current details
    try {
        $stmt = $conn->prepare("SELECT * FROM Attendee WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $Attendee = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$Attendee) {
            die("Attendee not found.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Handle form submission for updating the Attendee
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the new values or retain old ones if fields are empty
        $Attno = !empty($_POST['Attno']) ? $_POST['Attno'] : $Attendee['Attno'];
        $Attf = !empty($_POST['AttFname']) ? $_POST['AttFname'] : $Attendee['AttFname'];
        $Attl = !empty($_POST['AttLname']) ? $_POST['AttLname'] : $Attendee['AttLname'];
        $Atte = !empty($_POST['Attemail']) ? $_POST['Attemail'] : $Attendee['Attemail'];
        $Attp = !empty($_POST['Attphoneno']) ? $_POST['Attphoneno'] : $Attendee['Attphoneno'];
        $Evno = !empty($_POST['Eventno']) ? $_POST['Eventno'] : $Attendee['Eventno'];

        try {
            $stmt = $conn->prepare("UPDATE Attendee SET Attno = :an, AttFname = :f, AttLname = :l, Attemail = :e, Attphoneno = :p, Eventno = :ev WHERE id = :id");
            $stmt->bindParam(':an', $Attno);
            $stmt->bindParam(':f', $Attf);
            $stmt->bindParam(':l', $Attl);
            $stmt->bindParam(':e', $Atte);
            $stmt->bindParam(':p', $Attp);
            $stmt->bindParam(':ev', $Evno);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Attendee details updated successfully.";
                header("Location: ViewAttendee.php");
                exit();
            } else {
                $message = "Error updating Attendee details.";
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
    <title>Update Attendee</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <h1 class="header">Update Attendee Details</h1>
    <?php if ($message): ?>
        <p style="color: green; text-align: center;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="UpdateAttendee.php?id=<?= htmlspecialchars($id) ?>" method="post">
        <div class="outside-form">
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Attendee No:</label>
                    <input type="text" name="Attno" value="<?= htmlspecialchars($Attendee['Attno']) ?>" placeholder="ATT999">
                </div>
                <div class="input-group">
                    <label for="">First Name:</label>
                    <input type="text" class="wide_text" name="AttFname" value="<?= htmlspecialchars($Attendee['AttFname']) ?>" placeholder="John">
                </div>
                <div class="input-group">
                    <label for="">Last Name:</label>
                    <input type="text" class="wide_text" name="AttLname" value="<?= htmlspecialchars($Attendee['AttLname']) ?>" placeholder="Doe">
                </div>
            </div>
        </div>
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Email:</label>
                    <input type="email" name="Attemail" value="<?= htmlspecialchars($Attendee['Attemail']) ?>" placeholder="johndoe@gmail.com">
                </div>
                <div class="input-group">
                    <label for="">Phone Number:</label>
                    <input type="text"  name="Attphoneno" value="<?= htmlspecialchars($Attendee['Attphoneno']) ?>" placeholder="+999999999999">
                </div>
                <div class="input-group">
                <label for="">Event No:</label>
                    <select name="Eventno" id="" value="<?= htmlspecialchars($room['Eventno']) ?>">
                        <option value="">==== Select ====</option>
                        <?php
                        // Fetch Attendee members from the database
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
            <button type="submit">Update Attendee</button>
        </div>
    </form>
</body>
</html>