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
    <link rel="stylesheet" href="admin_login.css">
    <title>Admin Login</title>
</head>
<body>
<div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="customer.php"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="login.php"><i class="fa fa-user-circle " aria-hidden="true"></i>  LOGIN</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>  Contact us</a></li>
             
        </ul>
    </div>
    <div class="container">
		<form action="admin_validation.php" method="POST" class="login">
			<h1><i class="fa fa-user-secret" aria-hidden="true"></i>ADMIN</h1>
			<div class="input-group">
				<input type="text" placeholder="Admin Username" name="adminid" required autofill="false">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required autofill="false">
			</div>
			<div class="input-group">
				<button name="submit" class="btn"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
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
<?php
if(isset($_SESSION['status1']) && $_SESSION['status1'] !=''){
?>
        <script>
            swal({
  title: "<?php echo $_SESSION['status1'];?>",
  text: "Welcome, <?php echo $_SESSION['admin']; ?> !",
  icon: "<?php echo $_SESSION['status_code1'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status1']);
?>
</body>
</html>