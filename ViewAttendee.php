<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "event_system"; // Replace with your database name

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Attendees table
$sql = "SELECT id, Attno, AttFname, AttLname, Attemail, Attphoneno, Eventno FROM Attendee";
$stmt = $conn->prepare($sql);
$stmt->execute();
$Attendees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendee List</title>
    <style>
        /* Basic styling */
        *{ box-sizing: border-box; margin: 0;   padding: 0; }
        table { display: flex; justify-content: center; margin: 2em 0em; width: 100%; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid black; text-align: center; }
        th { color: white; background-color: rgba(102, 51, 0, 0.75); }
        .header { display: flex; justify-content: center; align-items: center; padding: 1em 0em; background-color: rgba(102, 51, 0, 0.75); color: rgb(255, 255, 255);}
        h1 { font-family: "Inter", sans-serif;font-optical-sizing: auto; font-weight:700; font-style: normal;}
        td { background-color: rgba(255, 207, 140, 1)}
        td:hover {
            background-color: white;
        }
    </style>
</head>
<body>
    <h1 class="header" style="text-align: center;">Attendee List</h1>
    <table>
        <tr>
            <th>Attendee ID</th>
            <th>Attendee No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Event No</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($Attendees as $Attendee): ?>
            <tr>
                <td><?= htmlspecialchars($Attendee['id']) ?></td>
                <td><?= htmlspecialchars($Attendee['Attno']) ?></td>
                <td><?= htmlspecialchars($Attendee['AttFname']) ?></td>
                <td><?= htmlspecialchars($Attendee['AttLname']) ?></td>
                <td><?= htmlspecialchars($Attendee['Attemail']) ?></td>
                <td><?= htmlspecialchars($Attendee['Attphoneno']) ?></td>
                <td><?= htmlspecialchars($Attendee['Eventno']) ?></td>
                <td>
                    <a href="attendee_interface.php?id=<?= htmlspecialchars($Attendee['id']) ?>">Add</a> |
                    <a href="UpdateAttendee.php?id=<?= htmlspecialchars($Attendee['id']) ?>">Update</a> |
                    <a href="DeleteAttendee.php?id=<?= htmlspecialchars($Attendee['id']) ?>" onclick="return confirm('Are you sure you want to delete this Attendee?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>