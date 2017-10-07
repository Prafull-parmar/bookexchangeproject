<?php
    session_start();
   include ("Search.php");
    $Bookname=$Edition=$Author=$Subject=$year=$branch=$Price=$Image="";
    
    if(isset($_GET["id"])){
      $id=$_GET["id"];
      include("dbconnect.php");
    $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `ID`='$id' LIMIT 1";
    $query= mysqli_query($conn,$sql);
    if(!$query){
      die('could not get data:'.mysql_error());
      
    }
      else{
        $row=mysqli_fetch_array($query);
        $Bookname=$row["NAME"];
        $Edition=$row["EDITION"];
        $Author=$row["AUTHOR"];
        $Subject=$row["SUBJECT"];
        $year=$row["YEAR"];
        $branch=$row["BRANCH"];
        $Price=$row["PRICE"];
        $Image=$row["IMAGE"];
       /* echo $Image;
        echo $Bookname;*/
      }    
  }
   if(isset($_POST["buy"])){
      header("Location: login.php");
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
      <a class="navbar-brand" href="#">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     <li><a href="About.php">About Us</a></li>
    
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
    <div class="col-sm-8 text-center"> 
         <br/><br/>
     <div class="panel panel-default bookpan " >
  <div class="panel-heading" id="panhead">Book Details</div>
  <div class="panel-body text-left" >
  <div class="col-sm-6">
  <img class="book" src="<?php echo $Image;?>" alt="Ironman" width="350" height="500" >
  </div>
  <h4>  
  <br>
  <br>      
 <p>
  <label class="  col-sm-3" >Book Name:</label><?php echo $Bookname;?><br><br>
 </p>
 <p>
  <label class=" col-sm-3" >Book Edition:</label><?php echo $Edition;?><br><br>
 </p>
<p>
 <label class=" col-sm-3" >Author Name:</label><?php echo $Author;?><br><br>
 </p>
 <p>
  <label class="  col-sm-3" >Subject:</label><?php echo $Subject; ?><br><br>
  </p>
 <p>
  <label class="   col-sm-3" >Branch:</label><?php echo $branch;?><br><br>
  </p>
  <p>
  <label class="  col-sm-3" >Recommended For:</label><?php echo $year;?><br><br>
  </p>
  <p>
  <label class="   col-sm-3" >Seller Price(Rs):</label>&#8377 <?php echo $Price;?><br><br>
 </p>
 
    
   <form class="form-horizontal" method="POST" action="<?php $_PHP_SELF;?>"  >
    <div class="form-group">        
      <div class=" col-sm-offset-1 col-sm-3">
        <input class="bn btn-info btn-block btn-lg"  onclick="alert('Please Sign-In to buy the Book!')" type="submit" name="buy" value="BUY" placeholder="Submit" >
      </div>
    </div>
  </form>
 
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

<?php  include("footer.php"); ?>

</body>
</html>
