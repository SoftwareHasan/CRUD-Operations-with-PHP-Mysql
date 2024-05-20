<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box-form-box">

        <?php 
          
         include("config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            //verfying the unique email address

            $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0 ){
                echo "<div class='message'>
                          <p>This email is used, Try another One Please!</p>
                      </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
             }
             else{
    
                mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");
    
                echo "<div class='message'>
                          <p>Registration successfully!</p>
                      </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
             
    
             }
    
             }else{
        
        
        
        ?>
            <header>Sign Up</header>
            <form method="post" class="form-box" action="">
            <div class="filed">
                     <label for="username">UserName</label>
                     <input type="text" class="input" id="username" name="username" required>
            </div>
            
            <div class="filed">
                <label for="email">Email</label>
                <input type="email" class="input" id="email" name="email" required>
            </div>

            <div class="filed">
                <label for="age">Age</label>
                <input type="text" class="input" id="age" name="age" required>
            </div>

            <div class="filed">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input" name="password" required>
            </div>

            <div class="filed">
                <input type="submit" class="btn" id="submit" value="submit" name="submit" required>
           </div>

           <div class="links">
             Already have a account? <a href="index1.php">Login here</a>
           </div>

            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>