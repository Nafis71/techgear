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
    <link rel="stylesheet" href="../customer.css">
    <title>Tech Gear</title>
</head>
<body>
<header id="header">
    <div class="menu-bar">
        <ul>
            <li><a href="../index.php"><i class="fa fa-home "></i> Home</a></li>
            
            <li><a href="../login.php"><i class="fa fa-user-circle " aria-hidden="true"></i> Account</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>Contact</a></li>
            <div class="input-group mb-3">
            <form action="../search.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search The Store" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </ul>
</div>
</header>
<div class="container">
    <div clas="row">
<?php
include'../connect.php';
mysqli_select_db($connection,'store');
$varriable="Mouse";
$query = "select *from product where product_type='$varriable'";
$result = mysqli_query($connection,$query);
while($fetch = mysqli_fetch_assoc($result))
{
    ?>
<div class ="col-lg-3 col-md-3 col-sm-12"> 
<form >
    <div class="card">
<h6 class="card-title"> <?php echo $fetch['product_type']?></h6>
   <div class="card-body">
   <?php echo'<img src= "data:image;base64,'.base64_encode($fetch['img']).'"class="card-img-top" alt="...">';?>
  
   <div class="card-text">
       <h6><?php echo $fetch['product_name']?></h6>
   </div>
   <hr>
   <div class="card-text">
   <h5><?php echo $fetch['product_price'] ?><span> &#x09F3</span></h5>
   </div>
   <hr>
   <?php 
   if($fetch['quantity']==0)
   {
    echo'<button type="button" class="btn btn-primary" disabled><i class="fas fa-shopping-cart"></i>Stock Out</button>';
   
   }
   else{
    $id=$fetch['product_id'];
    echo'<button type="button" class="btn btn-primary "><a href="../payment.php?productid='.$id.'"class="text-light"><i class="fas fa-shopping-cart"></i>Buy Now</a></button>';
    echo'<button type="button" class="btn btn-warning "><a href="../cart.php?productid='.$id.'"class="text-decoration-none"><i class="fas fa-shopping-bag"></i>Add to Cart</a></button>';
   }?>
   </div>
</div>
</form>

</div>


 <?php
}
?>
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