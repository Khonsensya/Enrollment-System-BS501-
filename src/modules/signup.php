<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . DATA . 'data.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_Head_Icon1; ?>"/>
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $link_2; ?>style.css">
    <link rel="stylesheet" href="<?php echo $link_1; ?>css/button.css">
    <link rel="stylesheet" href="<?php echo $link_1; ?>css/module.css">
    <link rel="stylesheet" href="<?php echo $link_1; ?>css/icon.css">
    <link rel="stylesheet" href="<?php echo $link_1; ?>css/forms.css">
</head>
<body>
    <main class="forms1">
        <section class="center">
            <section class="login">
                <a href="<?php echo $link_2; ?>index.php" class="btn3 back">X</a>
                <img src="<?php echo $link_1; ?>assets/imgs/icon/ducku.png" alt="" class="icon-s">
                <h4 class="title"><span>DCER University</span> Portal</h4>

                <form action="<?php echo $link_1; ?>process/signup-process.php" method="post">
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

    <script defer src="<?php echo $link_1; ?>js/check-pass.js"></script>
</body>
</html>
