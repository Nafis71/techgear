<?php
session_start();
if(isset($_POST['submit']))
{
    $id = $_POST['customer_id'];
    $c_id = $_POST['product_id'];
    $name = $_POST['customer_name'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $query ="update orderlist set customer_name='$name',customer_phone='$phone',customer_address ='$address' where customer_id ='$id'AND product_id ='$c_id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Updated";
    $_SESSION['cause']="Customer info successfully updated";
    $_SESSION['status_code']="success";
    header('location:employee.php');

}
else
{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Failed to Update";
    $_SESSION['status_code']="error";
    header('location:employee.php');
}




?>