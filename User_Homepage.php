<?php
   session_start();
   include ("UserSearch.php");
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $year=$_SESSION["year"];
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
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="cssnewfie.css">
  <script src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
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
      <li class="active"><a href="#">Home</a></li>
     <li><a href="About_us.php">About Us</a></li>
     <li><a href="User_Buypage.php">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
  
   <?php include ("Usernavbar.php");?>
   </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
  
    <?php include ("user_sidenav.php");?>
    <div class="col-sm-8 text-left uhome">
 
      <h1>Welcome</h1>
      <h3> <?php echo $_SESSION['username'];?></h3>

      <p>Are you are sick of searching for Juniors to sell your last years Books?<br/>
      Are you sick of finding Seniors from whom you could buy books at a price much less than its normal price?<br/>
      Then my friend you are at the right place.VJTI Book Exchange is the website which would do this for you!  </p>
      <hr>
      <!-- <h2>Some of the Recently Uploaded Books:</h2>-->
      <?php /*include("Uhome.php");*/
           ?>
      <p></p>
     
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

<?php include("footer.php");?>

</body>
</html>