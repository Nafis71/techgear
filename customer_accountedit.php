<?php
session_start();
if(isset($_POST['regbtn']))
{
include 'connect.php';
mysqli_select_db($connection,'store');
$id = $_POST['id']; 
$name = $_POST['name']; 
$phone = $_POST['phone']; 
$address = $_POST['address']; 
$query ="update customer set customer_name='$name',customer_phone='$phone',customer_address ='$address' where customer_id ='$id'";
mysqli_query($connection,$query);
$_SESSION['status']="Updated";
$_SESSION['cause']="Customer info successfully updated";
$_SESSION['status_code']="success";
header('location:customer_account.php');

}
else
{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Failed to Update";
    $_SESSION['status_code']="error";
    header('location:customer_account.php');
}


?>