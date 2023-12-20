<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luv U University</title>
    <link rel="stylesheet" href="./pwd-css/style.css">
    <link rel="stylesheet" href="./pwd-css/modules.css">
    <link rel="stylesheet" href="./pwd-css/components.css">
    <link rel="stylesheet" href="./pwd-css/responsive.css">
    <link rel="stylesheet" href="./pwd-css/animation.css">
</head>
<body>
    <form action= "">
        <label for= "fname">First Name:</label>
        <input type="text" name="fname" placeholder="Given Name"><br><br>
        <label for= "lname">Last Name:</label>
        <input type="text" name="lname" placeholder="Surname"><br><br>
        <label for= "mname">Middle Name(optional):</label>
        <input type="text" name="mname" placeholder="Middle Name"><br>
        <p>Gender:</p>
        <label for= "male">Male</label>
        <input type="radio" id="male" name="male"><br><br>
        <label for= "female">Female</label>
        <input type="radio" id="female" name="female"><br><br>
        <!--need ayusin-->
        <label for= "age">Age:</label>
		<input type= "text" name="age" maxlength="3"><br><br>
        <label for= "email">Email Address:</label>
        <input type="text" id="email" name="email"><br><br>
        <!--need ayusin-->
        <label for= "phone">Phone Number:*</label>
        <input type="tel" name="phone" placeholder="09*********" maxlength="11" \d* required */><br><br>
        <!--need ayusin-->
        <label for= "password">Password:*</label>
        <input type="text" required ><br><br>
        <input type="submit" name="submit" value="Create Account">
        
</body>
</html>