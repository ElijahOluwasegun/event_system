
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Event</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- Do your own css styling -->
</head>
<body>
    <h1 class="header">Enter Event Details: </h1>
    <form action="InsertEvent.php" method="post">
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Event Number:</label>
            <input type="text" name="Eventno" placeholder="EV999" required>
        </div>
        <div class="input-group">
            <label for="">Event Name:</label>
            <input class="wide_text" type="text" name="EventName" required>
        </div>
        <div class="input-group">
            <label for="">Event Description: </label>
            <input class="wide_text" type="text" name="Edescript" required>
        </div>
    </div>
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Event Start Date: </label>
            <input type="date" name="EventStartDate" min="2024-10-01" max="2025-05-01" required>
        </div>
        <div class="input-group">
            <label for="">Event End Date: </label>
            <input type="date" name="EventEndDate" min="2024-10-01" max="2025-05-01" required>
        </div>
    </div>
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Event Start Time:</label>
            <input type="time" name="EventStartTime" required>
        </div>
        <div class="input-group">
            <label for="">Event End Time:</label>
            <input type="time" name="EventEndTime" max=1800 required>
        </div>
    </div>
    <div class="outside-input-group">
        <!-- <div class="input-group">
            <label for="">Event Room:</label>
            <input type="text" name="Roomno" required>
        </div> -->
        <div class="input-group">
            <label for="">Host Organization:</label>
            <input type="text" name="HostOrg" required>
        </div>
        <div class="input-group">
            <label for="">Event Organizer:</label>
            <input type="text" name="EventOrg" required>
        </div>
        <div class="input-group">
            <label for="">Organizers Email:</label>
            <input type="email" name="Organizeremail" placeholder="eventplanner@gmail.com" required>
        </div>
    </div>
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Organizers Phone Number:</label>
            <input type="text" name="Organizerphoneno" placeholder="+256999999999" required>
        </div>
        <div class="input-group">
            <label for="">Attendee Size:</label>
            <select name="Attsize" id="" required>
                <option value="">==== Select ====</option>
                <option value="small">1-20</option>
                <option value="medium">1-50</option>
                <option value="large">1-100</option>
                <option value="largest">100+</option>
            </select>
        </div>
    </div>
    <div class="outside-input-group2">
        <div class="input-group2">
            <label for="">Additional Comments:</label>
            <input class="wider_text" type="text" name="AdditionalComments">
        </div>
    </div>
    <div class="outside-input-group">
        <div class="input-group">
            <label for="">Created By:</label>
                <select name="Created_by" required>
                    <option value="">==== Select Staff ====</option>
                    <?php
                    // Fetch staff members from the database
                    include("configurations/connect.php");
                    $stmt = $conn->query("SELECT id, Fname, Lname FROM staff");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['Staffno']} {$row['Fname']} {$row['Lname']}</option>";
                    }
                    ?>
                </select>
        </div>
    </div>
        <div class="btn">
            <button type="submit" name="Save">Submit</button>
        </div>
    </form>
</body>
</html>