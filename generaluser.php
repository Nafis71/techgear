<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
    <link rel="stylesheet" href="generaluser.css">
    <title>Customer Login</title>
</head>
<body>
<div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="customer.php"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>Contact</a></li>
            </ul>

</div>
<div class="containerform">
   <div class="form-box">
       <div class="button-box">
           <div id= "btn"></div>
       <button type="button" class="toggle-btn" onclick="login()">Log In</button>
           <button type="button" class="toggle-btn"onclick="register()">Register</button>
        </div>
        <form  id ="login" class ="input-group1"  action="customervalidate.php" method="post">
            <input  class="input-field" type="email" name="email" placeholder="Enter Your Email" required>
            <input class="input-field" type="password" name="password" placeholder="Enter Your Password" required>
        <button type="submit" class="submit-btn"id="loginbtn" name="logbtn">Log In</button>
        </form>
        <form id="register" class ="input-group1" action="customerreg.php" method="post">
            <input  class="input-field" type="text" name="name" placeholder="Enter Your Name" required>
            <input  class="input-field" type="email" name="email2" placeholder="Enter Your Email" required>
            <input  class="input-field" type="phone" name="phone" placeholder="Enter Your Phone Number" required>
            <input  class="input-field" type="text" name="address" placeholder="Enter Your Address" required>
            <input class="input-field" type="password" name="password2" placeholder="Enter Your Password" required>
            <input type="checkbox" class="check-box"  required unchecked><span>I agree to the terms and conditions</span>
        <button type="submit" class="submit-btn"id="registerbtn" name="regbtn">Register</button>
        </form>
   </div>

</div>

    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
       
        function register(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login(){
            x.style.left="90px";
            y.style.left="450px";
            z.style.left="0px";
        }
    </script>
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