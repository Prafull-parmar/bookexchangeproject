<?php

 session_start();
  
 $Error="";
 if(isset($_POST['login'])){
  include "dbconnect.php";
 /*if(isset($_POST['username'])&& isset($_POST['password']))*/
   $emailid=test_input($_POST['username']);
   $password=test_input($_POST['password']);
   /* $conn= mysqli_connect('localhost','root',"");
if(!$conn){
  die('Could not connect :'.mysqli_error());
}
echo'Connected successfully!';
 mysqli_select_db($conn,'vjti_book_exchange');*/

   /*$sql="SELECT `Email`,`Password` FROM `User_details` WHERE `Email`='$email'";*/
    $sql = "SELECT `Email`,`Password`,`Firstname`,`Lastname`,`ID_NUMBER`,`BRANCH`,`YEAR`,`COLLEGE`,`MOB_NO`FROM `user_details` WHERE `Email`='$emailid'";
 
    $query= mysqli_query($conn,$sql);
    if(!$query){
      die('could not get data:'.mysql_error());
    }
    else{
    $row=mysqli_fetch_array($query );
    if($password==$row['Password'])
    {
    $_SESSION['password']=$password;
    $_SESSION['email']=$emailid;
    $_SESSION['username']= $row["Firstname"]." ".$row["Lastname"];
   /* $_SESSION['usrname']= $row["Firstname"]." ".$row["Lastname"];*/
    $_SESSION['firstname']= $row["Firstname"];
    $_SESSION['lastname']= $row["Lastname"];
    $_SESSION['id']=$row['ID_NUMBER'];
    $_SESSION['branch']=$row['BRANCH'];
    $_SESSION['year']=$row['YEAR'];
    $_SESSION['college']=$row['COLLEGE'];
    $_SESSION['mob']=$row['MOB_NO'];
 // echo "Welcome $password with password $Username ";
  /*header("Location: registration.php");*/
   header("Location: User_Homepage.php");
}
else{
  $Error="Incorret Username or Password!";
}
}
mysqli_close($conn);
 }
 function test_input($data) {
  $data = trim($data);
  $data = strip_tags($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
      <link rel="stylesheet" href="stylefile.css">

  
</head>

<body>
<?php 
  include "header.php";
  ?>
 <!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>-->

<div class="login">
<form action="<?php $_PHP_SELF?>" method="POST" >
  <h4> Login Information </h4>
  
<span class="error"><?php echo $Error;?></span>
  <input  type="text" name="username"  clear placeholder="Enter Username(Email-id)" autofocus required/>
  <input  type="password" name="password" clear placeholder="Enter Password" required/>
  <li><a href="registration.php">Sign-up?</a></li>
  <input type="submit" name="login" value="Login" />
</form>
  </div> 
</body>
</html>