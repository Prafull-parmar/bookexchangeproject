
<?php
   session_start();
   $Results="";
   include ("UserSearch.php");
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $email=$_SESSION["email"];
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
     <li ><a href="User_Buypage.php">Buy</a></li>
      <li><a href="User_Sellpage.php">Sell</a></li>
     <?php include ("Usernavbar.php"); ?>
     </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">
   
    <?php include("user_sidenav.php"); ?>
    
    <div class="col-sm-8 text-left midnav" >
      <h1>Welcome</h1>
      <hr>
      <h3>Your Books Up for Sale:</h3>
      <p></p>
     
              <?php 
                   include("dbconnect.php");
                   $sql="SELECT `Book_details`.`ID`,`Book_details`.`NAME`,`Book_details`.`PRICE`,`Transactions`.`BOOK_ID`,`Transactions`.`Buyer_Requests` FROM `Book_details`,`Transactions` where `Book_details`.`ID`=`Transactions`.`BOOK_ID` AND `Transactions`.`SELLER`='$email' AND `Transactions`.`STATUS`='AVAILABLE' Order by `Transactions`.`TIME` Asc";

                   $query= mysqli_query($conn,$sql);
             if(!$query){
                die('could not get data:'.mysql_error());
                $Result="0 Results";
                   }
        else{
            $num=mysqli_num_rows($query);
            echo "<span style=\"text-align:left;\" ><h3> Results found: ".$num."</h3></span>";
            echo "<table class=\"table table-bordered table-hover\" > <thead><tr><th>Sr_No<th>Book Name</th><th>Price(Rs)</th><th>Buyers</th><th>Book</th></tr></thead>";
            echo "<tbody>";
            for( $i=1;$i<=$num;$i++){
              $row=mysqli_fetch_array($query);
            echo " <tr>";
            echo " <td> $i </td>";
            echo " <td><a href=\"Book_details.php?id={$row['ID']}\">{$row['NAME']}</a></td> ";
           /* echo " <td>{$row['AUTHOR']}</td>";*/
            echo " <td>{$row['PRICE']}</td>";
            echo " <td><a href=\"Buyerrequest.php?id={$row['ID']}\">{$row['Buyer_Requests']}. (View Buyers)</a></td>";
            echo " <td><a href=\"Cancelorder.php?id={$row['ID']}&type=books\">Remove Book</a></td>";
            echo " </tr>";
            }
            echo "</tbody></table>";
           }
              ?>

          


      
      
     
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