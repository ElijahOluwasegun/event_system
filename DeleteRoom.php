<?php
include("configurations/connect.php");

// Check if an ID was passed to the page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the room with the specified ID
    try {
        $stmt = $conn->prepare("DELETE FROM room WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Redirect back to the rooms list with a success message
            header("Location: ViewRoom.php?message=Room deleted successfully");
            exit();
        } else {
            echo "Error: Could not delete the room.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<p>Invalid request: Room ID is missing. Please go back and select a valid room to delete.</p>";
    echo '<p><a href="room_interface.php">Return to Room List</a></p>';
}
?>