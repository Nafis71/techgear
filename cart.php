<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('location:generaluser.php');
}
else{
include 'connect.php';
if(isset($_GET['productid']))
{
    $id=$_GET['productid'];
    $c_id=$_SESSION['userid'];
    $c_name=$_SESSION['user'];
mysqli_select_db($connection,'store');
$querycheck="select product_id from cart where product_id='$id'";
$checkresult=mysqli_query($connection,$querycheck);
$row=mysqli_num_rows($checkresult);
if($row==1)
{
$query="select product_price from product where product_id='$id'";
$result= mysqli_query($connection,$query);
$fetch=mysqli_fetch_assoc($result);
$price=$fetch['product_price'];
$query1="select quantity from cart where product_id='$id'";
$result=mysqli_query($connection,$query1);
$fetch=mysqli_fetch_assoc($result);
$quantity=$fetch['quantity'];
$changedquantity=$quantity + 1;
$total= $price * $changedquantity;
$query2="update cart set quantity='$changedquantity',total_price='$total' where product_id='$id'";
mysqli_query($connection,$query2);
$_SESSION['status']="Item Added To Cart";
$_SESSION['cause']="";
$_SESSION['status_code']="success";
header('location:customer.php');
}
else
{
    $query3="select product_id, product_name, product_type, product_price from product where product_id='$id'";
    $result3= mysqli_query($connection,$query3);
    $fetch=mysqli_fetch_assoc($result3);
    $id=$fetch['product_id'];
    $name=$fetch['product_name'];
    $type=$fetch['product_type'];
    $price=$fetch['product_price'];
    $prequantity=1;
    $total=$price * $prequantity;
    $query4="insert into cart (product_id, product_name, product_type, product_price,total_price,customer_id,customer_name) values('$id','$name','$type','$price','$total','$c_id','$c_name')";
    mysqli_query($connection,$query4);
    $query5="update cart set quantity='$prequantity' where quantity=0";
    mysqli_query($connection,$query5);
    $_SESSION['status']="Item Added To Cart";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:customer.php');
}
}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Item not added to cart";
    $_SESSION['status_code']="error";
    header('location:customer.php');
}
}

?>