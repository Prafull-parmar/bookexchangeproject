<?php
  session_start();
  $firstname=$lastname=$id_no=$branch=$year=$college=$mob=$email="";
  $pass=$confirmpass="";
  $Error=$fnameErr=$lnameErr=$idErr=$clgErr=$mobErr=$passErr=$emailErr="";
  if (isset($_POST["register"])){

	
	  $firstname = test_input($_POST["firstname"]);
	   $lastname = test_input($_POST["lastname"]);
	      $id_no = test_input($_POST["id_no"]);
	     $branch = test_input($_POST["branch"]);
	       $year = test_input($_POST["year"]);
	    $college = test_input($_POST["college"]);
	        $mob = test_input($_POST["mob"]);
	       $pass = test_input($_POST["password"]);
   $confirm_pass = test_input($_POST["confirm_pass"]);
	      $email = test_input($_POST["email"]);
	      if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
          $fnameErr = "Only letters and white space allowed";
          }
      else{
          if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
          $lnameErr = "Only letters and white space allowed";
          }
       else {
           if (!preg_match("/^[0-9]{10}$/",$mob)) {
          $mobErr = "Only digits are allowed! Length should be 10 digits";
          }
	       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	         {
	             $emailErr = "Invalid email format"; 
	         }
	     else{
			 if($pass == $confirm_pass)
			{

		    include ("dbconnect.php");
			$sql="INSERT INTO `User_details` VALUES('$firstname','$lastname','$id_no','$branch','$year','$college','$mob','$email','$pass')";
		 	if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		   header("Location: login.php");
		     }
		    else {
			   $Error= mysqli_error($conn);
		        /*echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
		          }

		     mysqli_close($conn);
   	       }
    else{
          $passErr = "Passwords does not Match!";
		}
	 }
   }
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
Registration form
</title>
</head>
<body>
  <?php
 include "header.php" ;
 ?>
<div class="register">
  <h4 >Registration Form</h4>
  <span class="error"><?php echo $Error;?> </span>
<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart\meta-data">

<input type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="First Name" autofocus required />
<span class="error"><?php echo $fnameErr;?> </span>
<br/>


<input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name" required />
<span class="error"><?php echo $lnameErr;?> </span>
<br/>


<input type="text" name="id_no" value="<?php echo $id_no;?>" placeholder="ID Number" required />
<span class="error"><?php echo $idErr;?> </span>
<br/>
<!--<input type="text" name="branch" value="" placeholder="Branch" required />-->
	<select name="branch"  placeholder="Select Branch" required />
	<option value="None" >
    	Select Branch
    </option>
    <option value="Civil Engineering(Btech)">
		Civil Engineering(BTech)
	</option>

 	<option value="Computer Engineering(Btech)">

		Computer Engineering(BTech)
	</option>

	<option value="Electrical Engineering(Btech)"> 
  		Electrical Engineering(BTech)
  	</option>

  	<option value="Electronics Engineering(Btech)"> 
  		Electronics Engineering(BTech) 
  	</option>
 	<option value="Elecronics and Telecommunication Engineering(BTech)">
  		Elecronics and Telecommunication Engineering(BTech)
  	</option>
	<option value="Information Technology">
   		Information Technology
   	</option>
	<option value="Mechanical Engineering(BTech)">
 		Mechanical Engineering(BTech)
 	</option>
 	<option value="Production Engineering(BTech)">
		Production Engineering(BTech)
	</option>
	<option value="Textile Engineering(BTech)">
 		Textile Engineering(BTech)
 	</option>
 	 <option value="Civil Engineering(MTech)">
		Civil Engineering(MTech)
	</option>

 	<option value="Computer Engineering(MTech)">

		Computer Engineering(MTech)
	</option>

	<option value="Electrical Engineering(MTech)"> 
  		Electrical Engineering(MTech)
  	</option>

  	<option value="Electronics Engineering(MTech)"> 
  		Electronics Engineering(MTech) 
  	</option>
 	<option value="Elecronics and Telecommunication Engineering(MTech)">
  		Elecronics and Telecommunication Engineering(MTech)
  	</option>
	<option value="Information Technology">
   		Information Technology
   	</option>
	<option value="Mechanical Engineering(MTech)">
 		Mechanical Engineering(MTech)
 	</option>
 	<option value="Production Engineering(MTech)">
		Production Engineering(MTech)
	</option>
	<option value="Textile Engineering(MTech)">
 		Textile Engineering(MTech)
 	</option>
		<option value="Diploma in Mechanical Engineering ">
			DME – Diploma in Mechanical Engineering 
			</option>
		<option value="Diploma in Electrical Engineering(BTech)">
			DEE - Diploma in Electrical Engineering
		</option>
		<option value="Diploma in Electronics Engineering">
			DElnE - Diploma in Electronics Engineering
  		</option>
		<option value="-Diploma in Civil and Environmental Engineering">
			DCEE -Diploma in Civil and Environmental Engineering
		</option>
		<option value="Diploma in Textile Manufactures">
			DTM – Diploma in Textile Manufactures
		</option>
		<option value="Diploma in Technical Chemistry">
			DTC - Diploma in Technical Chemistry 
		</option>
</select>

<br/>
 

<select  name="year" placeholder="Degree year" required >
    <option value="None" >
        Select Year
     </option>option>
	<option value="1st Year">
		1st year
	</option>
	<option value="2nd year">
		2nd Year
	</option>
	 <option value="3rd Year">
	    3rd Year
	 </option>
	<option value="4th Year">
		4th Year
	</option>

	</select>
<br/>
<input type="text" name="college" value="<?php echo $college;?>" placeholder="College Name" />
<span class="error"><?php echo $clgErr;?> </span>
<br/>	

<input type="text" name="mob" value="<?php echo $mob;?>" placeholder="Mobile Number" required />
<span class="error"><?php echo $mobErr;?> </span>
<br/>

<input type="text" name="email" value="<?php echo $email;?>" placeholder="Email-id:Example@gmail.com" required />
<span class="error"><?php echo $emailErr;?> </span>
<br/>


<input type="password" name="password" value="" placeholder="Password" required />
<span class="error"><?php echo $passErr;?> </span>
<br/>


<input type="password" name="confirm_pass" value="" placeholder="Confirm password" required />
<br/>

<!--<input type="file" name="profilepic" accept="image/*" required />
<br/>-->

<!--<img src="<?/* _SESSION['profilepic']*/ ?>" width=50px alt="p"/><br/>-->

<input type="submit" name="register" value="Register" placeholder="Submit" >

</form>
</div>
</body>
</html>
