<?php
session_start();
if(!isset($_SESSION['emp']))
{
    header('location:emp_login.php');
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
    <link rel="stylesheet" href="emp_productedit.css">
    <title>Employee Panel</title>
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
<h3>Employee <span>Panel</span> </h3>
<button  type="button" onclick="document.location='logout.php'" class="btn btn-warning">SignOut</button>

</div>

</header>
<div class="sidebar">
          <center>
        
            <h4>Welcome</h4>
          </center>
          <a href="employee.php"><i class="fas fa-box-open"></i><span>Order Details</span> </a>
<a href="emp_product.php"><i class="fas fa-cart-plus"></i><span>Product Details</span> </a>
<a href="emp_customer.php"><i class="fas fa-user-circle"></i><span>Customer Details</span> </a>
<a href="emp_ship.php"><i class="fas fa-shipping-fast"></i><span>Shipping Details</span> </a>
</div>
<div class="content">
    <?php
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $id = $_GET['productid'];
    $query = "select *from product where product_id='$id'";
    $run = mysqli_query($connection,$query);
    $fetch = mysqli_fetch_assoc($run);
    ?>
<div class="card text-center">
  <div class="card-header">
   <h2>Tech<span> Gear</span></h2> 
  </div>
  <div class="card-body">
    <div class="card-title"><div class="input-group mb-3">
            <form action="emp_productupdate.php" method="POST">
            <label for="pro_name" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment-alt"></i>Product Name:</b></label>
            <input type="text" id ="pro_name" name="product_name" class="form-control" placeholder="Enter The Product Name" autocomplete="off" value="<?php echo $fetch['product_name']  ?>"required>
            <label for="pro_type" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-toolbox"></i>Product Type:</b></label>
            <input type="text" id= "pro_type" name="product_type" class="form-control" placeholder="Enter The Product Type" autocomplete="off" value="<?php echo $fetch['product_type'] ?>"required>
            <label for="pro_quantity" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-sort-amount-up-alt"></i>Product Quantity:</b></label>
            <input type="text" id="pro_quantity" name="product_quantity" class="form-control" placeholder="Enter The Product Quantity" autocomplete="off" value="<?php echo $fetch['quantity'] ?>"required>
            <label for="pro_price" class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i>&nbsp;&nbsp;Product Price:</b></label>
            <input type="text" id="pro_price" name="product_price" class="form-control" placeholder="Enter The Product Price" autocomplete="off" value="<?php echo $fetch['product_price'] ?>"required>    
            <input type="hidden" name="product_id" value="<?php echo $fetch['product_id'] ?>">
            <br>
            <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-edit"></i>&nbsp;<b>UPDATE</b></button>
           
</div></div>
  <div class="card-footer text-muted">
Please Enter Only The Authentic Information Before Making Any Changes
  </div>
</div>
</div>
</body>
</html>