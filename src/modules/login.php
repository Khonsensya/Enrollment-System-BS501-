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

                <p style="color: red;">
                    <?php
                        #--php code for handling input mismatch--
                        
                        $prompt = "";
                        if(count($_POST) > 0)
                        {
                            $isSuccess = 0;
                            $conn = mysqli_connect("localhost", "root", "", "enrolled_users"); #<= enrolled_users db created

                            $email = $_POST['email'];
                            $sql = (
                                "
                                    SELECT * FROM auth_users WHERE = ?, ?
                                "
                            );

                            $statement = $conn->prepare($sql); # <= readies sql command
                            $statement -> bind_param(':user_email', $email);
                            $statement -> bind_param(':user_password', $password);
                            $statement -> execute();
                            $resul = $statement -> get_result();

                            while($row = $result -> fetch_assoc())
                            {
                                if(!empty($row))
                                {
                                    $hashedPassword = $row['user_password'];
                                    if(password_verify($_POST['password'], $hashedPassword))
                                    {
                                        $isSuccess = 1;
                                    }
                                }
                            }

                            if($isSuccess == 0)
                            {
                                echo "Invalid email or password. Please try again!";
                            }
                            else
                            {
                                header("Location: ./src/modules/login.php");
                            }
                        }
                        
                    ?>
                </p>
                
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
