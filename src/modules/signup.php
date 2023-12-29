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
</head>
<body>
    <main class="login1">
        <section class="center">
            <section class="login">
                <img src="../assets/imgs/background/bg1.jpeg" alt="" class="icon-s">
                <h3 class="title">Duck Cover <span>En Roll University</span> Portal</h3>

                <form action="./dashboard.php" method="post">
                    <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" required><br>

                    <label for="lname">Last Name:</label>
                        <input type="text" id="lname" name="lname" required><br>
                                 
                    <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required><br>

                    <div class="password-container">
                        <label for= "password">Password:</label>
                            <input type="password" name="password" id="password" #passwordrequired><br>

                        <label for="confirmpassword">Confirm Password:</label>
                            <input type="password" name="password" id="password" #passwordrequired>

                    </div><br>
                    <div class="action-container">
                        <input type= "submit" value="Sign up" class="btn1">
                            <a href="./login.php" class="btn3">Already have an account?</a>
                    </div>
                </form>
            </section>
        </section>
    </main>
</body>
</html>
