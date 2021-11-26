<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
    
    $id = $_GET['productid'];
    $query = "select *from orderlist, customer where product_id = '$id' AND customer.customer_id = orderlist.customer_id";
    $run = mysqli_query($connection,$query);
    $fetch = mysqli_fetch_assoc($run);
    $c_id = $fetch['customer_id'];
    $query = "Select status from customer_order where product_id = '$id' AND customer_id = '$c_id'";
    $run = mysqli_query($connection,$query);
    $fetch= mysqli_fetch_assoc($run);
    $update = "update customer_order set status ='3' where product_id = '$id' AND customer_id = '$c_id' AND status='0'";
    mysqli_query($connection,$update);
    $query = "Select quantity from orderlist where product_id = '$id' AND customer_id = '$c_id'";
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
    $query = "delete from orderlist where product_id = '$id' AND customer_id = '$c_id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Order Removed";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:admin_orderlist.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Order not Removed";
    $_SESSION['status_code']="error";
    header('location:admin_orderlist.php');
}

?>