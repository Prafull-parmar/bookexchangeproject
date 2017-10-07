
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php include("dbconnect.php");
          $sql="SELECT `NAME`,`AUTHOR`,`IMAGE`,`ID` FROM `Book_details` WHERE `STATUS`='AVAILABLE' Order By `Time` Desc limit 5 ";
         
          $query= mysqli_query($conn,$sql);
    if(!$query){
      die('could not get data:'.mysql_error());
    }
    else{
   if ($row=mysqli_fetch_array($query )){
     echo " <div class=\"item active\">".
      
       " <img src=\"{$row['IMAGE']}\" alt=\"{$row['NAME']}\" width=\"400\" height=\"345\">".
       " <div class= \"carousel-caption\" >".
        "  <a  href=\"Book_details.php?id={$row['ID']}\"><h3>{$row['NAME']}</h3>".
         " <p>{$row['AUTHOR']}</p>".
       " </a></div></div>";
       
 while( $row=mysqli_fetch_array($query))
   {
       echo " <div class=\"item \">".
      
       " <img src=\"{$row['IMAGE']}\" alt=\"{$row['NAME']}\" width=\"400\" height=\"345\">".
       " <div class= \"carousel-caption\" >".
        " <a href=\"Book_details.php?id={$row['ID']}\"><h3>{$row['NAME']}</h3>".
         " <p>{$row['AUTHOR']}</p>".
       " </a></div></div>";
     }
      /*$row=mysqli_fetch_array($query);
       echo " <div class=\"item \">".
       " <img src=\"{$row['IMAGE']}\" alt=\"{$row['NAME']}\" width=\"400\" height=\"345\">".
       " <div class= \"carousel-caption\" >".
        "  <h3>{$row['NAME']}</h3>".
         " <p>{$row['AUTHOR']}</p>".
       " </div></div>";
       $row=mysqli_fetch_array($query);
       echo " <div class=\"item \">".
       " <img src=\"{$row['IMAGE']}\" alt=\"{$row['NAME']}\" width=\"400\" height=\"345\">".
       " <div class= \"carousel-caption\" >".
        "  <h3>{$row['NAME']}</h3>".
         " <p>{$row['AUTHOR']}</p>".
       " </div></div>"; */      
      
   } 
  }
    
    


    ?>

     </div>
  

       <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <script>
  $('#myCarousel').carousel({interval:2000});
  </script>


