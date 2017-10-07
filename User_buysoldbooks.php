
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
 if(isset($_GET["op"])){
  $op=$_GET["op"];
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
      
   
     
              <?php 
                   include("dbconnect.php");
                   if($op==1){
                           echo "<h3>Your Sold Books are:</h3>";
                   
                   $sql="SELECT `Book_details`.`ID`,`Book_details`.`NAME`,`Book_details`.`PRICE`,`Transactions`.`BOOK_ID`,`Transactions`.`BUYER` FROM `Book_details`INNER JOIN `Transactions` ON `Book_details`.`ID`=`Transactions`.`BOOK_ID` AND `Transactions`.`SELLER`='$email' AND `Transactions`.`STATUS`='SOLD' Order by `Transactions`.`TIME` Asc";
                   $type="BUYER";
                   
                    }
                    elseif($op==2){
                       echo "<h3>Your Bought Books are:</h3>";
                        $sql="SELECT `Book_details`.`ID`,`Book_details`.`NAME`,`Book_details`.`PRICE`,`Transactions`.`BOOK_ID`,`Transactions`.`SELLER` FROM `Book_details` INNER JOIN `Transactions` ON `Book_details`.`ID`=`Transactions`.`BOOK_ID` AND `Transactions`.`BUYER`='$email' AND `Transactions`.`STATUS`='SOLD' Order by `Transactions`.`TIME` Asc";
                         $type="SELLER";

                   
                    }
                   $query= mysqli_query($conn,$sql);
             if(!$query){
                die('could not get data:'.mysql_error());
                $Result="0 Results";
                   }
        else{
            $num=mysqli_num_rows($query);
            echo "<span style=\"text-align:left;\" ><h3> Results found: ".$num."</h3></span>";
            echo "<table class=\"table table-bordered table-hover\" > <thead><tr><th>Sr_No<th>Book Name</th><th>Price(Rs)</th><th>$type</tr></thead>";
            echo "<tbody>";
            for( $i=1;$i<=$num;$i++){
              $row=mysqli_fetch_array($query);
            echo " <tr>";
            echo " <td> $i </td>";
            echo " <td><a href=\"Book_details.php?id={$row['ID']}\">{$row['NAME']}</a></td> ";
           /* echo " <td>{$row['AUTHOR']}</td>";*/
            echo " <td>{$row['PRICE']}</td>";
            echo " <td><a href=\"Buyer_sellerdetails.php?id={$row['ID']}&op=$op\">(View Details)</a></td>";
            
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