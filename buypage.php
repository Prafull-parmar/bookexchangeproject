<!--<?php
  session_start();
  $firstname=$lastname=$id_no=$branch=$year=$college=$mob=$email="";
  $pass=$confirmpass="";
  $fnameErr=$lnameErr=$idErr=$clgErr=$mobErr=$passErr=$emailErr="";
  if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	/*if(isset($_SESSION['register'])){*/
  /*$username=$_SESSION['Username'];
  $password=$_session['Password'];
  echo "welcome $username and $password ";
	$firstname= strip_tags($_POST['Firstname']);
	$lastname= strip_tags($_POST['Lastname']);
	$email= strip_tags($_POST['email']);
	$pass= strip_tags($_POST['password']);
	$confirmpass= strip_tags($_POST['confirm_password']);

	$firstname= stripslashes($_POST['Firstname']);
	$lastname= stripslashes($_POST['Lastname']);
	$email= stripslashes($_PO$lnameErr=ST['email']);
	$pass= stripslashes($_POST['password']);
	$confirmpass= stripslashes($_POST['confirm_password']);
	$_SESSION['profilepic']=$_POST['profilepic'];

 {*/
	  $firstname = test_input($_POST["firstname"]);
	   $lastname = test_input($_POST["lastname"]);
	      $id_no = test_input($_POST["id_no"]);
	     $branch = test_input($_POST["branch"]);
	       $year = test_input($_POST["year"]);
	    $college = test_input($_POST["college"]);
	        $mob = test_input($_POST["mob"]);
	    /*$email = test_input($_POST["email"])*/
	       $pass = test_input($_POST["password"]);
   $confirm_pass = test_input($_POST["confirm_pass"]);

	   	$email = test_input($_POST["email"]);
	         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	         {
	             $emailErr = "Invalid email format"; 
	         }
	 if($pass == $confirm_pass)
	{

		    include ("dbconnect.php");
	$sql="INSERT INTO `User_details` VALUES('$firstname','$lastname','$id_no','$branch','$year','$college','$mob','$email','$pass')";
		 	if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
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

/*$firstname= strip_tags($_POST['Firstname']);
	$lastname= strip_tags($_POST['Lastname']);
	$email= strip_tags($_POST['email']);
	$pass= strip_tags($_POST['password']);
	$confirmpass= strip_tags($_POST['confirm_password']);
*/
	
?>-->
<?php
   /*session_start();*/
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
   }
   else
   	 $username="User";
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="cssnewfie.css">

  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>
<!-- <div class="jumbotron text-center">
  <img src="Images\books-stack.png"  alt="Logo">
    <h1>VJTI Book Exchange</h1>      
    <p>A website where VJTI's students can buy and sell Engineering Books!</p>
  </div>-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="User_Homepage.php">Home</a></li>
     <li ><a href="About_us.php">About Us</a></li>
     <li class="active"><a href="#">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
     <?php include ("Usernavbar.php");?>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content" >
    <div class="col-sm-2 sidenav">
    <div class="panel panel-default">
    <div class="panel-heading"><h4>Hello <br/><small><?php echo $username ;?></small></h4>
    </div>
    <div class="panel-body">
    <ul class="list-unstyled text-left">
    <li><a href="#">Your profile</a></li>
    <li><a href="#">Your Transactions</a></li>
    <li><a href="#">Your Orders</a></li>
	<li><a href="#">Books Recommended</a></li>
	</ul>
    </div>
    </div>
    </div>
    <div class="col-sm-8 text-center">
      <!--<div class="panel panel-default">
    <div class="panel-heading"><h4>Hello <br/><small><?php echo $username ;?></small></h4>
    </div>
    <div class="panel-body">

<form action="<?php $_PHP_SELF ?>" method="post">

<input type="text" name="firstname" value="<?php echo $firstname;?>" placeholder="First Name" autofocus required />
<span class="error"><?php echo $fnameErr;?> </span>
<br/>


<input type="text" name="lastname" value="<?php echo $lastname;?>" placeholder="Last Name" required />
<span class="error"><?php echo $lnameErr;?> </span>
<br/>


<input type="text" name="id_no" value="<?php echo $id_no;?>" placeholder="ID Number" required />
<span class="error"><?php echo $idErr;?> </span>
<br/>
<!--<input type="text" name="branch" value="" placeholder="Branch" required />
	<select name="branch" placeholder="Select Branch" required />
	<option value="None" selected>
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
    <option value="None" selected>
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
<input type="text" name="college" value="<?php echo $college;?>" placeholder="College(If other than VJTI)" />
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

<!--<img src="<?/* _SESSION['profilepic']*/ ?>" width=50px alt="p"/><br/>

<input type="submit" name="register" value="Register" placeholder="Submit" >

</form>

</div>
   </div>
  </div>
  -->
  <h2 >Horizontal form</h2><br/>
  <div class="container">
  
  <form class="form-horizontal ">
   <div class="form-group">
      <label class="control-label col-sm-2" for="name">Book Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="Book_name" id="email" placeholder="Enter Book name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-6">
        <input type="submit" name="register" value="Register" placeholder="Submit" >
      </div>
    </div>
  </form>
</div>
</div>

    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>

<?php  include("footer.php")?>

</body>
</html>