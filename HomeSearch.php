<?php

   session_start();
   if(isset($_GET['type'])){
     $type=$_GET['type'];
     $Value=$_GET['Value'];
   }

   else if(isset($_SESSION["type"])){
    $type= $_SESSION["type"];
     
    $Value=$_SESSION["Value"];
    /*ECHO $Value;*/
    /*session_destroy();*/
   }
  else{
     $type="ALL";
    $Value=0;
    
     
   }
   if(isset($_POST['search'])){
       $type=$_SESSION["type"]="NAME";
       $search=$_POST["Value"];
       $search_exploded=explode(" ",$search);
        $x=0;
        $Value="";
       foreach($search_exploded as $search_each) {
           $x++;
           
          if($x==1){
                $Value.="`$type` LIKE '%$search_each%'";
              }
            else{
              $Value.=" AND `$type` LIKE '%$search_each%'";
            }
            }
       
      /* $Value="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE $Value ORDER BY `TIME` DESC";
       */
       
       $_SESSION['Value']=$Value;
       header("Location: HomeSearch.php");
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
 <div class="jumbotron text-center">
  <img src="Images\books-stack.png"  alt="Logo">
    <h1>VJTI Book Exchange</h1>      
    <p>A website where VJTI's students can buy and sell Engineering Books!</p>
  </div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="User_Homepage.php">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     <li><a href="About.php">About Us</a></li>
    
   <li> <form class="navbar-form navbar-left" method="POST" action="HomeSearch.php">
    <div class="input-group">
    <input type="text" name="Search" name="Value" placeholder="Search by Book Name" class="form-control">
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
    <div class="panel panel-default">
    <div class="panel-heading"><h4>Degree-Year</h4>
    </div>
    <div class="panel-body">
    <ul class="list-unstyled">
    <li><a href="HomeSearch.php?type='YEAR'&Value='1st Year'" >1st Year</a></li>
    <li><a href="#">2nd Year</a></li>
    <li><a href="#">3rd Year</a></li>
	<li><a href="#">4rd Year</a></li>
	</ul>
    </div>
    </div>
    </div>
    <div class="col-sm-8 text-left midnav">
      <h1>Welcome</h1>
      <p>Are you are sick of searching for Juniors to sell your last years Books?<br/>
      Are you sick of finding Seniors from whom you could buy books at a price much less than its normal price?<br/>
      Then my friend you are at the right place.VJTI Book Exchange is the website which would do this for you!  </p>
      <hr>
     <!-- <h3>Content Loading......</h3>
      <p>Work in progress.Comng soon...</p>-->
      <div class="col-sm-12 well text-center" >
              <h2 >Recently Uploaded Books </h2>
      <?php 

  
    include("Imagegallery.php");
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

<?php  include("footer.php")?>

</body>
</html>
