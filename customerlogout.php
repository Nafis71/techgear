<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
$query= "Delete from cart where 1";
mysqli_query($connection,$query);
session_destroy();
header('location:index.php');
?>