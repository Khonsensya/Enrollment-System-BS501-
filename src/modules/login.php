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
                        <input type= "submit" value="login" class="btn1">
                            <p>Not yet registered? <a href="#" class="btn3">Register Here</a></p>
                    </div>
                </form>
            </section>
        </section>
    </main>
</body>
</html>