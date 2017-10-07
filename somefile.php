<?php
    session_start();

	if(isset($_SESSION['register'])){
	$firstname= strip_tags($_POST['Firstname']);
	$lastname= strip_tags($_POST['Lastname']);
	$email= strip_tags($_POST['email']);
	$pass= strip_tags($_POST['password']);
	$confirmpass= strip_tags($_POST['confirm_password']);

	$firstname= stripslashes($_POST['Firstname']);
	$lastname= stripslashes($_POST['Lastname']);
	$email= stripslashes($_POST['email']);
	$pass= stripslashes($_POST['password']);
	$confirmpass= stripslashes($_POST['confirm_password']);

/*$firstname= strip_tags($_POST['Firstname']);
	$lastname= strip_tags($_POST['Lastname']);
	$email= strip_tags($_POST['email']);
	$pass= strip_tags($_POST['password']);
	$confirmpass= strip_tags($_POST['confirm_password']);
*/
	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="stylefile.css">

</head>
<body>
  <?php
 include "header.php" ;
 ?>
<h1 style="font-family: Times New Roman;">Registration Form</h1>
<div class="register">
<form class="register" action="login.html" method="post">
  <div>
<label>Firstname:</label>
<input type="text" value="" placeholder="First Name" autofocus>
</div>
<br/><label>Lastname:</label>
<input type="text" value="" placeholder="Last Name" required />
<div>
<br/><label>Branch:</label>
<input type="text" value="" placeholder="Branch" required />
</div>
<br/><label>Year:</label>
<input type="text" value="" placeholder="Degree Year" required /><br/>
<br/><label>Email:</label>
<input type="text" value="" placeholder="Email-id:Example@gmail.com" required />
<br/><label>Password</label>
<input type="password" value="" placeholder="Password" required />
<input type="password" value="" placeholder="Confirm password" required />
<input type="file" name="profilepic" accept="image/*" required />
<br/><!--<img src="Images\shiva.jpg" height=50% alt="Image" /> -->
<!--<img src="<?_SESSION['profilepic'] ?>" width=50px alt="p"/>-->

<input type="submit" name="register" value="Register" placeholder="Submit">
</form>
</div>
</body>
</html>
