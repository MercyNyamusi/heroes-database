<?php

session_start();

include("connection.php");
include("functions.php");




?>

<?php
require './header.php';
?>


	
<form action="" method="post" class="form">
<div style="font-size: 30px;margin-left:17% ;margin-bottom:5%;color: white;">LOG IN </div>
    <input type="text" name="user_name" class="text-line" placeholder="User Name"  required><br>
    <input type="password" name="password" class="text-line" placeholder="Password" required style="margin-bottom:2%"><br><br><br><br>
    <input type="submit" value="LOGIN" class="btn btn-primary submit_signup" required style="height:50px; font-size:20px; color:#000000;;margin-left:18%" name="login"><br><br>
	<a href="signup.php" style="color:#FFFFFF;font-size:20px;margin-left:5%">Don't have an account? Click to<b> SIGN UP</b></a><br><br>

	<?php
	if (isset($_POST["login"])) {
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
	
		if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
	
			//read from database
			$login = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
			$run_login = mysqli_query($conn, $login);
			$user_data = mysqli_fetch_assoc($run_login);
			if ($user_data['password'] === $password && $user_data['user_name'] === $user_name) {
				echo "login successful";
				$_SESSION['user_name'] = $user_data['user_name'];
				//$_SESSION['password'] = $user_data['password'];
				header("Location: heroes.php");

				//echo "Login Succesful";
				//die;
			}
		}
		else {
			echo "wrong username or password!";
		}
	}
	
	
	?>
</body>

</html>