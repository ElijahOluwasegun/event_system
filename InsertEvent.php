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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Saved</title>
    <style>
        /* body {
            display: flex;
            flex-dire
            justify-content: center;
            align-items: center;
            align-content: center;
            align-self: center;
        } */

        img {
            width: 5%;
        }

        .sv-outer {
            display: flex;
            justify-content: center;
        }

        .sv-inner {
            display: flex;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: rgba(102, 51, 0, 0.75);
        }
        
        p {
            font-weight: bold;
            color: white;
        }

        .links {
            display:flex;
            justify-content: center;
            gap: 10px;
            padding: 20px 0px;
        }

        a {
            background-color: rgba(255, 207, 140, 1);
            border: 1px solid none;
            border-radius: 5px;
            padding: 20px 10px;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sv-outer">
        <img src="images/saved_staff.png" alt="">
        <div class="sv-inner">
            <p>Event Details Successfully Saved!</p>
        </div>
    </div>
    <div class="links">
        <a href="ViewEvent.php">View Event</a>
    </div>
</body>
</html>