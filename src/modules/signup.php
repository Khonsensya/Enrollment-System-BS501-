<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title> <!-- title -->
    <link rel="icon" href="<?php echo $_C1_Head_Icon; ?>"/> <!-- icon -->
    <!-- CSS STYLESHEETS LINKS ARE HERE -->
    <link rel="stylesheet" href="<?php echo $_C1_style_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C1_button_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C1_module_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C1_icon_css; ?>">
    <link rel="stylesheet" href="<?php echo $_C1_forms_css; ?>">
</head>
<body>
    <main class="forms1">
        <section class="center">
            <section class="login">
                <a href="<?php echo $_C1_index; ?>" class="text_button back">X</a>
                <img src="<?php echo $_C1_body_icon; ?>" alt="" class="icon-s">
                <h4 class="title"><span>DCER University</span> Portal</h4>

                <form action="<?php echo $_C1_signup_process_php; ?>" method="post">
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
                        <input type= "submit" value="Sign Up" class="btn1">
                            <a href="<?php echo $_C1_login; ?>" class="text_button">Already have an account?</a>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <script defer src="<?php echo $_C1_check_pass_js; ?>"></script>
</body>
</html>
