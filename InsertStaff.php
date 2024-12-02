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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Saved</title>
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
            background-color: #47820D;
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
            background-color: blue;
            border: 1px solid none;
            border-radius: 5px;
            padding: 20px 10px
        }

        a:nth-child(1) {
            background-color: orange;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        a:nth-child(2) {
            background-color: green;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        a:nth-child(3) {
            background-color: red;
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
            <p>Staff Details Successfully Saved!</p>
        </div>
    </div>
    <div class="links">
        <a href="ViewStaff.php">View Staff</a>
        <a href="UpdateStaff.php">Update Staff</a>
        <a href="DeleteStaff.php">Delete Staff</a>
    </div>
</body>
</html>