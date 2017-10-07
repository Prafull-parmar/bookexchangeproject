<?php
   session_start();
   include ("UserSearch.php");
    $success=$error=$Book_id=$Bookname=$Edition=$Author=$Subject=$year=$branch=$Price=$Image="";
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
        $seller=$row["EMAIL"];
       /* echo $Image;
        echo $Bookname;*/
      }    
  
    }
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
   /* $firstname=$_SESSION["firstname"];
    $lastname=$_SESSION["lastname"];
    $id_no=$_SESSION["id"];
    $branch=$_SESSION["branch"];
    $year=$_SESSION["year"];
    $college=$_SESSION["college"];
    $mob=$_SESSION["mob"];*/
    $email=$_SESSION["email"];
   }
   else{
   	 $username="User";
   }
    if(isset($_POST["buy"])){
      $TIME=time();
      /* $sql="SELECT `BOOK_ID` FROM `Orders` where `BOOK_ID`='$id' AND `BUYER`='$email')";
       $query= mysqli_query($conn,$sql);
       if(!$query){*/
       if($email==$seller){
        $error="You cannot Buy your Own Book!";
       }
       else{
       $sql="INSERT INTO `Orders` VALUES('$id','$email','PENDING','$TIME')";
       $query= mysqli_query($conn,$sql);
       if(!$query){
      /*  echo "<script type='text/javascript'> alert('Entry Exists!');</script>";*/
        $error= "Order for this Book is already been placed by you!";
      /*die('could not get data:'.mysql_error());*/
    }
      else{
        $success= "Book Successfully added to your Orders List!";
        $sql="UPDATE `Transactions` SET `Buyer_Requests`=`Buyer_Requests`+1 WHERE BOOK_ID='$id'";
        $query= mysqli_query($conn,$sql);
        if(!$query){
          $error="Error occurred!";
        }
}
mysqli_close($conn);
}
}
/*else{
  echo "Entry Exists!";
}*/
    


?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.css">
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
     <?php include ("Usernavbar.php");?>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
   
    <?php include("user_sidenav.php"); ?>
    
    <div class="col-sm-8 " >
     <br><br>
     <div class="panel panel-default bookpan " >
    
  <div class="panel-heading" id="panhead">Book Details</div>
  <h3><span style='color:red;'><?php echo $error; ?></span>
     <span style='color:green;'><?php echo $success; ?></span></h3>
  <div class="panel-body text-left" >
  <div class="col-sm-6">
  <img class="book" src="<?php echo $Image;?>" alt="Book_image" width="350" height="500" >
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
 
    <!-- Trigger the modal with a button -->
   <form class="form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
    <div class="form-group"> 
         
      <div class=" col-sm-offset-1 col-sm-3">
        <input class="bn btn-info btn-block btn-lg" type="submit" onclick="alert('Your Request is being Processed!')" name="buy" value="BUY" placeholder="Submit" >
      </div>
    </div>
  </form>
  <?php  /*
<button type="button" class="btn btn-info btn-lg"  data-toggle="modal" data-target="#myModal"> BUY </button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
       <? echo "Modal";?>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>*/ ?>
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