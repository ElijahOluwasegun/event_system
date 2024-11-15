<?php
// Step 1: Get Data from the Form [Frontend]
if (isset($_POST['Save']))
{
    $Attno = $_POST['Attno'];
    $Attf = $_POST['AttFname'];
    $Attl = $_POST['AttLname'];
    $Atte = $_POST['Attemail'];
    $Attp = $_POST['Attphoneno'];
    $Evno = $_POST['Eventno'];

    //echo $Attno. " ". $Attf;

    // Step 2 : Connect to the database
    include("configurations/connect.php");
    // Step 3 : Write the SQL Command
    $stmt = $conn->prepare("INSERT INTO Attendee (Attno, AttFname, AttLname, Attemail, Attphoneno, Eventno)
    VALUES (:an, :f, :l, :e, :p, :ev)");
    $stmt->bindParam(':an', $Attno);
    $stmt->bindParam(':f', $Attf);
    $stmt->bindParam(':l', $Attl);
    $stmt->bindParam(':e', $Atte);
    $stmt->bindParam(':p', $Attp);
    $stmt->bindParam(':ev', $Evno);
    // Step 4 : Execute the SQL Command
    if($stmt->execute())
    {
        echo "Attendee Details Successfully Saved";
    }
}
?>