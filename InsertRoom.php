<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Step 1: Get Data from the Form [Frontend]
if (isset($_POST['Save']))
{
    $Rmno = $_POST['Roomno'];
    $name = $_POST['Rname'];
    $lo = $_POST['Rlocation'];
    $STNo = $_POST['Staffno'];
    $Evno = $_POST['Eventno'];

    //echo $Rmno. " ". $name;

    // Step 2 : Connect to the database
    include("configurations/connect.php");
    // Step 3 : Write the SQL Command
    $stmt = $conn->prepare("INSERT INTO room (Roomno, Rname, Rlocation, Staffno, Eventno)
    VALUES (:r, :n, :p, :s, :e)");
    $stmt->bindParam(':r', $Rmno);
    $stmt->bindParam(':n', $name);
    $stmt->bindParam(':p', $lo);
    $stmt->bindParam(':s', $STNo);
    $stmt->bindParam(':e', $Evno);
    // Step 4 : Execute the SQL Command
    if($stmt->execute())
    {
        echo "Room Details Successfully Saved";
    }
}
?>