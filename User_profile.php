<?php
   session_start();
   include ("UserSearch.php");
   $firstname=$lastname=$id_no=$branch=$year=$college=$mob=$email="";
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
    $id_no=$_SESSION["id"];
    $branch=$_SESSION["branch"];
    $year=$_SESSION["year"];
    $college=$_SESSION["college"];
    $mob=$_SESSION["mob"];
    $email=$_SESSION["email"];
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
      <a class="navbar-brand" href="User_Homepage.php">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="User_Homepage.php">Home</a></li>
      <li ><a href="About_us.php">About Us</a></li>
      <li ><a href="User_Buypage.php">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
     <?php include ("Usernavbar.php");?>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
   
    <?php include("user_sidenav.php"); ?>
    
    <div class="col-sm-8 " >
    <br/><br/>
     <div class="panel panel-default bookpan"  >
  <div class="panel-heading" id="panhead" >User Profile</div>
  <div class="panel-body text-left">
  <h4>        
 <p>
  <label class=" col-sm-3" >First Name:</label><?php echo $firstname;?><br>
 </p>
<p>
 <label class=" col-sm-3" >Last Name:</label><?php echo $lastname;?><br>
 </p>
 <p>
  <label class=" col-sm-3" >ID Number:</label><?php echo $id_no;?><br>
  </p>
 <p>
  <label class=" col-sm-3" >Branch:</label><?php echo $branch;?><br>
  </p>
  <p>
  <label class=" col-sm-3" >Year:</label><?php echo $year;?><br>
  </p>
  
  <p>
  <label class=" col-sm-3" >Mobile No:</label><?php echo $mob;?><br>
  </p>
   <p>
  <label class=" col-sm-3" >Email-Id:</label><?php echo $email;?><br>
  </p>
  </h4>
</div>
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

<?php  include("footer.php");?>

</body>
</html>