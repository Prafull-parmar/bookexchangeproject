
            
    <?php 

    function selectgallery($type,$value){ 
     
    include("dbconnect.php");
     
 if($type=="ALL"){
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details`WHERE `STATUS`='AVAILABLE' Order By `Time` Desc ";
         }
         else{
          $sql="SELECT `ID`,`NAME`,`EDITION`,`AUTHOR`,`SUBJECT`,`YEAR`,`BRANCH`,`IMAGE`,`PRICE`,`EMAIL` FROM `Book_details` WHERE $value  AND `STATUS`='AVAILABLE' Order By `Time` Desc ";
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
                "<a  class=\"thumbnail\"  href=\"Guest_bookdetails.php?id={$row['ID']}\" >".
                   "<img  src=\"{$row["IMAGE"]}\" alt={$row["NAME"]} style=\"height=:100px;\" >".
               
               "<div class = \"caption\">".
              "<h6>NAME: {$row["NAME"]}</h6>".
              /*  "<small>Author: {$row["AUTHOR"]}</small>".*/
                "<h6>Price: &#8377 {$row["PRICE"]}</h6></div>".
                " </a>".
           " </div>";

          
            
          } 
           echo "</div>"; 
          }
        }
    ?>
 