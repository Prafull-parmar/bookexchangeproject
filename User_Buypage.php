
<?php
   session_start();
   include ("UserSearch.php");
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    /*$Value=$_SESSION['year'];*/
   }
   else{
   	 $username="User";
   }

  
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
     <li class="active"><a href="#">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
     <?php include ("Usernavbar.php");?>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
   
    <?php include("user_sidenav.php"); ?>
    
    <div class="col-sm-8 text-left midnav"  >
      <h1>Welcome</h1>
      <hr>
      <h3>Select from a wide range of Books available:</h3>
      <p></p>
      <div class="col-sm-12 well text-center" style="background-color:#dee5ed;" >
      
       <?php include ("Imagegallery.php");
           if($type==$_SESSION["year"]){
            echo "<h2 >Recommended Books For You! </h2>";
           }
           else{
           echo "<h2 >Recently Uploaded Books </h2>";
            }
              selectgallery($type,$Value);
         ?>
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