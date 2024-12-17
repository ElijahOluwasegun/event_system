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

// Fetch data from the staffs table
$sql = "SELECT id, Stno, Fname, Lname, Phoneno, email, Cadre FROM staff";
$stmt = $conn->prepare($sql);
$stmt->execute();
$staffs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff List</title>
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
    <h1 class="header" style="text-align: center;">Staff List</h1>
    <table>
        <tr>
            <th>Staff ID</th>
            <th>Staff No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Cadre</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($staffs as $staff): ?>
            <tr>
                <td><?= htmlspecialchars($staff['id']) ?></td>
                <td><?= htmlspecialchars($staff['Stno']) ?></td>
                <td><?= htmlspecialchars($staff['Fname']) ?></td>
                <td><?= htmlspecialchars($staff['Lname']) ?></td>
                <td><?= htmlspecialchars($staff['Phoneno']) ?></td>
                <td><?= htmlspecialchars($staff['email']) ?></td>
                <td><?= htmlspecialchars($staff['Cadre']) ?></td>
                <td>
                    <a href="staff_interface.php?id=<?= htmlspecialchars($staff['id']) ?>">Add</a> |
                    <a href="UpdateStaff.php?id=<?= htmlspecialchars($staff['id']) ?>">Update</a> |
                    <a href="DeleteStaff.php?id=<?= htmlspecialchars($staff['id']) ?>" onclick="return confirm('Are you sure you want to delete this staff?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>