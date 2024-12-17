<?php
include("configurations/connect.php");

// Check if an ID was passed to the page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the Attendee with the specified ID
    try {
        $stmt = $conn->prepare("DELETE FROM Attendee WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Redirect back to the Attendees list with a success message
            header("Location: ViewAttendee.php?message=Attendee deleted successfully");
            exit();
        } else {
            echo "Error: Could not delete the Attendee.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>Invalid request: Attendee ID is missing. Please go back and select a valid Attendee to delete.</p>";
    echo '<p><a href="attendee_interface.php">Return to Attendee List</a></p>';
}
?>