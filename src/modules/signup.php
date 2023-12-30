<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duck Cover En Roll</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/icon.css">
    
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
    <main class="forms1">
        <section class="center">
            <section class="login">
                <a href="../../index.php" class="btn3 back">X</a>
                <img src="../assets/imgs/background/bg1.jpeg" alt="" class="icon-s">
                <h4 class="title"><span>DCER University</span> Portal</h4>

                <form action="../process/signup-process.php" method="post">
                    <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" required><br>

                    <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" required><br>
                                 
                    <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required><br>

                    <label for="password">Password:</label>
                    <div class="password-container">
                            <input type="password" name="password" id="password" class="password" required>
                            <input type="checkbox" id="toggle-password">
                    </div><br>

                    <label for="confirmpassword">Confirm Password:</label>
                    <div class="password-container">
                            <input type="password" name="confirmpassword" id="password1" class="password" required>
                            <input type="checkbox" id="toggle-password1">
                    </div><br>
                    
                    <div class="action-container">
                        <input type= "submit" value="Sign up" class="btn1">
                            <a href="./login.php" class="btn3">Already have an account?</a>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <script defer src="../js/check-pass.js"></script>
</body>
</html>
