<?php
  /* session_start();*/
   if(isset($_SESSION["type"])){
    $type= $_SESSION["type"];
     
    $Value=$_SESSION["Value"];
    unset($_SESSION["type"]);
    unset($_SESSION["Value"]);
    /*echo $type;
    echo $Value;*/
    /*session_destroy();*/
   }
  else{
     $type="ALL";
    $Value=0;
    
     
   }
   if(isset($_POST['Search'])){
       $_SESSION["type"]=$_POST["searchtype"];
       $type=$_POST["searchtype"];

       $search=$_POST["Value"];
       $search_exploded=explode(" ",$search);
        $x=0;
        $Value="";
       foreach($search_exploded as $search_each) {
           $x++;
           
          if($x==1){
                $Value.=" `$type` LIKE '%$search_each%'";
              }
            else{
              $Value.=" AND `$type` LIKE '%$search_each%'";
            }
            }
       
      /* $Value="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE $Value ORDER BY `TIME` DESC";
       */
       
       $_SESSION["Value"]=$Value;

       header("Location:User_Buypage.php");
   }
?>