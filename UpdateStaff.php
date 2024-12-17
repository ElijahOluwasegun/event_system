<?php
include("configurations/connect.php");
$message = "";

// Check if an ID was passed to the page
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the staff's current details
    try {
        $stmt = $conn->prepare("SELECT * FROM staff WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $staff = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$staff) {
            die("Staff not found.");
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Handle form submission for updating the staff
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the new values or retain old ones if fields are empty
        $STNo = !empty($_POST['Stno']) ? $_POST['Stno'] : $staff['Stno'];
        $FN = !empty($_POST['Fname']) ? $_POST['Fname'] : $staff['Fname'];
        $LN = !empty($_POST['Lname']) ? $_POST['Lname'] : $staff['Lname'];
        $P = !empty($_POST['Phoneno']) ? $_POST['Phoneno'] : $staff['Phoneno'];
        $E = !empty($_POST['email']) ? $_POST['email'] : $staff['email'];
        $Type = !empty($_POST['Cadre']) ? $_POST['Cadre'] : $staff['Cadre'];

        try {
            $stmt = $conn->prepare("UPDATE staff SET Stno = :s, Fname = :f, Lname = :l, Phoneno = :p, email = :e, Cadre = :u WHERE id = :id");
            $stmt->bindParam(':s', $STNo);
            $stmt->bindParam(':f', $FN);
            $stmt->bindParam(':l', $LN);
            $stmt->bindParam(':p', $P);
            $stmt->bindParam(':e', $E);
            $stmt->bindParam(':u', $Type);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $message = "Staff details updated successfully.";
                header("Location: ViewStaff.php");
                exit();
            } else {
                $message = "Error updating staff details.";
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
    <title>Update Staff</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <h1 class="header">Update Staff Details</h1>
    <?php if ($message): ?>
        <p style="color: green; text-align: center;"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form action="UpdateStaff.php?id=<?= htmlspecialchars($id) ?>" method="post">
        <div class="outside-form">
            <div class="outside-input-group">
                <div class="input-group">
                    <label class="staffn" for="">Staff Number:</label>
                    <input type="text" name="Stno" value="<?= htmlspecialchars($staff['Stno']) ?>" placeholder="ST999">
                </div>
                <div class="input-group">
                    <label for="">First Name:</label>
                    <input type="text" class="wide_text" name="Fname" value="<?= htmlspecialchars($staff['Fname']) ?>" placeholder="John">
                </div>
                <div class="input-group">
                    <label for="">Last Name:</label>
                    <input type="text" class="wide_text" name="Lname" value="<?= htmlspecialchars($staff['Lname']) ?>" placeholder="Doe">
                </div>
            </div>
        </div>
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Phone Number:</label>
                    <input type="text" name="Phoneno" value="<?= htmlspecialchars($staff['Phoneno']) ?>" placeholder="+256999999999">
                </div>
                <div class="input-group">
                    <label for="">Email:</label>
                    <input type="email" class="wide_text" name="email" value="<?= htmlspecialchars($staff['email']) ?>" placeholder="johndoe@gmail.com">
                </div>
                <div class="input-group">
                    <label for="">Cadre:</label>
                    <select name="Cadre" id="" value="<?= htmlspecialchars($staff['Cadre']) ?>">
                            <option value="">==== Select ====</option>
                            <option value="Admin" <?= $staff['Cadre'] == 'Admin' ? 'selected' : '' ?>>System Administrator</option>
                            <option value="Manager" <?= $staff['Cadre'] == 'Manager' ? 'selected' : '' ?>>Manager</option>
                            <option value="Waiter" <?= $staff['Cadre'] == 'Waiter' ? 'selected' : '' ?>>Waiter</option>
                        </select>
                </div>
            </div>
        </div>
        <div class="btn">
            <button type="submit">Update Staff</button>
        </div>
    </form>
</body>
</html>