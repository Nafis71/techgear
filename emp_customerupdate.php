<?php
session_start();
if(isset($_POST['submit']))
{
    $id = $_POST['customer_id'];
    $name = $_POST['customer_name'];
    $phone = $_POST['customer_phone'];
    $address = $_POST['customer_address'];
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $query ="update customer set customer_name='$name',customer_phone='$phone',customer_address ='$address' where customer_id ='$id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Updated";
    $_SESSION['cause']="Customer info successfully updated";
    $_SESSION['status_code']="success";
    header('location:emp_customer.php');

}
else
{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Failed to Update";
    $_SESSION['status_code']="error";
    header('location:emp_customer.php');
}




?>