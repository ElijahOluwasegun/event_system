<?php
// Step 1: Get Data from the Form [Frontend]
if (isset($_POST['Save']))
{
    $STNo = $_POST['Stno'];
    $FN = $_POST['Fname'];
    $LN = $_POST['Lname'];
    $P = $_POST['Phoneno'];
    $E = $_POST['email'];
    $Type = $_POST['Cadre'];

    //echo $FN. " ". $LN;

    // Step 2 : Connect to the database
    include("configurations/connect.php");
    // Step 3 : Write the SQL Command
    $stmt = $conn->prepare("INSERT INTO staff (Stno, Fname, Lname, Phoneno, email, Cadre)
    VALUES (:s, :f, :l, :p, :e, :u)");
    $stmt->bindParam(':s', $STNo);
    $stmt->bindParam(':f', $FN);
    $stmt->bindParam(':l', $LN);
    $stmt->bindParam(':p', $P);
    $stmt->bindParam(':e', $E);
    $stmt->bindParam(':u', $Type);
    // Step 4 : Execute the SQL Command
    if($stmt->execute())
    {
        echo "Staff Details Successfully Saved";
    }
}
?>