<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
    
    $id = $_GET['productid'];
    $query ="Delete from product where product_id = '$id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Product Deleted Successfully";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:admin_product.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Product Data Not Deleted";
    $_SESSION['status_code']="error";
    header('location:admin_product.php');
}

?>