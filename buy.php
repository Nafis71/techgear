<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('location:generaluser.php');
}
else
{
if(isset($_GET['productid']))
{
    $id = $_GET['productid'];
    $c_id= $_SESSION['userid'];
    $c_name= $_SESSION['user'];
    $c_phone= $_SESSION['phone'];
    $c_address = $_SESSION['address'];
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $query = "select *from product where product_id='$id'";
    $result = mysqli_query($connection,$query);
    $fetch = mysqli_fetch_assoc($result);
    $product_id = $fetch['product_id'];
    $product_name = $fetch['product_name'];
    $product_type = $fetch['product_type']; 
    $product_price = $fetch['product_price'];
    $query3 = "select *from orderlist where product_id='$id'AND customer_id='$c_id'";
    mysqli_query($connection,$query3);
    $result = mysqli_query($connection,$query3);
    $row = mysqli_num_rows($result);
    if($row==1) 
    {
        $select = "select quantity from orderlist where product_id='$id'AND customer_id='$c_id'";
        $output= mysqli_query($connection,$select);
        $grab = mysqli_fetch_assoc($output);
        $product_quantity = $grab['quantity'];
        $changedquantity = $product_quantity + 1;
        $total = $changedquantity * $product_price;
        $update = "update orderlist set quantity ='$changedquantity', total_price ='$total'  where product_id ='$id' AND customer_id='$c_id' ";
        mysqli_query($connection,$update);
        $changedquantity = $fetch['quantity'] - 1;
        $query5 = "update product set quantity='$changedquantity' where product_id='$id'";
        mysqli_query($connection,$query5);
        $_SESSION['status']="Item Purchased";
        $_SESSION['cause']="";
        $_SESSION['status_code']="success";
        header('location:customer.php');
    }
    else{
        $prequantity = 1;
    $query4 = "insert into orderlist (customer_id, customer_name, customer_phone, customer_address, product_id, product_name,product_type,quantity,total_price) values(' $c_id','$c_name','$c_phone','$c_address','$product_id','$product_name','$product_type','$prequantity','$product_price')";
    mysqli_query($connection,$query4);
    $changedquantity = $fetch['quantity'] - 1;
    $query5 = "update product set quantity='$changedquantity' where product_id='$id'";
    mysqli_query($connection,$query5);
    $_SESSION['status']="Item Purchased";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:customer.php');
    }
}

}