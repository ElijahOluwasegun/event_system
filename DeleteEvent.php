<?php
include("configurations/connect.php");

// Check if an ID was passed to the page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the event with the specified ID
    try {
        $stmt = $conn->prepare("DELETE FROM event WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Redirect back to the events list with a success message
            header("Location: ViewEvent.php?message=Event deleted successfully");
            exit();
        } else {
            echo "Error: Could not delete the event.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>Invalid request: Event ID is missing. Please go back and select a valid event to delete.</p>";
    echo '<p><a href="event_interface.php">Return to Event List</a></p>';
}
?>