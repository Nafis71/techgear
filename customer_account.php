<?php
session_start();
include 'connect.php';
mysqli_select_db($connection,'store');
$id = $_SESSION['userid'];
$user = $_SESSION['user'];
$query ="select *from customer where customer_id = '$id'";
$run = mysqli_query($connection,$query);
$fetch = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
    <link rel="stylesheet" href="customer_account.css">
    <title>Customer Login</title>
</head>
<body>
<div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="index.php"><i class="fa fa-user-circle " aria-hidden="true"></i> <?php echo $_SESSION['user']?></a></li>
            <li><a href="customer.php"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>Contact</a></li>
            </ul>

</div>
<div class="containerform">
   <div class="form-box">
       <div class="button-box">
           <div id= "btn"></div>
       <button type="button" class="toggle-btn" onclick="login()">Info</button>
           <button type="button" class="toggle-btn">&nbsp;&nbsp;&nbsp;&nbsp;Update</button>
        </div>
        <form  id ="login" class ="input-group1"  action="" method="post">
            <label class="label" for="customer_name"><b><i class="far fa-comment"></i>&nbsp;&nbsp;Name :</b></label>
        <input  id = "customer_name" class="input-field" type="text" name="name" placeholder="Enter Your Name" value="<?php echo $fetch['customer_name']?>"readonly>
        <label class="label" for="customer_phone"><b> <i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;Phone Number :</b></label>
        <input  id = "customer_phone" class="input-field" type="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $fetch['customer_phone']?>"readonly>
        <label class="label" for="customer_address"><b><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Address :</b></label>
        <input id = "customer_address" class="input-field" type="text" name="address" placeholder="Enter Your Address" value="<?php echo $fetch['customer_address']?>"readonly>
        <button type="button" class="submit-btn"id="loginbtn" name="logbtn"onclick="register()"><b>UPDATE INFO</b></button>
        </form>
        <form id="register" class ="input-group1" action="customer_accountedit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fetch['customer_id'] ?>">
        <label class="label2" for="customer_name"><b> <i class="far fa-comment"></i>&nbsp;&nbsp;Name :</b></label>
        <input  id = "customer_name" class="input-field2" type="text" name="name" placeholder="Enter Your Name" value="<?php echo $fetch['customer_name']?>"required>
        <label class="label2" for="customer_phone"><b><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp; Phone Number :</b></label>
        <input  id = "customer_phone" class="input-field2" type="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $fetch['customer_phone']?>"required>
        <label class="label2" for="customer_address"><b> <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Address :</b></label>
        <input id = "customer_address" class="input-field2" type="text" name="address" placeholder="Enter Your Address" value="<?php echo $fetch['customer_address']?>"required>
            
        <button type="submit" class="submit-btn"id="registerbtn" name="regbtn"><b>Proceed</b></button>
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