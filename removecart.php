<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
    $c_id = $_SESSION['userid'];
    $id = $_GET['productid'];
    $query = "delete from cart where product_id = '$id' AND customer_id = '$c_id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Item Removed";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:customer.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Item not Removed";
    $_SESSION['status_code']="error";
    header('location:customer.php');
}

?>