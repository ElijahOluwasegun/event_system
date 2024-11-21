<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Serif+Oriya:wght@400..700&display=swap" rel="stylesheet">
    <!-- Do your own css styling -->
</head>
<body>
    <h1 class="header">Enter Staff Details: </h1>
    <form action="InsertStaff.php" method="post" autocomplete="on">
        <div class="outside-form">
            <div class="outside-input-group">
                <div class="input-group">
                    <label class="staffn" for="">Staff Number:</label>
                    <input type="text" name="Stno" placeholder="ST999" required>
                </div>
                    <div class="input-group">
                        <label for="">First Name:</label>
                        <input class="wide_text" type="text" name="Fname" placeholder="John" required>
                    </div>
                    <div class="input-group">
                        <label for="">Last Name:</label>
                        <input class="wide_text" type="text" name="Lname" placeholder="Doe" required>
                    </div>
            </div>  
            <div class="outside-input-group">
                <div class="input-group">
                    <label for="">Phone Number: </label>
                    <input type="text" name="Phoneno" placeholder="+256999999999"  required>
                </div>
                <div class="input-group">
                    <label for="">Email:</label>
                    <input class="wide_text" type="email" name="email" placeholder="johndoe@gmail.com"  required>
                </div>
                <div class="input-group">
                    <label for="">Category:</label>
                    <select name="Cadre" id="" required>
                        <option value="">==== Select ====</option>
                        <option value="Admin">System Administrator</option>
                        <option value="Manager">Manager</option>
                        <option value="Waiter">Waiter</option>
                    </select>
                </div>
            </div>
            <div class="btn">
                <button type="submit" name="Save">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>