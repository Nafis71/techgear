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
    <link rel="stylesheet" href="emp_product.css">
    <title>Employee Panel | Product Details</title>
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
<div class="container">
<div class="card text-center">
  <div class="card-header">
   <h2>Product<span> List</span> And <span>Details</span></h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"><div class="input-group mb-3">
            <form action="emp_productsearch.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search The Store" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-search"></i>&nbsp;Search</button>
           
</div></h5>
    <p class="card-text"><table class="table table-striped table-hover">
    <tr>
    <th>Code</th>
    <th>Product&nbsp;Name</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>Unit&nbsp;Price</th>
    <th>Stock&nbsp;Alert</th>
    <th>Action</th>
  </tr>
  <?php
  include 'connect.php';
mysqli_select_db($connection,'store');
$display = "select *from product ";
$display_result = mysqli_query($connection,$display);
$count = "Select count(product_id) as total from product";
$run = mysqli_query($connection,$count);
$result = mysqli_fetch_assoc($run);
while($fetch_display = mysqli_fetch_assoc($display_result))
{?>


<tr>
    <td><?php echo $fetch_display['product_id'] ?></td>
    <td><?php echo $fetch_display['product_name'] ?></td>
    <td><?php echo $fetch_display['product_type'] ?></td>
    <td><?php echo $fetch_display['quantity'] ?> </td>
    <td><?php echo $fetch_display['product_price'] ?>&nbsp;&#x09F3</td> 
    <?php if($fetch_display['quantity'] == 0)
    {?>
    <td> <h6><b>Stock Out</b></h6></td><?php }
  else { ?>
    <td><b>Available</b></td><?php }?>
    <?php echo'<td> <a class="btn btn-light" href="emp_productedit.php?productid='.$fetch_display['product_id'].'role="button"><i class="fas fa-edit"></i></a></td>'?>
</tr> <?php }?>
</table></p>
<b>Total Product : <?php echo $result['total']?></b>
  </div>
  <div class="card-footer text-muted">

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