
<?php
session_start();                                          //starting session;
$connect = mysqli_connect('localhost','root','');
mysqli_select_db($connect,'store');
if(isset($_POST['submit']))
{
$id=$_POST['empid'];                                      //taking varriables;
$pass=md5($_POST['password']); //encrypting password;
$compass=md5($_POST['compassword']); //compassword = confirm password;
if($pass!=$compass)        // checking two password fields;        
{
    $_SESSION['status']="Error";
    $_SESSION['cause']="Password fields doesn't match"; //taking current session varribale for later use
    $_SESSION['status_code']="error";                   // for sweetalert js plugin in another php file.        
    header('location:registration_emp.php');
}
else{
    $query="select empid from employee where empid='$id'";
    $queryrun=mysqli_query($connect,$query);
    $result =mysqli_num_rows($queryrun);
    if($result==1)
    {
        $query2 = "select empid from emplogin where empid='$id'";
        $queryrun2=mysqli_query($connect,$query2);
        $check = mysqli_num_rows($queryrun2);
        if($check==1)
        {
            $_SESSION['status']="Registration Failed";
            $_SESSION['cause']="Employee ID Already Exist, Please Log in from Employee Login panel";
            $_SESSION['status_code']="error";
            header('location: emp_login.php');
        }
        else{
        $insert="insert into emplogin(empid,password) values('$id','$pass')";
        $run=mysqli_query($connect,$insert);
        $_SESSION['status']="Registered Successfully";
        $_SESSION['cause']="We have inserted your credentials, now you can log in";
        $_SESSION['status_code']="success";
        header('location:emp_login.php');}
        
    }
    else{
        $_SESSION['status']="Registration Failed";
        $_SESSION['cause']="Employee id not found (Please Contact With Admin)";
        $_SESSION['status_code']="error";
        header('location:registration_emp.php');
        }

}
}

?>