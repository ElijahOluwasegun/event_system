<?php
// Step 1: Get Data from the Form [Frontend]
if (isset($_POST['Save']))
{
    $Evno = $_POST['Eventno'];
    $EVN = $_POST['EventName'];
    $EVD = $_POST['Edescript'];
    $ESD = $_POST['EventStartDate'];
    $EED = $_POST['EventEndDate'];
    $EST = $_POST['EventStartTime'];
    $EET = $_POST['EventEndTime'];
    $Hog = $_POST['HostOrg'];
    $Eog = $_POST['EventOrg'];
    $Orgemail = $_POST['Organizeremail'];
    $Orgphoneno = $_POST['Organizerphoneno'];
    $Attsize = $_POST['Attsize'];
    $AC = $_POST['AdditionalComments'];
    $CreatedBy = $_POST['Created_by'];

    //echo $Evno. " ". $EVN;

    // Step 2 : Connect to the database
    include("configurations/connect.php");
    // Step 3 : Write the SQL Command
    $stmt = $conn->prepare("INSERT INTO event (Eventno, EventName, Edescript, EventStartDate, EventEndDate, EventStartTime, EventEndTime, HostOrg, EventOrg, Organizeremail, Organizerphoneno, Attsize, AdditionalComments, Created_by)
    VALUES (:e, :n, :d, :sd, :ed, :st, :et, :ho, :eo, :oe, :op, :az, :ac, :created_by)");
    $stmt->bindParam(':e', $Evno);
    $stmt->bindParam(':n', $EVN);
    $stmt->bindParam(':d', $EVD);
    $stmt->bindParam(':sd', $ESD);
    $stmt->bindParam(':ed', $EED);
    $stmt->bindParam(':st', $EST);
    $stmt->bindParam(':et', $EET);
    $stmt->bindParam(':ho', $Hog);
    $stmt->bindParam(':eo', $Eog);
    $stmt->bindParam(':oe', $Orgemail);
    $stmt->bindParam(':op', $Orgphoneno);
    $stmt->bindParam(':az', $Attsize);
    $stmt->bindParam(':ac', $AC);
    $stmt->bindParam(':created_by', $CreatedBy);
    // Step 4 : Execute the SQL Command
    if($stmt->execute())
    {
        echo "Event Details Successfully Saved";
    }
}
?>