<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
if(isset($_POST['regbtn']))
{
     $name=$_POST['name'];
     $pass=md5($_POST['password2']);
     $email=$_POST['email2'];
     $phone =$_POST['phone'];
     $address =$_POST['address'];
     $query = "select customer_email from customer where customer_email='$email'";
     $result= mysqli_query($connection,$query);
     $row = mysqli_num_rows($result);
     if($row==1)
     {
        $_SESSION['status']="LOGIN Failed";
        $_SESSION['cause']="User Already Exists!";
        $_SESSION['status_code']="error";
        header('location:generaluser.php');
     }
     else
     {
        $query = "insert into customer (customer_name, customer_email, customer_password,customer_phone, customer_address) values('$name','$email','$pass','$phone','$address')";
        mysqli_query($connection,$query);
        $_SESSION['status']="Registered Successfully";
        $_SESSION['cause']="We have inserted your credentials, Now you can log in";
        $_SESSION['status_code']="success";
        header('location:generaluser.php');

     }




}





?>