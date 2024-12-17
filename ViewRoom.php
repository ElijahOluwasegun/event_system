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

// Fetch data from the rooms table
$sql = "SELECT id, Roomno, Rname, Rlocation, Staffno, Eventno, Cadre FROM room";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Room List</title>
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
    <h1 class="header" style="text-align: center;">Room List</h1>
    <table>
        <tr>
            <th>Room ID</th>
            <th>Room No</th>
            <th>Room Name</th>
            <th>Location</th>
            <th>Staff No</th>
            <th>Event No</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td><?= htmlspecialchars($room['id']) ?></td>
                <td><?= htmlspecialchars($room['Roomno']) ?></td>
                <td><?= htmlspecialchars($room['Rname']) ?></td>
                <td><?= htmlspecialchars($room['Rlocation']) ?></td>
                <td><?= htmlspecialchars($room['Staffno']) ?></td>
                <td><?= htmlspecialchars($room['Eventno']) ?></td>
                <td>
                    <a href="room_interface.php?id=<?= htmlspecialchars($room['id']) ?>">Add</a> |
                    <a href="UpdateRoom.php?id=<?= htmlspecialchars($room['id']) ?>">Update</a> |
                    <a href="DeleteRoom.php?id=<?= htmlspecialchars($room['id']) ?>" onclick="return confirm('Are you sure you want to delete this room?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>