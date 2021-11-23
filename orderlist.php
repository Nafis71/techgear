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
    <link rel="stylesheet" href="orderlist.css">
    
    <title>Tech Gear</title>
</head>
<body>
<header id="header">
    <div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
           <?php if(isset($_SESSION['user']))
           { ?>
            <li><a href="#"><i class="fa fa-user-circle " aria-hidden="true"></i> <?php echo $_SESSION['user'];?></a></li>
            <li><a href="customerlogout.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a></li>
            <?php
           }
           else{ ?>
           <li><a href="generaluser.php"><i class="fa fa-user-circle " aria-hidden="true"></i>Account</a></li>
          <?php
           }?>
            <li><a href="#"><i class="fas fa-shopping-bag"></i>Order List</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>Contact</a></li>
            <div class="input-group mb-3">
            <form action="search.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search The Store" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </ul>
</div>
</header>
<div class="card text-center">
  <div class="card-header">
   <h2>Tech<span> Gear</span></h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title">Customer Order List</h5>
    <p class="card-text"><table class="table table-striped table-hover">
    <tr>
    <th>Code</th>
    <th>Product</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Order Status</th>
  </tr>
  <?php
  include 'connect.php';
mysqli_select_db($connection,'store');
$c_id = $_SESSION['userid'];
$display = "select *from customer_order where customer_id='$c_id'";
$display_result = mysqli_query($connection,$display);
while($fetch_display = mysqli_fetch_assoc($display_result))
{?>


<tr>
    <td><?php echo $fetch_display['product_id']?></td>
    <td><?php echo $fetch_display['product_name']?></td>
    <td><?php echo $fetch_display['product_type']?></td>
    <td><?php echo $fetch_display['quantity']?></td>
    <td><?php echo $fetch_display['total_price']?></td> 
    <?php if($fetch_display['status'] == 0)
    {?>
    <td> <h6><?php echo 'Pending'?><i class="fas fa-truck-loading"></i></h6> </td>
    <?php }
    else
    { ?>
        <td><h6><?php echo '<span>Shipped</span>'?><i class="fas fa-shipping-fast"></i></h6></td>
  <?php  } ?>
</tr> <?php }?>
</table></p>
    <a href="customer.php" class="btn btn-primary">Continue Shopping</a>
  </div>
  <div class="card-footer text-muted">
  <i class="fas fa-store-alt"></i>Thank you for shopping with us<i class="fas fa-store-alt"></i>
  </div>
</div>








</body>
