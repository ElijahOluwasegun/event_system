<?php
include("configurations/connect.php");

// Check if an ID was passed to the page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the staff with the specified ID
    try {
        $stmt = $conn->prepare("DELETE FROM staff WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Redirect back to the staffs list with a success message
            header("Location: ViewStaff.php?message=Staff deleted successfully");
            exit();
        } else {
            echo "Error: Could not delete the staff.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>Invalid request: Staff ID is missing. Please go back and select a valid staff to delete.</p>";
    echo '<p><a href="staff_interface.php">Return to Staff List</a></p>';
}
?>