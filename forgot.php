
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 
<form id="register-form" role="form" autocomplete="off" class="form" method="post">    
  <div class="form-group">
<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
  <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
</div>
  </div>
  <div class="form-group">
<input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
  </div>
  
  <input type="hidden" class="hide" name="token" id="token" value="">
</form>
<?php 
  /*session_start();
  include_once 'config.php';
  if(isset($_POST['submit']))
  {
  $user_name = $_POST['user'];
  $result = mysqli_query($conn,"SELECT * FROM Users
 where user_name='" . $_POST['user_name'] . "'");
  $row = mysqli_fetch_assoc($result);
  $fetch_user_name=$row['user_name'];
  $email_id=$row['email_id'];
  $password=$row['password'];
  if($user_name==$fetch_user_name) {
  $to = $email_id;
  $subject = "Password";
  $txt = "Your password is : $password.";
  $headers = "From: password_recover@agernic.com" . "\r\n" .
  "CC: user_email@example.com";
  mail($to,$subject,$txt,$headers);
  }
  else{
  echo 'invalid UserName';
  }
  }*/
include 'config.php';

// if(isset($_POST) & !empty($_POST)){
// $email = mysqli_real_escape_string($conn, $_POST['email']);
// $sql = "SELECT * FROM `users` WHERE email = '$email'";
// $res = mysqli_query($conn, $sql);
// $count = mysqli_num_rows($res);
// if($count == 1){
// echo "Send email to user with password";
// }else{
// echo "User name does not exist in database";
// }
// }
   
  
// $r = mysqli_fetch_assoc($res);
//    $password = $r['password'];
//    $to = $r['email'];
//    $subject = "Your Recovered Password";
 
//    $message = "Please use this password to login " . $password;
//    $headers = "From : vivek@codingcyber.com";
//    if(mail($to, $subject, $message, $headers)){
//       echo "Your Password has been sent to your email id";
//    }else{
//      echo "Failed to Recover your password, try again";
// }

if(isset($_POST) & !empty($_POST)){
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $sql = "SELECT * FROM `users` WHERE email = '$email'";
  $res = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
  if($count == 1){
  $r = mysqli_fetch_assoc($res);
  $password = $r['password'];
  $to = $r['email'];
  $subject = "Your Recovered Password";
   
  $message = "Please use this password to login " . $password;
  $headers = 'From: webmaster@yourdot.com' . "\r\n" .
   'Reply-To: webmaster@yourdot.com' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();
   ini_set("SMTP","pop3.mail.yahoo.com");
ini_set("smpt_port","995");
// if you need authorization
ini_set("smtp_username","username");
ini_set("smtp_password","password");
 // smtp mail server name

mail($to, $subject, $body, $headers);

  if(mail($to, $subject, $message, $headers)){
  echo "Your Password has been sent to your email id";
  }else{
  echo "Failed to Recover your password, try again";
  }
   
  }else{
  echo "Email does not exist in database";
  }
  }
		
1?>