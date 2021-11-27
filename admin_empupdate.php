<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_POST['submit']))
{
$id = $_POST['emp_id'];
$name = $_POST['emp_name'];
$phone = $_POST['emp_phone'];
$address = $_POST['emp_address'];
$salary = $_POST['salary'];

$query = "update employee set emp_name ='$name', emp_phone='$phone',emp_address='$address',salary='$salary' where emp_id='$id'";
mysqli_query($connection,$query);
    $_SESSION['status']="Employee Data Updated";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:admin_empdetails.php');
}
else
{
    $_SESSION['status']="Failed to update";
    $_SESSION['cause']="";
    $_SESSION['status_code']="error";
    header('location:admin_empdetails.php');
}

?>