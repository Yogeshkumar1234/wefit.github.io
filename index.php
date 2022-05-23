<?php 

include 'config.php';


session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style1.css">

	<title>Login Form - Pure Coding</title>

	<style type="text/css">
  input{
  border:1px solid green;
  border-radius:2px;
  }
  h1{
  color:darkblue;
  font-size:18px;
  text-align:centre;
  }
</style>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email" autocomplete="off">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" autocomplete="off" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  autocomplete="off" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			
			<a href="forgot.php" class="btn">Forgot Password</a>
			<table cellspacing='5' align='center'>
            <!-- <tr><td>UserName:</td><td><input type='text' name='username'/></td></tr> -->
            <!-- <tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr> -->
             </table>
		</form>
	</div>
	
</body>
</html>
