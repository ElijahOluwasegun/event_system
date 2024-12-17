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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Saved</title>
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
            <p>Attendee Details Successfully Saved!</p>
        </div>
    </div>
    <div class="links">
        <a href="ViewAttendee.php">View Attendee</a>
    </div>
</body>
</html>