
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
   if(isset($_GET["id"])){
      $ID=$_GET["id"];
   }
  if(isset($_POST["sell"])){
      if(isset($_POST["optradio"]))
      {  
        $buyer=$_POST["optradio"];
        $time=time();
        include('dbconnect.php');
        $sql="UPDATE `Transactions` SET `BUYER`='$buyer',`TIME`='$time',`STATUS`='SOLD' WHERE `BOOK_ID`=$ID";
        $query=mysqli_query($conn,$sql);
        $sql="UPDATE `Book_details` SET `Status`='UNAVAILABLE' WHERE `ID`=$ID";
        $query=mysqli_query($conn,$sql);
        $sql="UPDATE `ORDERS` SET `STATUS`='APPROVED' WHERE `BOOK_ID`=$ID AND `BUYER`='$buyer'";
        $query=mysqli_query($conn,$sql);
         $sql="UPDATE `ORDERS` SET `STATUS`='UNAVAILABLE' WHERE `BOOK_ID`=$ID AND `BUYER`!='$buyer'";
        $query=mysqli_query($conn,$sql);
        header("Location: YourBooks_sell.php");
         
      }
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
    
    <div class="col-sm-8 text-left midnav" >
      <h2>Your Books Up for Sale:</h2>
      <hr>
      <p><em><strong>Important:</strong>Buyers are listed in the order in which they have placed their orders!</em><br>
        You have to select any One Buyer from the above list to whom you wish to sell your Book!<br>
        Once you select the Buyer and click on 'OK' your Contact details will be shared with the Buyer. </p>
        
        <h4><a href="Book_details.php?id=<?php echo $ID; ?>">View your Book Details</a></h4>
     
              <?php 
                   include("dbconnect.php");
                   $sql="SELECT `User_details`.`EMAIL`,`User_details`.`FIRSTNAME`,`User_details`.`LASTNAME`,`User_details`.`YEAR`,`User_details`.`BRANCH` FROM `User_details` INNER JOIN `Orders` ON `Orders`.`BOOK_ID`='$ID' AND `Orders`.`BUYER`=`User_details`.`Email` ORDER BY `OrderS`.`TIME` ASC";

                   $query= mysqli_query($conn,$sql);
             if(!$query){
                die('could not get data:'.mysql_error());
                $Result="0 Results";
                   }
        else{
            $num=mysqli_num_rows($query);
            echo "<span style=\"text-align:left;\" ><h3> Interesed Buyers: ".$num."</h3></span>";
            echo "<span style='color:green'>$Results</span>";
            echo "<table class=\"table table-bordered table-hover\" > <thead><tr><th>Sr_No<th>Name</th><th>YEAR</th><th>Branch</th></tr></thead>";
            echo "<tbody><form method='POST' action='Buyerrequest.php?id=$ID'>";
            for( $i=1;$i<=$num;$i++){
              $row=mysqli_fetch_array($query);
            echo " <tr>";
            echo " <td> <div class=\"radio\"><label><input type=\"radio\" name=\"optradio\" value=\"{$row['EMAIL']}\">$i</label></div></td>";
            echo " <td>{$row['FIRSTNAME']} {$row['LASTNAME']}</td> ";
           /* echo " <td>{$row['AUTHOR']}</td>";*/
           /* echo " <td>{$row['LASTNAME']}</td>";*/
             echo " <td>{$row['YEAR']}</td>";
            echo " <td>{$row['BRANCH']}</td>";
            echo " </tr>";
            }
            echo "</tbody></table>";
            echo "<div class=\"col-sm-offset-4 col-sm-4\">";
            echo"<input type='submit' name='sell' class='btn btn-info btn-block btn-lg' value='OK' /></div>";

            echo"</form>";

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

  <!--
    <div class="radio">
      <label><input type="radio" name="optradio">Option 1</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Option 2</label>
    </div>
    <div class="radio disabled">
      <label><input type="radio" name="optradio" disabled>Option 3</label>
    </div>
  </form>
</div>