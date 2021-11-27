<?php
session_start();
if(!isset($_SESSION['admin']))
{
    header('location:admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_orderlistcustomer.css">
    <title>Admin Panel</title>
</head>
<body>
<input type="checkbox" id="check"  Checked >
<header>
    <label for="check">
<i class="fas fa-bars" id="sidebar-btn"></i>
</label>
<div class="left-area">
<h3>Tech <span>Gear</span></h3>

</div>
<div class="right-area">
<h3>Admin <span>Panel</span> </h3>
<button  type="button" onclick="document.location='logout.php'" class="btn btn-warning">SignOut</button>

</div>

</header>
<div class="sidebar">
          <center>
        
            <h4>Welcome, <?php echo $_SESSION['admin'];?></h4>
            <hr></hr>
          </center>
          <a href="admin.php"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
<a href="admin_orderlist.php"><i class="fas fa-boxes"></i><span>Order Details</span> </a>
<a href="admin_empdetails.php"><i class="fas fa-id-card"></i><span>Employee Details</span> </a>
<a href="admin_product.php"><i class="fas fa-cart-plus"></i><span>Product Details</span> </a>
<a href="admin_customer.php"><i class="fas fa-user-circle"></i><span>Customer Details</span> </a>
<a href="admin_ship.php"><i class="fas fa-shipping-fast"></i><span>Shipping Details</span> </a>
</div>
<div class="content">
    <?php
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $id = $_GET['customerid'];
    $query = "select *from customer where customer_id='$id'";
    $run = mysqli_query($connection,$query);
    $fetch = mysqli_fetch_assoc($run);
    ?>
<div class="card text-center">
  <div class="card-header">
   <h2>Tech<span> Gear</span></h2> 
  </div>
  <div class="card-body">
    <div class="card-title"><div class="input-group mb-3">
            <form >
            <label for="pro_name" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment-alt"></i>Customer Name:</b></label>
            <input type="text" id ="pro_name" name="product_name" class="form-control"  value="<?php echo $fetch['customer_name']  ?>"readonly>
            <label for="pro_type" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-envelope-open-text"></i>Customer Email:</b></label>
            <input type="text" id= "pro_type" name="product_type" class="form-control"  value="<?php echo $fetch['customer_email'] ?>"readonly>
            <label for="pro_quantity" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-phone-alt"></i>Customer Phone:</b></label>
            <input type="text" id="pro_quantity" name="product_quantity" class="form-control"  value="<?php echo $fetch['customer_phone'] ?>"readonly>
            <label for="pro_price" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-map-signs"></i>Customer Address:</b></label>
            <input type="text" id="pro_price" name="product_price" class="form-control"  value="<?php echo $fetch['customer_address'] ?>"readonly>    
            <br>
            <button type="button" onclick="document.location='admin_orderlist.php'" class="btn btn-light"><i class="fas fa-edit"></i>&nbsp;<b>Go Back</b></button>
           
</div></div>
  <div class="card-footer text-muted">
This Section is Read Only, You Can't Make Any Changes Here
  </div>
</div>
</div>
</body>
</html>