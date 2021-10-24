<?php
session_start(); 
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'store');
if(isset($_POST['submit']))
{
$emp = $_POST['empid'];
$pass =md5($_POST['password']);
$query = "select *from emplogin where empid='$emp' and password='$pass'";
$query_run = mysqli_query($connect,$query);
$check = mysqli_num_rows($query_run);
if($check==1){
   $_SESSION['emp']=$emp;
   $_SESSION['status']="LOGGED IN";
   $_SESSION['cause']="";
   $_SESSION['status_code']="success";
   header('location:employee.php');
}
else {
   $_SESSION['status']="LOGIN Failed";
   $_SESSION['cause']="Credentials don't match, Please try again";
   $_SESSION['status_code']="error";
   header('location:emp_login.php');
}
}
else{
   die(mysqli_connect_error());
}

?>