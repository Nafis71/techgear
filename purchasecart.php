<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['productid']))
{
   $c_id  = $_SESSION['userid'];
   $id    = $_GET['productid'];
   $query = "select quantity from product where product_id = '$id'";
   $result= mysqli_query($connection,$query);
   $fetch = mysqli_fetch_assoc($result);
   $prequantity = $fetch['quantity'];
   $query = "select quantity , total_price from cart where product_id = '$id'AND customer_id ='$c_id'";
   $result= mysqli_query($connection,$query);
   $fetch = mysqli_fetch_assoc($result);
   $cartquantity = $fetch['quantity'];
   $finalquantity = $prequantity - $cartquantity;
   if($finalquantity >= 0)
   {
    $querycheck="select *from orderlist where product_id='$id'AND customer_id='$c_id'";
    $checkresult=mysqli_query($connection,$querycheck);
    $row=mysqli_num_rows($checkresult);
    if($row==1)
    {
        $query="select *from orderlist where product_id='$id'AND customer_id='$c_id'";
        $check=mysqli_query($connection,$querycheck);
        $order_fetch = mysqli_fetch_assoc($checkresult);
        $quantity = $order_fetch['quantity'];
        $cart_totalprice = $fetch['total_price'];
        $order_totalprice =$order_fetch['total_price'];
        $changedquantity = $quantity + $cartquantity;
        $total = $cart_totalprice + $order_totalprice;
        $update = "update orderlist set quantity='$changedquantity', total_price= '$total' where product_id='$id'AND customer_id='$c_id'";
        mysqli_query($connection,$update);
        $delete = "delete from cart where customer_id='$c_id'AND product_id='$id'";
        mysqli_query($connection,$delete);
        $product_update = "update product set quantity= '$finalquantity' where product_id='$id'";
        mysqli_query($connection,$product_update);
        $_SESSION['status']="Item Purchased";
        $_SESSION['cause']="Thank You for Purchasing From Tech Gear!";
        $_SESSION['status_code']="success";
        header('location:customer.php');


    }
    else
    {
    $query = "select *from cart where product_id = '$id'AND customer_id ='$c_id'";
    $result= mysqli_query($connection,$query);
    $fetch = mysqli_fetch_assoc($result);
    $query2 = "select *from customer where customer_id ='$c_id'";
    $result2= mysqli_query($connection,$query2);
    $fetch2 = mysqli_fetch_assoc($result2);
    $customerid = $fetch2['customer_id'];
    $customername = $fetch2['customer_name'];
    $customerphone = $fetch2['customer_phone'];
    $customeraddress = $fetch2['customer_address'];
    $productid = $fetch['product_id'];
    $productname =$fetch['product_name'];
    $producttype = $fetch['product_type'];
    $quantity = $fetch['quantity'];
    $totalprice = $fetch['total_price'];
    $query3 = "insert into orderlist values('$customerid','$customername','$customerphone','$customeraddress','$productid','$productname','$producttype','$quantity','$totalprice')";
    $result3= mysqli_query($connection,$query3);
    $delete = "delete from cart where customer_id='$c_id'AND product_id='$id'";
    mysqli_query($connection,$delete);
    $update = "update product set quantity= '$finalquantity' where product_id='$id'";
    mysqli_query($connection,$update);
    $_SESSION['status']="Item Purchased";
    $_SESSION['cause']="Thank You for Purchasing From Tech Gear!";
    $_SESSION['status_code']="success";
    header('location:customer.php');
    }

   }
   else
   {
    $_SESSION['status']="Failed to Purchase";
    $_SESSION['cause']="Only $prequantity Available. Please Reduce Quantity";
    $_SESSION['status_code']="error";
    header('location:customer.php');


   }
   
   
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Item not Purchased";
    $_SESSION['status_code']="error";
    header('location:customer.php');
}