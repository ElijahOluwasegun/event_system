<?php
include("configurations/connect.php");
$message = "";

// Check if an ID was passed to the page
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the event's current details
    try {
        $stmt = $conn->prepare("SELECT * FROM event WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$event) {
            die("Event not found.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Handle form submission for updating the staff
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the new values or retain old ones if fields are empty
        $Evno = !empty($_POST['Eventno']) ? $_POST['Eventno'] : $event['Eventno'];
        $EVN = !empty($_POST['EventName']) ? $_POST['EventName'] : $event['EventName'];
        $EVD = !empty($_POST['Edescript']) ? $_POST['Edescript'] : $event['Edescript'];
        $ESD = !empty($_POST['EventStartDate']) ? $_POST['EventStartDate'] : $event['EventStartDate'];
        $EED = !empty($_POST['EventEndDate']) ? $_POST['EventEndDate'] : $event['EventEndDate'];
        $EST = !empty($_POST['EventStartTime']) ? $_POST['EventStartTime'] : $event['EventStartTime'];
        $EET = !empty($_POST['EventEndTime']) ? $_POST['EventEndTime'] : $event['EventEndTime'];
        $Hog = !empty($_POST['HostOrg']) ? $_POST['HostOrg'] : $event['HostOrg'];
        $Eog = !empty($_POST['EventOrg']) ? $_POST['EventOrg'] : $event['EventOrg'];
        $Orgemail = !empty($_POST['Organizeremail']) ? $_POST['Organizeremail'] : $event['Organizeremail'];
        $Orgphoneno = !empty($_POST['Organizerphoneno']) ? $_POST['Organizerphoneno'] : $event['Organizerphoneno'];
        $Attsize = !empty($_POST['Attsize']) ? $_POST['Attsize'] : $event['Attsize'];
        $AC = !empty($_POST['AdditionalComments']) ? $_POST['AdditionalComments'] : $event['AdditionalComments'];
        

        $CreatedBy = !empty($_POST['Created_by']) ? $_POST['Created_by'] : $event['Created_by'];

        try {
            $stmt = $conn->prepare("UPDATE event SET Eventno = :e, EventName = :n, Edescript = :d, EventStartDate = :sd, EventEndDate = :ed, EventStartTime = :st, EventEndTime = :et, HostOrg = :ho, EventOrg = :eo, Organizeremail = :oe, Organizerphoneno = :op, Attsize = :az, AdditionalComments = :ac, Created_by = :created_by  WHERE id = :id");
            $stmt->bindParam(':e', $Evno);
            $stmt->bindParam(':n', $EVN);
            $stmt->bindParam(':d', $EVD);
            $stmt->bindParam(':sd', $ESD);
            $stmt->bindParam(':ed', $EED);
            $stmt->bindParam(':st', $EST);
            $stmt->bindParam(':et', $EET);
            $stmt->bindParam(':ho', $Hog);
            $stmt->bindParam(':eo', $Eog);
            $stmt->bindParam(':oe', $Orgemail);
            $stmt->bindParam(':op', $Orgphoneno);
            $stmt->bindParam(':az', $Attsize);
            $stmt->bindParam(':ac', $AC);
            $stmt->bindParam(':created_by', $CreatedBy);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Event details updated successfully.";
                header("Location: ViewEvent.php");
                exit();
            } else {
                $message = "Error updating event details.";
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
    <title>Update Event</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <h1 class="header">Update Event Details</h1>
    <?php if ($message): ?>
        <p style="color: green; text-align: center;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="UpdateEvent.php?id=<?= htmlspecialchars($id) ?>" method="post">
        <div class="outside-form">
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Event Number:</label>
                    <input type="text" name="Eventno" value="<?= htmlspecialchars($event['Eventno']) ?>" placeholder="ST999">
                </div>
                <div class="input-group">
                    <label for="">Event Name:</label>
                    <input type="text" class="wide_text" name="EventName" value="<?= htmlspecialchars($event['EventName']) ?>">
                </div>
                <div class="input-group">
                    <label for="">Event Description:</label>
                    <input type="text" class="wide_text" name="Edescript" value="<?= htmlspecialchars($event['Edescript']) ?>" required>
                </div>
            </div>
        </div>
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Event Start Date:</label>
                    <input type="date" name="EventStartDate" value="<?= htmlspecialchars($event['EventStartDate']) ?>" min="2024-10-01" max="2025-05-01" required>
                </div>
                <div class="input-group">
                    <label for="">Event End Date:</label>
                    <input type="date" name="EventEndDate" value="<?= htmlspecialchars($event['EventEndDate']) ?>"  min="2024-10-01" max="2025-05-01" required>
                </div>
                <div class="outside-input-group">
                    <div class="input-group">
                        <label for="">Event Start Time:</label>
                        <input type="time" name="EventStartTime" value="<?= htmlspecialchars($event['EventStartTime']) ?>"  required>
                    </div>
                    <div class="input-group">
                        <label for="">Event End Time:</label>
                        <input type="time" name="EventEndTime" value="<?= htmlspecialchars($event['EventEndTime']) ?>" max=1800 required>
                    </div>
                </div>
                <div class="outside-input-group">
                    <div class="input-group">
                        <label for="">Host Organization:</label>
                        <input type="text" name="HostOrg" value="<?= htmlspecialchars($event['HostOrg']) ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="">Event Organizer:</label>
                        <input type="text" name="EventOrg" value="<?= htmlspecialchars($event['EventOrg']) ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="">Organizers Email:</label>
                        <input type="email" name="Organizeremail" value="<?= htmlspecialchars($event['Organizeremail']) ?>" required>
                    </div>
                </div>
                <div class="outside-input-group">
                    <div class="input-group">
                        <label for="">Organizers Phone Number:</label>
                        <input type="text" name="Organizerphoneno" value="<?= htmlspecialchars($event['Organizerphoneno']) ?>" required>
                    </div>
                <div class="input-group">
                    <label for="">Attendee Size:</label>
                    <select name="Attsize" id="" value="<?= htmlspecialchars($event['Attsize']) ?>" required>
                            <option value="">==== Select ====</option>
                            <option value="small" <?= $event['Attsize'] == 'Attsize' ? 'selected' : '' ?>>1-20</option>
                            <option value="medium" <?= $staff['Attsize'] == 'Attsize' ? 'selected' : '' ?>>1-50</option>
                            <option value="large" <?= $staff['Attsize'] == 'Attsize' ? 'selected' : '' ?>>1-100</option>
                            <option value="large" <?= $staff['largest'] == 'largest' ? 'selected' : '' ?>>100+</option>
                        </select>
                </div>
            </div>
            <div class="outside-input-group">
            <div class="input-group">
            <label for="">Created By:</label>
                <select name="Created_by" required>
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
            <button type="submit">Update Event</button>
        </div>
    </form>
</body>
</html>