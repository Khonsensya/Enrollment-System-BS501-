<?php include $_SERVER['DOCUMENT_ROOT'] . '/Enrollment-System-BS501-/build/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luv U University</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/modules.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>pwd-css/animation.css">
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/data.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . BASE_URL . 'pwd-php/components/navbar.php'; ?>
	
    <main class="main_login">
        <aside class="left"></aside>
        <aside class="right">
            <img src="<?php echo BASE_URL; ?>walkman-imgs/icon/icon2.png" alt="">
            <h3 class="title">Welcome to <span>Luv U University</span> Portal</h3>
            <form action="./dashboard.php">
                <label for="email">Email Address:</label>
                    <input type= "text" name="email" required><br>
                <div class="password-container">
                    <label for= "password">Password:</label>
                        <input type= "password" name="password" id="password" #passwordrequired>
                        <input type="checkbox" id="toggle-password">
                        <a href="#" class="forgot">Forgot Password?</a>
                </div><br>

                <script>
                    let togglePassword = document.getElementById('toggle-password');
                    let password = document.getElementById('password');

                    togglePassword.onchange = function () {
                        if (document.getElementById('toggle-password').checked) {
                            password.type = "text";
                        } else {
                            password.type = "password";
                        }
                    }
                </script>
                    
                <div class="action-container">
                    <input type= "submit" value="login" class="btn-1">
                        <p>Not yet registered? <a href="./enroll.php">Register Here</a></p>
                </div>
            </form>
        </aside>
    </main>

</body>
</html>