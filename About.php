<?php
session_start();
 include("Search.php");
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
 <div class="jumbotron text-center">
  <img src="Images\books-stack.png"  alt="Logo">
    <h1>VJTI Book Exchange</h1>      
    <p>A website where VJTI's students can buy and sell Engineering Books!</p>
  </div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="Home.php">Home</a></li>
     <li class="active" ><a href="#">About Us</a></li>
    
   <li> <form class="navbar-form navbar-left" method="POST" action="<?php $_PHP_SELF ;?>">
    <div class="input-group">
    <input type="text" name="Value" placeholder="Search by Book Name" class="form-control">
    <div class="input-group-btn">
     <button class="btn btn-default" name="search" type="submit">
     <i class="glyphicon glyphicon-search"></i>
     </button>
     </div>
     </div>
     </form></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
    <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign-Up</a></li>
     <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sign-In</a></li>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">

     <?php include("Home_sidenav.php"); ?>

    </div>

    <?php include("Aboutus_info.php");?>
    
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
