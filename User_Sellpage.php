<?php
    
   session_start();
   ini_set('upload_max_filesize','10M');
   ini_set('post_max_size','10M');
   ini_set('max_input_time',300);
   ini_set('max_execution_time',300);
   include ("UserSearch.php");
    $Book_id=$Book_name=$Book_edition=$Book_author=$Book_subject=$Book_year=$Book_price=$Branch="";
  $Error="";
  $Success="";
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $email=$_SESSION['email'];
    $id=$_SESSION['id'];
    $year=$_SESSION['year'];
   }
   else
   {
   	 $username="User";
   }
   
if(isset($_POST['sell'])){
/*$target_dir = "C:/xampp/htdocs/Vjtibook/Uploads/";*/
$target_dir = "Uploads/";
$target_file = $target_dir.$year.$username.$id. basename($_FILES["Book_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["sell"])) {
    $check = getimagesize($_FILES["Book_image"]["tmp_name"]);
    if($check !== false) {
      /*  $Error= $Error." File is an image - " . $check["mime"] . ".";*/
        $uploadOk = 1;
    } else {
        $Error=$Error. " File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $Error=$Error. " Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["Book_image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $Error= $Error." Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $Error =$Error. "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["Book_image"]["tmp_name"], $target_file)) {
       /* $Error= $Error ." The file ". basename( $_FILES["Book_image"]["name"]). " has been uploaded.";*/
       $Success="Book Details Recorded Successfully!";
    

      $Book_name=$_POST['Book_name'];
      $Book_edition=$_POST['Book_edition'];
      $Book_author=$_POST['Book_author'];
      $Book_subject=$_POST['Book_subject'];
      $Book_year=$_POST['Book_year'];
      $Book_price=$_POST['Book_price'];
      $Branch=$_POST['branch'];
      $time=time();
      include("dbconnect.php");
      $sql="INSERT INTO `Book_details` VALUES(NULL,'$Book_name','$Book_edition','$Book_author','$Book_subject','$Book_year','$Branch','$Book_price','$target_file','$email','$time','AVAILABLE')";
      if (mysqli_query($conn, $sql)) {
        /*echo "New record created successfully";*/
      
    } else {
      $Error= mysqli_error($conn);
        /*echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
    }
     $sql="SELECT ID FROM `Book_details` where `NAME`='$Book_name' AND `TIME`='$time'";
     $query=mysqli_query($conn,$sql);
     $row=mysqli_fetch_array($query);
     $Book_id=$row["ID"];
     $sql="INSERT INTO `Transactions` Values(NULL,'$Book_id','$email',0,NULL,'AVAILABLE','$time')";
     $query=mysqli_query($conn,$sql);
     if(!$query){
      $Error="There was a server problem!";
     }
    mysqli_close($conn);

} else {
        $Error= $Error." Sorry, there was an error uploading your file.";
    }
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
  
  
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="cssnewfie.css">
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
      <li><a href="About_us.php">About Us</a></li>
      <li><a href="User_Buypage.php">Buy</a></li>
      <li class="active"><a href="#">Sell</a></li>
     
   <?php include ("Usernavbar.php");?>
   </ul>
  </div>
</nav>


  
<div class="container-fluid text-center">    
  <div class="row content">

    <?php include("user_sidenav.php"); ?>
    
    
       <div class="col-sm-8 text-center">
       <h1 style="text-decoration:underline;">Book Details</h1>

        <span style="text-align:left;"><strong>Note:</strong> Image Size should not exceed 2Mb.</span>
        <hr>

            <span style="color:green;text-align: center;"><?php echo $Success;?></span>
           <span style="color:red;text-align: center;"><?php echo $Error;?></span> 
          <div class="container">
         
          <form class="form-horizontal" method="POST" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
           
              <div class="form-group">
              <label class="control-label col-sm-2" for="name">Book Name:</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="Book_name"  value="<?php echo $Book_name;?>" id="name" placeholder="Enter Book Name" required >
                </div>
          </div>
          
              <div class="form-group">
              <label class="control-label col-sm-2" for="editoin">Edition:</label>
                <div class="col-sm-5">
            <input type="number" min="1" class="form-control" name="Book_edition" value="<?php echo $Book_edition;?>" id="edition" placeholder="Enter Book Edition" required> 
                </div>
          </div>
          
              <div class="form-group">
              <label class="control-label col-sm-2" for="author">Book Author:</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="Book_author" value="<?php echo $Book_author;?>" id="name" placeholder="Enter Book Author name" required >
                </div>
              </div>
         
              <div class="form-group">
              <label class="control-label col-sm-2" for="subject">Subject:</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="Book_subject" value="<?php echo $Book_subject;?>" id="subject" placeholder="Enter Subject" required >
                </div>
              </div>

          <div class="form-group">
             <label class="control-label col-sm-2" for="year" >Book Recommended:</label>
                <div class="col-sm-5">
                <select class="form-control" name="Book_year" id="year">
                <option value="ALL">Select Degree year</option>
                 <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                  </select>
          </div>
          </div>
          <div class="form-group">
          <label class="control-label col-sm-2" for="branch" >Related Branch:</label>
           <div class="col-sm-5">
          <select class="form-control" name="branch" placeholder="Select Branch" d="form">
  <option value="ALL" selected>
      Select Branch
    </option>
    <option value="Civil Engineering(Btech)">
    Civil Engineering(BTech)
  </option>

  <option value="Computer Engineering(Btech)">

    Computer Engineering(BTech)
  </option>

  <option value="Electrical Engineering(Btech)"> 
      Electrical Engineering(BTech)
    </option>

    <option value="Electronics Engineering(Btech)"> 
      Electronics Engineering(BTech) 
    </option>
  <option value="Elecronics and Telecommunication Engineering(BTech)">
      Elecronics and Telecommunication Engineering(BTech)
    </option>
  <option value="Information Technology">
      Information Technology
    </option>
  <option value="Mechanical Engineering(BTech)">
    Mechanical Engineering(BTech)
  </option>
  <option value="Production Engineering(BTech)">
    Production Engineering(BTech)
  </option>
  <option value="Textile Engineering(BTech)">
    Textile Engineering(BTech)
  </option>
   <option value="Civil Engineering(MTech)">
    Civil Engineering(MTech)
  </option>

  <option value="Computer Engineering(MTech)">

    Computer Engineering(MTech)
  </option>

  <option value="Electrical Engineering(MTech)"> 
      Electrical Engineering(MTech)
    </option>

    <option value="Electronics Engineering(MTech)"> 
      Electronics Engineering(MTech) 
    </option>
  <option value="Elecronics and Telecommunication Engineering(MTech)">
      Elecronics and Telecommunication Engineering(MTech)
    </option>
  <option value="Information Technology">
      Information Technology
    </option>
  <option value="Mechanical Engineering(MTech)">
    Mechanical Engineering(MTech)
  </option>
  <option value="Production Engineering(MTech)">
    Production Engineering(MTech)
  </option>
  <option value="Textile Engineering(MTech)">
    Textile Engineering(MTech)
  </option>
    <option value="Diploma in Mechanical Engineering ">
      DME – Diploma in Mechanical Engineering 
      </option>
    <option value="Diploma in Electrical Engineering(BTech)">
      DEE - Diploma in Electrical Engineering
    </option>
    <option value="Diploma in Electronics Engineering">
      DElnE - Diploma in Electronics Engineering
      </option>
    <option value="-Diploma in Civil and Environmental Engineering">
      DCEE -Diploma in Civil and Environmental Engineering
    </option>
    <option value="Diploma in Textile Manufactures">
      DTM – Diploma in Textile Manufactures
    </option>
    <option value="Diploma in Technical Chemistry">
      DTC - Diploma in Technical Chemistry 
    </option>
</select>
    </div>
    </div>
    
  <div class="form-group">
        <label class="control-label col-sm-2" for="price">Proposed Price(RS):</label>
            <div class="col-sm-5">
              <input type="number" min="0" class="form-control" name="Book_price" value="<?php echo $Book_price;?>" id="price" placeholder="Enter your offered book price" required >
            </div>
        </div>
 <div class="form-group">
       <label class="control-label col-sm-2" for="image">Book Image:</label>
            <div class=" col-sm-5">
              <input type="file" class="form-control" name="Book_image"  id="image" accept="image/*" placeholder="Select Book Image" required>
              </div>
          </div>
         
           
   
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-3">
        <input class="bn btn-info btn-block btn-lg" type="submit"  name="sell" value="Sell" placeholder="Submit" >
      </div>
    </div>
  </form>
</div>
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