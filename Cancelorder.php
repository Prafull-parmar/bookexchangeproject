<?php
   if(isset($_GET["id"])){
   	$id=$_GET["id"];
   }
   if(isset($_GET["BUYER"])){	
   	$buyer=$_GET["BUYER"]; 
   }
   if(isset($_GET["type"])){
   	$type=$_GET["type"];
   }
   	include("dbconnect.php");
   	if($type=="books") {
   		$sql="DELETE FROM `Book_details` WHERE id='$id'";
   		$query=mysqli_query($conn,$sql);
   		/*$sql="UPDATE `Orders` SET `STATUS`='UNAVAILABLE' WHERE `BOOK_ID`='$id'";
   		$query=mysqli_query($conn,$sql);*/
   		header("Location: YourBooks_sell.php");
   	}
   		else{
   	$sql="DELETE FROM `Orders` WHERE Book_ID='$id' AND `BUYER`= '$buyer'";
   	$query=mysqli_query($conn,$sql);
   	$sql="UPDATE `Transactions` SET `Buyer_Requests`=`Buyer_Requests`-1 WHERE BOOK_ID='$id'";
    $query= mysqli_query($conn,$sql);
    header("Location: Yourorders.php");

      }
   	
   
?>