<?php
session_start(); 
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'store');
if(isset($_POST['submit']))
{
$admin = $_POST['adminid'];
$pass =md5($_POST['password']);
$query = "select *from adminlogin where username='$admin' and password='$pass'";
$query_run = mysqli_query($connect,$query);
$check = mysqli_num_rows($query_run);
if($check== 1){
    $_SESSION['user']=$admin;
    $_SESSION['status1']="LOGGED IN";
    $_SESSION['admin']=$_SESSION['user'];
    $_SESSION['status_code1']="success";
    header('location:admin.php');
}
else {
    $_SESSION['status']="LOGIN Failed";
    $_SESSION['cause']="Credentials don't match, Please try again";
    $_SESSION['status_code']="error";
    header('location:admin_login.php');
}
}
else{
   die(mysqli_connect_error());
}

?>