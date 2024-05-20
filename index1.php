<?php
session_start();
include("config.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['age'] = $row['Age'];
        $_SESSION['id'] = $row['Id'];
        header("Location: Home.php");
        exit; // Stop further execution
    }else{
        $login_error = true; // Flag indicating login error
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box-form-box">
            <header>Login</header>
            <form method="post" class="form-box" action="">
             <?php 
                if(isset($login_error) && $login_error == true) {
                    echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                          </div>";
                }
             ?>
                <div class="filed">
                    <label for="email">Email</label>
                    <input type="email" class="input" id="email" name="email" required>
                </div>

                <div class="filed">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input" name="password" required>
                </div>

                <div class="filed">
                    <input type="submit" class="btn" id="submit" value="submit" name="submit" required>
                </div>

                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up here</a>
                </div>
            </form>
        </div>
    </div>   
</body>
</html>
