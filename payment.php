<?php
session_start();
if(!isset($_SESSION['user']))
{
    header('location:generaluser.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="payment.css">
    
    <title>Tech Gear</title>
</head>
<body>
<header id="header">
    <div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
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
<?php
$id = $_GET['productid'];
    ?>
<div class="card text-center">
  <div class="card-header">
    <h4>Payment <span>Method</span> </h4>
  </div>
  <div class="card-body">
    <h5 class="card-title">Select a payment method</h5>
    
    <h6 class="card-text"><input type="radio" id="cash" name="fav_language" checked>&nbsp;<label for="cash"><i class="fas fa-money-bill"></i>&nbsp;Cash On Delivery</label></h6>
    <?php echo '<a class="btn btn-primary" href="buy.php?productid='.$id.'role="button"><i class="fas fa-shipping-fast"></i>Proceed</a>'?>
    <a class="btn btn-primary" href="customer.php"><i class="fas fa-chevron-circle-left"></i>Go Back</a>
  </div>
  <div class="card-footer text-muted">
    We only accept cash on delivery payment method
  </div>
</div>








</body>
