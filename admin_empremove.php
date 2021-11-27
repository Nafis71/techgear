<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_GET['empid']))
{
    
    $id = $_GET['empid'];
    $query ="Delete from employee where emp_id = '$id'";
    mysqli_query($connection,$query);
    $_SESSION['status']="Employee Data Deleted";
    $_SESSION['cause']="";
    $_SESSION['status_code']="success";
    header('location:admin_empdetails.php');
    

}
else{
    $_SESSION['status']="Failed";
    $_SESSION['cause']="Employee Data Not Deleted";
    $_SESSION['status_code']="error";
    header('location:admin_empdetails.php');
}

?>