<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['customerid']))
{
    
    $id = $_GET['customerid'];
    $query ="Delete from customer where customer_id = '$id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Customer Data Deleted";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:admin_customer.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Customer Data Not Deleted";
    $_SESSION['status_code']="error";
    header('location:admin_customer.php');
}

?>