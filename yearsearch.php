<?php
 session_start();
  if(isset($_GET['year'])){
    $_SESSION['type']=$_GET["year"];
      $Value=$_GET["year"];
    $_SESSION['Value']="`YEAR` LIKE '%$Value%' ";
 /* echo  $_SESSION['type'];
   echo $_SESSION['Value'];*/
    header("Location:Home.php");
  }
?>
