<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
$id = $_GET['productid'];
$queryorder = "select *from orderlist, customer where product_id = '$id' AND customer.customer_id = orderlist.customer_id";
$queryorder_run = mysqli_query($connection,$queryorder);
$fetching = mysqli_fetch_array($queryorder_run);
$c_id = $fetching['customer_id'];
$c_name = $fetching['customer_name'];
$queryorder = "select *from orderlist where customer_id='$c_id' AND product_id='$id'";
$row = mysqli_num_rows($queryorder_run);
if($row ==1)
{
$querycustomer = "select *from customer where customer_id ='$c_id'";
$querycustomer_run = mysqli_query($connection,$querycustomer);
$fetch2 = mysqli_fetch_assoc($querycustomer_run);
$queryorder = "select *from orderlist where customer_id='$c_id' AND product_id='$id'";
$queryorder_run = mysqli_query($connection,$queryorder);
$fetching = mysqli_fetch_array($queryorder_run);
$product_name = $fetching['product_name'];
$product_type = $fetching['product_type'];
$total_price = $fetching['total_price'];
$customer_address = $fetch2['customer_address'];
$queryship = "insert into shipped values('$id','$product_name','$product_type','$c_id ','$c_name ','$customer_address','$total_price',NOW())";
mysqli_query($connection,$queryship);
$query = "update customer_order set status='1' where product_id='$id' and customer_id = '$c_id'";
mysqli_query($connection,$query);
$delete = "delete from orderlist where product_id='$id'AND customer_id='$c_id'";
mysqli_query($connection,$delete);
header('location:employee.php');
}
else{
    $_SESSION['status']="Failed To Ship";
    $_SESSION['cause']="";
    $_SESSION['status_code']="error";
}

}
else{
    $_SESSION['status']="Failed To Ship";
    $_SESSION['cause']="";
    $_SESSION['status_code']="error";
}


?>