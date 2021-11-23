<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
$id = $_GET['productid'];
$queryorder = "select *from orderlist, customer where product_id = '$id' AND customer.customer_id = orderlist.customer_id";
$queryorder_run = mysqli_query($connection,$queryorder);
$fetching = mysqli_fetch_assoc($queryorder_run);
$c_id = $fetching['customer_id'];
$c_name = $fetching['customer_name'];
$queryorder = "select *from orderlist where customer_id='$c_id' AND product_id='$id'";
$run = mysqli_query($connection,$queryorder);
$row = mysqli_num_rows($run);
if($row ==1)
{
$queryorder = "select *from orderlist where customer_id='$c_id' AND product_id='$id'";
$queryorder_run = mysqli_query($connection,$queryorder);
$fetching = mysqli_fetch_assoc($queryorder_run);
$product_name = $fetching['product_name'];
$product_type = $fetching['product_type'];
$total_price = $fetching['total_price'];
$quantity = $fetching['quantity'];
$customer_id = $fetching['customer_id'];
$customer_name = $fetching['customer_name'];
$customer_phone = $fetching ['customer_phone'];
$customer_address = $fetching['customer_address'];
$queryship = "insert into shipped values('$id','$product_name','$product_type','$quantity','$customer_id ','$customer_name ','$customer_phone','$customer_address','$total_price',NOW())";
mysqli_query($connection,$queryship);
$query = "update customer_order set status='1' where product_id='$id' and customer_id = '$c_id'";
mysqli_query($connection,$query);
$delete = "delete from orderlist where product_id='$id'AND customer_id='$c_id'";
mysqli_query($connection,$delete);
header('location:employee.php');
}
else{
    $_SESSION['status']="Failed To Ship";
    $_SESSION['cause']="Database Error";
    $_SESSION['status_code']="error";
    header('location:employee.php');
}

}
else{
    $_SESSION['status']="Failed To Ship";
    $_SESSION['cause']="";
    $_SESSION['status_code']="error";
    header('location:employee.php');
}


?>