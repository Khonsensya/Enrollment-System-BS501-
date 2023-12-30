<?php
    // session_start();
    //     include '../data/mysql-connection.php';
    //     include '../process/function.php';

    //     if($_SERVER['REQUEST_METHOD'] == "POST") {
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];

    //         if(!empty($username) && !empty($password)) {
    //             $query = "SELECT * FROM users WHERE Email = '$email' limit 1";

    //             $result = mysqli_query($mysqli, $query);

    //             if($result) {
    //                 if($result && mysqli_num_rows($result) > 0) {
    //                     $user_data = mysqli_fetch_assoc($result);
                                        
    //                     if ($user_data['password'] === $password) {
    //                         $_SESSION['user_id'] = $user_data['user_id'];
    //                         header("Location: dashboard.php");
    //                         die;
    //                     }
    //                 }
    //             }
    //             echo '<p>email or password is incorrect</p>';
    //         } else {
    //             echo '<p>enter valid information</p>';
    //         }
    //     }
?>

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

                

                <form action="./dashboard.php" method="POST">
                    <label for="email">Email Address:</label>
                        <input type= "text" name="email" required><br>
                    <div class="password-container">
                        <label for= "password">Password:</label>
                            <input type= "password" name="password" id="password" required>
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
                    
                    <p style="color: red;">
                
                </p>
                    <div class="action-container">
                        <input type= "submit" name="login" value="login" class="btn1">
                        <p>Not yet registered? <a href="./signup.php" class="btn3">Register Here</a></p>
                    </div>
                </form>
            </section>
        </section>
    </main>
</body>
</html>
