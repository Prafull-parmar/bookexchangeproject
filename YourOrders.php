
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
      <h3>Your Recent Orders:</h3>
      <p><strong>Important:</strong>Once your status is "Approved" you can view the user details in the</p>
     
              <?php 
                   include("dbconnect.php");
                   $sql="SELECT `Book_details`.`ID`,`Book_details`.`NAME`,`Book_details`.`AUTHOR`,`Book_details`.`PRICE`,`Orders`.`BOOK_ID`,`Orders`.`STATUS` FROM `Book_details`,`Orders` where `Book_details`.`ID`=`ORDERS`.`BOOK_ID` AND `Orders`.`BUYER`= 
                    '$email' Order by `Orders`.`TIME` Asc";

                   $query= mysqli_query($conn,$sql);
             if(!$query){
                die('could not get data:'.mysql_error());
                $Result="0 Results";
                   }
        else{
            $num=mysqli_num_rows($query);
            echo "<span style=\"text-align:left;\" ><h4> Total Number of Orders: ".$num."</h4></span>";
            echo "<table class=\"table table-bordered table-hover\" > <thead><tr><th>Sr_no</th><th>Book Name</th><th>Author</th><th>Price(Rs)</th><th>Status</th><th>Orders</th></tr></thead>";
            echo "<tbody>";
            for( $i=1;$i<=$num;$i++){
              $row=mysqli_fetch_array($query);
              if($row['STATUS']=="APPROVED"){
                echo "<tr class=\"success\">";
                 echo " <td>$i</td>";
                 echo " <td><a href=\"Book_details.php?id={$row['ID']}\">{$row['NAME']}</a></td> ";
                 echo " <td>{$row['AUTHOR']}</td>";
                 echo " <td>{$row['PRICE']}</td>";
                echo " <td>{$row['STATUS']}</td>";
                echo " <td><a href=\"User_buysoldbooks.php?op=2\">View Details</a></td>";
                echo " </tr>";
              }
              
              else if($row['STATUS']=="UNAVAILABLE"){
                echo "<tr class=\"danger\">";
                 echo " <td>$i</td>";
            echo " <td><a href=\"Book_details.php?id={$row['ID']}\">{$row['NAME']}</a></td> ";
            echo " <td>{$row['AUTHOR']}</td>";
            echo " <td>{$row['PRICE']}</td>";
            echo " <td>{$row['STATUS']}</td>";
            echo " <td><a href=\"Cancelorder.php?id={$row['ID']}&BUYER=$email\">Cancel Order</a></td>";
            echo " </tr>";
              }
              else {
                echo "<tr>";
                 echo " <td>$i</td>";
            echo " <td><a href=\"Book_details.php?id={$row['ID']}\">{$row['NAME']}</a></td> ";
            echo " <td>{$row['AUTHOR']}</td>";
            echo " <td>{$row['PRICE']}</td>";
            echo " <td>{$row['STATUS']}</td>";
            echo " <td><a href=\"Cancelorder.php?id={$row['ID']}&BUYER=$email\">Cancel Order</a></td>";
            echo " </tr>";
              }
           
            }
            echo "</tbody></table>";
           
         }
              ?>

          


      
      
      <!-- <?php /*include ("Imagegallery.php");
           if($type==$_SESSION["year"]){
            echo "<h2 >Recommended Books For You! </h2>";
           }
           else{
           echo "<h2 >Recently Uploaded Books </h2>";
            }
              selectgallery($type,$Value);*/
         ?>
         </div>-->
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