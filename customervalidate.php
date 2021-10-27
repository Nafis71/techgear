<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_POST['logbtn']))
{
    $email= $_POST['email'];
    $pass = md5($_POST['password']);
    $query = "select  *from customer where customer_email='$email' AND customer_password='$pass'";
    $result = mysqli_query($connection,$query);
    $row = mysqli_num_rows($result);
    if($row==1)
    {
        $query = "select *from customer where customer_email='$email'";
        $result = mysqli_query($connection,$query);
        $fetch = mysqli_fetch_assoc($result);
        $_SESSION['userid']=$fetch['customer_id'];
        $_SESSION['user']=$fetch['customer_name'];
        $_SESSION['phone']=$fetch['customer_phone'];
        $_SESSION['address']=$fetch['customer_address'];
        $_SESSION['status2']="LOGGED IN";
        $_SESSION['cause2']="";
        $_SESSION['status_code2']="success";
        header('location:customer.php');

    }
    else{
        $_SESSION['status']="LOGIN Failed";
        $_SESSION['cause']="Credentials don't match, Please try again";
        $_SESSION['status_code']="error";
        header('location:generaluser.php');
        
    }

    
}

?>