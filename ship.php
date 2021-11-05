<?php
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
$id = $_GET['productid'];
$queryorder = "select *from orderlist";
$queryorder_run = mysqli_query($connection,$queryorder);
$fetching = mysqli_fetch_array($queryorder_run);
$c_id = $fetching['customer_id'];
$fetch = mysqli_fetch_assoc($queryorder_run);
$queryorder = "select *from orderlist where customer_id='$c_id' AND product_id='$id'";
$row = mysqli_num_rows($queryorder_run);
if($row ==1)
{
$querycustomer = "select *from customer";
$querycustomer_run = mysqli_query($connection,$querycustomer);
$fetch2 = mysqli_fetch_assoc($querycustomer_run);
$customer_name = $fetch['customer_name'];
$product_id = $fetch['product_id'];
$product_name = $fetch['product_name'];
$product_type = $fetch['product_type'];
$total_price = $fetch['total_price'];
$customer_phone = $fetch2['customer_phone'];
$customer_address = $fetch2['customer_address'];
$query = "update customer_order set status='1' where product_id='$id' and customer_id = '$c_id'";
mysqli_query($connection,$query);
$queryship = "insert into shipped values('$product_id','$product_name','$product_type','$c_id ','$customer_name ','$customer_phone','$customer_address','$total_price',NOW())";
mysqli_query($connection,$queryship);
$delete = "delete from orderlist where product_id='$id'AND customer_id='$c_id'";
mysqli_query($connection,$delete);
$_SESSION['status']="Item Shipped";
$_SESSION['cause']="";
$_SESSION['status_code']="success";
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