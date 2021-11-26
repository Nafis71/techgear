<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
    $c_id = $_SESSION['userid'];
    $id = $_GET['productid'];
    $query = "delete from orderlist where product_id = '$id' AND customer_id = '$c_id'";
    mysqli_query($connection,$query);
    $query = "Select quantity from customer_order where product_id = '$id' AND customer_id = '$c_id'";
    $run= mysqli_query($connection,$query);
    $fetch =mysqli_fetch_assoc($run);
    $order_quantity = $fetch['quantity'];
    $query = "Select quantity from product where product_id = '$id'";
    $run= mysqli_query($connection,$query);
    $fetching =mysqli_fetch_assoc($run);
    $product_quantity = $fetching['quantity'];
    $final_quantity = $order_quantity + $product_quantity;
    $query = "update product set quantity = '$final_quantity' where product_id = '$id'";
    mysqli_query($connection,$query);
    $query = "delete from customer_order where product_id = '$id' AND customer_id = '$c_id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Order Cancelled";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:orderlist.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Item not Removed";
    $_SESSION['status_code']="error";
    header('location:orderlist.php');
}

?>