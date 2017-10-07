<?php
  session_start();
  if(isset($_SESSION["username"])){
  	$firstname=$_SESSION["firstname"];
  }
  $firstname=$email="";
  $oldpass=$pass=$confirmpass=$success="";
  $Error=$fnameErr=$passErr=$oldpassErr=$emailErr="";
  if (isset($_POST["submit"]))
{
	       $email = test_input($_POST["email"]);
	       $oldpass= test_input($_POST["oldpassword"]);
	       $pass = test_input($_POST["password"]);
     $confirm_pass = test_input($_POST["confirm_pass"]);
	     
	       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	         {
	             $emailErr = "Invalid email format"; 
	         }

	 if($pass == $confirm_pass)
  {
        if($oldpass==$pass){
        	$passErr="New Password cannot be same as Old Password";
        }
        else{
		    include ("dbconnect.php");
        
        
	  $sql="SELECT `EMAIL`,`PASSWORD` FROM `User_details` WHERE `EMAIL`='$email'";

           $query= mysqli_query($conn,$sql);
    if(!$query){
      die('could not get data:'.mysql_error());  
    }
    else{
    	$row=mysqli_fetch_array($query);
    	if($oldpass==$row["PASSWORD"]){
    		$sql="UPDATE `User_details` SET `PASSWORD`='$pass' WHERE `EMAIL`='$email' ";/*AND `FIRSTNAME`='$firstname'";*/
    		$query= mysqli_query($conn,$sql);
        			if(!$query){
      				die('could not update data:'.mysql_error());
     					 }
      				else{
      					$success="Password Changed Successfully!";
      					header('Refresh:1,URL = User_Homepage.php');
           				 
            			 
     				    }  
    			}
    	else{
    		$oldpassErr="Old Password is Incorrect!";
    	    }
      }
      mysqli_close($conn);
           
   }
		
   	}
    else{
          $passErr = "Passwords does not Match!";
		}
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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylefile.css">
<title>
Change Password
</title>
</head>
<body>
  <?php
 include "header.php" ;
 ?>
<div class="register">
  <h4 >Change Password</h4>
  <span style="color:green;"><?php echo $success;?> </span>
  <span class="error"><?php echo $Error;?> </span>
<form action="<?php $_PHP_SELF ?>" method="POST" >

<input type="text" name="email" value="<?php echo $email;?>" placeholder="Email-id:Example@gmail.com" required autofocus/>
<span class="error"><?php echo $emailErr;?> </span>
<br/>
<input type="password" name="oldpassword" value="" placeholder="Old Password" required />
<span class="error"><?php echo $oldpassErr;?> </span>
<br/>

<input type="password" name="password" value="" placeholder="New Password" required />
<span class="error"><?php echo $passErr;?> </span>
<br/>


<input type="password" name="confirm_pass" value="" placeholder="Confirm password" required />
<br/>

<!--<input type="file" name="profilepic" accept="image/*" required />
<br/>-->

<!--<img src="<?/* _SESSION['profilepic']*/ ?>" width=50px alt="p"/><br/>-->

<input type="submit" name="submit" value="Submit" placeholder="Submit" >

</form>
</div>
</body>
</html>
