<?php
    $is_invalid = false;
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        require '../data/mysql-connection.php';

        $sql = sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($_POST['email']));

        $result = $mysqli->query($sql);

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

                <form method="POST">
                    <label for="email">Email Address:</label>
                        <input type= "text" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required><br>
                    <label for= "password">Password:</label>
                    <div class="password-container">
                            <input type= "password" name="password" id="password" class="password" required>
                            <input type="checkbox" id="toggle-password">
                    </div>
                    
                </p>
                    <div class="action-container">
                        <input type= "submit" name="login" value="login" class="btn1">
                            <p style="color: red;">
                                <?php if($is_invalid): ?>
                                <em>Invalid Login</em>
                            <?php endif; ?>
                        <p>Not yet registered? <a href="./signup.php" class="btn3">Register Here</a></p>
                        <a href="#" class="forgot">Forgot Password?</a><br>
                    </div>
                </form>
            </section>
        </section>
    </main>

    <script defer src="../js/check-pass.js"></script>
</body>
</html>
