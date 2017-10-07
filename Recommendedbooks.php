<?php
 session_start();
  if(isset($_SESSION['year'])){
    $_SESSION['type']=$_SESSION["year"];
     $value=$_SESSION["year"];
     $email=$_SESSION["email"];
    $_SESSION['Value']= "`YEAR` LIKE '%$value%' AND `EMAIL`!= '$email' ";
 /* echo  $_SESSION['type'];
   echo $_SESSION['Value'];*/
    header("Location:User_Buypage.php");
  }
?>
