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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Saved</title>
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
            <p>Room Details Successfully Saved!</p>
        </div>
    </div>
    <div class="links">
        <a href="ViewRoom.php">View Room</a>
    </div>
</body>
</html>