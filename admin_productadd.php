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
<a href="admin_orderlist.php"><i class="fas fa-cart-arrow-down"></i><span>Order Details</span> </a>
<a href="admin_empdetails.php"><i class="fas fa-id-card"></i><span>Employee Details</span> </a>
<a href="admin_product.php"><i class="fas fa-cart-plus"></i><span>Product Details</span> </a>
<a href="#"><i class="fas fa-user-circle"></i><span>Customer Details</span> </a>
</div>
<div class="content">
<div class="card text-center">
  <div class="card-header">
   <h2>Tech<span> Gear</span></h2> 
  </div>
  <div class="card-body">
    <div class="card-title"><div class="input-group mb-3">
            <form action="admin_productaddvalidate.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id= "emp_id" name="id" class="form-control" value ="<?php echo $fetch['product_id']?>">
            <label class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-comment-alt"></i>Product Name:</b></label>
            <input type="text" id ="emp_name" name="name" class="form-control" placeholder="Enter Product Name" >
            <label  class= "label"><b>&nbsp;&nbsp;<i class="fas fa-toolbox"></i>Product Type:</b></label>
            <input type="phone" id= "emp_phone" name="type" class="form-control" placeholder="Enter Product Type">
            <label  class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-sort-amount-up-alt"></i>Product Quantity:</b></label>
            <input type="text" id="emp_address" name="quantity" class="form-control" placeholder="Enter Product Quantity" >
            <label  class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-dollar-sign"></i>Product Price:</b></label>
            <input type="text" id="salary" name="price" class="form-control" placeholder="Enter Product Price" >
            <label  class= "label"><b>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-images"></i>Product Image:</b></label>
            <input type="file" name="file" class="form-control" >    
            <br>
            <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-edit"></i>&nbsp;<b>Insert</b></button>
   
</div></div>
  <div class="card-footer text-muted">
Please Check Again Before Making Any Changes
  </div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
?>
        <script>
            swal({
  title: "<?php echo $_SESSION['status'];?>",
  text: "",
  icon: "<?php echo $_SESSION['status_code'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status']);
?>   
</body>
</html>