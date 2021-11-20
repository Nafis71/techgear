<?php
session_start();
if(isset($_POST['submit']))
{
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $type = $_POST['product_type'];
    $quantity = $_POST['product_quantity'];
    $price = $_POST['product_price'];
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $query ="update product set product_name='$name',product_type='$type',quantity='$quantity',product_price ='$price' where product_id ='$id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Updated";
    $_SESSION['cause']="Product info successfully updated";
    $_SESSION['status_code']="success";
    header('location:emp_product.php');

}
else
{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Failed to Update";
    $_SESSION['status_code']="error";
    header('location:emp_product.php');
}




?>