<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="registration_emp.css">
    
    <title>Registration</title>
</head>
<body>
<div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="#"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="login.php"><i class="fa fa-user-circle " aria-hidden="true"></i>  LOGIN</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>  Contact us</a></li>
             
        </ul>
    </div>
    <div class="container">
		<form action="register.php" method="POST" class="login">
			<h1><i class="fa fa-user-plus" aria-hidden="true"></i>Registration</h1>
			<div class="input-group">
				<input type="text" placeholder="Enter Your Employee ID" name="empid" required autofill="false">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Enter Your Password" name="password" required autofill="false">
			</div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="compassword" required autofill="false">
			</div>
			<div class="input-group">
				<button name="submit" class="btn"><i class="fa fa-sign-in" aria-hidden="true"></i>REGISTER</button>
			</div>
			
		</form>
	</div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?>
        <script>
            swal({
  title: "<?php echo $_SESSION['status'];?>",
  text: "<?php echo $_SESSION['cause']; ?>",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status']);
?>
       
      
        
    
   
</body>
</html>
