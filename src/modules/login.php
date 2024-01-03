<!-- PHP INCLUDE / REQUIRE LINKS ARE HERE -->
<?php include '../../config.php'; ?>
<?php include $_C1_data_php; ?>

<?php
    $is_invalid = false;
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        require $_C1_mysql_connection_php;

        $result = $mysqli->query(sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($_POST['email'])));
        $user = $result->fetch_assoc();
        
        if($user) {
            if(password_verify($_POST['password'], $user['Password'])){
                session_start();
                session_regenerate_id();
                $_SESSION['user_id'] = $user['User_ID'];
                header("Location: ./dashboard/dashboard.php");
                exit();
            }
            $is_invalid = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_Head_Title; ?></title>
    <link rel="icon" href="<?php echo $_C1_Head_Icon; ?>"/>
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

                <form method="POST">
                    <label for="email">Email Address:</label>
                        <input type= "text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br>
                    <label for= "password">Password:</label>
                    <div class="password-container">
                            <input type= "password" name="password" id="password" class="password" required>
                            <input type="checkbox" id="toggle-password">
                    </div>
                    <div class="action-container">
                        <input type= "submit" name="login" value="Login" class="btn1">
                            <p style="color: red;">
                                <?php if($is_invalid): ?>
                                    <em>Invalid Login</em>
                                <?php endif; ?>
                            </p>
                        <p>Not yet registered? <a href="<?php echo $_C1_signup; ?>" class="text_button">Register Here</a></p>
                        <a href="#" class="forgot">Forgot Password?</a><br>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <!-- JAVASCRIPT SCRIPTS LINKS ARE HERE -->
    <script defer src="<?php echo $_C1_check_pass_js; ?>"></script>
</body>
</html>
