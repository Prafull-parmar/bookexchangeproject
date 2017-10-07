<?php
 session_start();

 session_unset();
 session_destroy();
 //header('Refresh: 2;URL=Home.php');
 header("Location: Home.php");
?>
