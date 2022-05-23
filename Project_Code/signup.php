<?php
session_start();

include("connection.php");
include("functions.php");




?>


<?php
require './header.php';
?>
    

    <form action="" method="post" class="form">
    <div style="font-size: 30px;margin-left:17% ;margin-bottom:5%;color: white;">SIGN UP</div>

    <input type="text" name="user_name" class="text-line" placeholder="User Name"  required><br>
    <input type="password" name="password" class="text-line" placeholder="Password" required style="margin-bottom:2%"><br><br><br><br>
    <input type="submit" value="SIGN UP" class="btn btn-primary submit_signup" required style="height:50px; font-size:20px; color:#000000;;margin-left:18%" name="signup"><br><br>
    <a href="login.php" style="color:#FFFFFF;font-size:20px;margin-left:5%">Have an account already? Click to<b> LOGIN</b></a><br><br>
   
</form>

        

        <?php
    if (isset($_POST['signup'])) {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    
        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
    
            //save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_name,password) VALUES ('$user_name','$password')";
    
            mysqli_query($conn, $query);
    
            header("Location: login.php");
            die;
        } else {
            echo "Fail to login";
            echo "Please enter some valid information!";
        }
    }
    ?>
    </div>
   
</body>

</html>