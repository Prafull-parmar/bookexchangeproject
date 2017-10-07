
            
    <?php 

    function selectgallery($type,$value){ 
     
    include("dbconnect.php");
     // $sql="";
  /*switch($type){
      case "ALL" :
      {
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` Order By `Time` Desc ";
           break;
         }
      case "NAME" :
      {   
        /* $sql= $value;*
    $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE  $value Order By `Time` Desc ";
           break;
         }
      case "AUTHOR" :{
         $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `AUTHOR` $value Order By `Time` Desc ";
           break;
         }
      case "SUBJECT" :
          { $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `SUBJECT`
           $value Order By `Time` Desc ";
           break;
         }
      case "BRANCH" :
          {  $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `BRANCH`  $value Order By `Time` Desc ";
             break;
           }
      case "YEAR" :

      /*$sql= "SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `YEAR`='$value' Order By `Time` Desc ";*
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE  $value Order By `Time` Desc ";
             break;
            3
    }
    */
 if($type=="ALL"){
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE `STATUS`='AVAILABLE' Order By `Time` Desc ";
         }
         else{
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE $value AND `STATUS`='AVAILABLE' Order By `Time` Desc ";
         }

     $query= mysqli_query($conn,$sql);
    if(!$query){
      die('could not get data:'.mysql_error());
      $Result="0 Results";
    }
    else{
          $num=mysqli_num_rows($query);
          echo "<span style=\"text-align:left;\" ><h3> Results found: ".$num."</h3></span>";
          echo"<div class=\"row \" >";
         for( $i=0;$i<$num;$i++){
          if($i%4==0){
            echo "</div><div class=\"row \" >";
          }
          $row=mysqli_fetch_array($query);
   /* while($row=mysqli_fetch_array($query)){*/
      /*echo "<div class=\"col-sm-4\" >".*/
      echo "<div class=\"col-sm-3\"  >".
                "<a  class=\"thumbnail\"  href=\"Book_details.php?id={$row['ID']}\" >".
                   "<img  src=\"{$row["IMAGE"]}\" alt={$row["NAME"]} style=\"height=:100px;\" >".
               
               "<div class = \"caption\">".
              "<h6>NAME: {$row["NAME"]}</h6>".
                /*"<small>Author: {$row["AUTHOR"]}</small>".*/
                "<h6>Price: &#8377 {$row["PRICE"]}</h6></div>".
                " </a>".
           " </div>";

          
            
          } 
           echo "</div>"; 
          }
        }
    ?>
 