<?php
    
   session_start();
  $Error="";
   if(isset($_SESSION["username"])){
   	$username=$_SESSION["username"];
    $id=$_SESSION['id'];
   }
   else
   {
   	 $username="User";
   }
   
if(isset($_POST['sell'])){
$target_dir = "C:/xampp/htdocs/Vjtibook/Images/";
$target_file = $target_dir.$username.$id. basename($_FILES["Book_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["sell"])) {
    $check = getimagesize($_FILES["Book_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["Book_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["Book_image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["Book_image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
      $Book_name=$_POST['Book_name'];
      $Book_edition=$_POST['Book_edition'];
      $Book_author=$_POST['Book_author'];
      $Book_subject=$_POST['Book_subject'];
      $Book_year=$_POST['Book_year'];
      $Book_price=$_POST['Book_price'];
      
      $Branch=$_POST['branch'];


}


    
?>