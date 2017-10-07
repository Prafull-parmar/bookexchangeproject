
<?php
   session_start();
   $Results="";
   include ("UserSearch.php");
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $email=$_SESSION["email"];
   
   }
   else{
   	 $username="User";
   }
   if(isset($_GET["id"])){
    $id=$_GET["id"];
  }
   if(isset($_GET['op'])){
       $opt=$_GET['op'];
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
      <a class="navbar-brand" href="#">VJTI Book Exchange</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="User_Homepage.php">Home</a></li>
     <li ><a href="About_us.php">About Us</a></li>
     <li ><a href="User_Buypage.php">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
     <?php include ("Usernavbar.php"); ?>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
   
    <?php include("user_sidenav.php"); ?>
    
    <div class="col-sm-8 text-center midnav" >
      
      <hr>     
              <?php 
                   include("dbconnect.php");
                   
                   if($opt==1){
                      $type="SELLER";
                 }
                 elseif($opt==2){
                  $type="BUYER";
                 }
                 $sql="SELECT `User_details`.`Firstname`,`User_details`.`Branch`,`User_details`.`Year`,`User_details`.`Lastname`, `User_details`.`Email`,`User_details`.`MOB_NO` FROM `user_details` INNER JOIN `Transactions` ON `User_details`.`Email`=`Transactions`.`$type` AND `Transactions`.`BOOK_ID`='$id'";
                 
                   $query= mysqli_query($conn,$sql);
                 
             if(!$query){
                die('could not get data:'.mysql_error());
                $Result="0 Results";
                   }
        else{   
               
               $row=mysqli_fetch_array($query);
               $name=$row["Firstname"]." ".$row["Lastname"];
               $email=$row["Email"];
               $branch=$row["Branch"];
               $year=$row["Year"];
               $mob=$row["MOB_NO"];
               $sql="SELECT `IMAGE`,`NAME` FROM `Book_details` where `ID`='$id'";
                $query= mysqli_query($conn,$sql);
                 $row=mysqli_fetch_array($query);
                 $image=$row["IMAGE"];
                 $book=$row["NAME"];
                 mysqli_close($conn);
   }


?>
            <div class="panel panel-default bookpan"  >
  <div class="panel-heading" id="panhead" ><?php echo $type;?> Details</div>
  <div class="panel-body text-left">
  <h4> 
  <div class="col-sm-4"  >
     <a  class="thumbnail"  href="Book_details.php?id=<?php echo $id;?>"  >
            <img  class="img-responsive" src="<?php echo $image;?>"" alt="<?php echo $book; ?>" >
               <div class ="caption">
              <h6>NAME: <?php echo $book; ?></h6>
              </div>
                 </a>
           </div>  
<br>
<br>
<div style="font-size: 18px;">
 <p>
  <label class=" col-sm-3 " ><?php echo $type; ?> Name:</label><?php echo $name;?><br>
 </p>
 <p>
  <label class=" col-sm-3 " >Degree Year:</label><?php echo $year;?><br>
  </p>
   <p>
  <label class=" col-sm-3 " >Branch:</label><?php echo $branch;?><br>
  </p>
 <p>
  <label class=" col-sm-3 " >Mobile Number:</label><?php echo $mob;?><br>
  </p>
 <p>
  <label class=" col-sm-3 " >Email-Id:</label><?php echo $email;?><br>
  </p>
  </div>
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