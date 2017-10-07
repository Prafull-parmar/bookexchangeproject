<?php
$servername = "localhost";
$usrnam = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $usrnam, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
/*echo "Connected successfully";*/
mysqli_select_db($conn,'vjti_book_exchange');
}
?>