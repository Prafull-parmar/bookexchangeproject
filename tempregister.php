<?php
  session_start();
    if(isset($_SESSION['Username']))
/*	if(isset($_SESSION['register']))*/{
  $username=$_SESSION['Username'];
  $password=$_session['Password'];
  echo "welcome $username and $password ";
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
	$_SESSION['profilepic']=$_POST['profilepic'];

/*$firstname= strip_tags($_POST['Firstname']);
	$lastname= strip_tags($_POST['Lastname']);
	$email= strip_tags($_POST['email']);
	$pass= strip_tags($_POST['password']);
	$confirmpass= strip_tags($_POST['confirm_password']);
*/
	}
?>
<!DOCTYPE HTML>
<head>
<link rel="stylesheet" href="stylefile.css">
<title>
Registration form
</title>
</head>
<body>
  <?php
 include "header.php" ;
 ?>
<div class="register">
  <h1 >Registration Form</h1>

<form action="login.html" method="post">
<div class="reginput">
<label>Firstname:</label>
<input type="text" name="firstname" value="" placeholder="First Name" autofocus>
<br/>
</div>
<div class="reginput">
<label>Lastname:</label>
<input type="text" name="lastname" value="" placeholder="Last Name" required />
<br/>
</div>
<div class="reginput">
<label>Id No:</label>
<input type="text" name="id_no" value="" placeholder="" required />
<br/>
</div>
<div class="reginput">
<select>
	<option name="1st Year">
	 1st year
	</option>
	<option name="2nd year">
		2nd Year
	</option>
</select>Branch:</label>
<input type="text" name="branch" value="" placeholder="Branch" required />
<br/>
</div>
<div class="reginput">
<label>Year:</label>
<input type="text" value="" placeholder="Degree Year" required /><br/>
<br/>
</div>
<div class="reginput">
<label>Email:</label>
<input type="text" value="" placeholder="Email-id:Example@gmail.com" required />
<br/>
</div>
<div class="reginput">
<label>Password</label>
<input type="password" value="" placeholder="Password" required />
<br/>
</div>
<div class="reginput">
<label>Confirm Password:</label>
<input type="password" value="" placeholder="Confirm password" required />
</div>
<div class="reginput">
<input type="file" name="profilepic" accept="images/*" required />
<br/>
</div>
<img src="<? _SESSION['profilepic'] ?>" width=50px alt="p"/>
<div class="reginput">
<input type="submit" name="register" value="Register" placeholder="Submit">
<div>
</form>
</div>
</body>
</html>
