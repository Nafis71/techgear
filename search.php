

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="customer.css">
    <title>Tech Gear</title>
</head>
<body>
<?php

if(isset($_POST['submit']))
{
    session_start();
    include 'connect.php';
mysqli_select_db($connection,'store');
    $search=$_POST['search'];
$query = "select *from product where product_name Like'%$search%' OR product_type Like'%$search%'";
$result = mysqli_query($connection,$query);
$row = mysqli_num_rows($result);
if($row==0){
    $_SESSION['status']="Opss Item is not in our bucket";
    $_SESSION['status_code']="error";
    $_SESSION['cause'] = "";
    header("location:customer.php");
}
else{


?>
<header id="header">
    <div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="customer.php"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>Contact</a></li>
            <div class="input-group mb-3">
            <form action="search.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search The Store" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </ul>
</div>

            <nav class="navbar">
            <ul>
            <li><a href="navbar/nav1.php">Processor</a></li>
            <li><a href="navbar/nav2.php">Graphics&nbsp;Card</a></li>
            <li><a href="navbar/nav3.php">Mouse</a></li>
            <li><a href="navbar/nav4.php">Monitor</a></li>
            <li><a href="navbar/nav5.php">Headphone</a></li>
            <li><a href="navbar/nav6.php">CC&nbsp;Camera</a></li>
            <li><a href="navbar/nav7.php">Ear&nbsp;Phone</a></li>
            <li><a href="navbar/nav8.php">Web&nbsp;Cam</a></li>
            <li><a href="navbar/nav9.php">Capture&nbsp;Card</a></li>
            <li><a href="navbar/nav10.php">Power&nbsp;Bank</a></li>
            <li><a href="navbar/nav11.php">TV&nbsp;Card</a></li>
            <li><a href="navbar/nav12.php">DSLR&nbsp;Camera</a></li>
            <li><a href="navbar/nav13.php">Action&nbsp;Camera</a></li>

            </ul>
</nav>
</header>
<div class="container">
    <div clas="row">
<?php
while($fetch = mysqli_fetch_assoc($result))
{
    ?>
<div class ="col-lg-3 col-md-3 col-sm-12">
<form >
    <div class="card">
<h6 class="card-title"> <?php echo $fetch['product_type']?></h6>
   <div class="card-body">
   <?php echo'<img src= "data:image;base64,'.base64_encode($fetch['img']).'"class="card-img-top" alt="...">';?>
   <hr>
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
    echo'<button type="button" class="btn btn-primary "><a href="buy.php?productid='.$id.'"class="text-light"><i class="fas fa-shopping-cart"></i>Buy Now</a></button>';
    echo'<button type="button" class="btn btn-warning "><a href="cart.php?productid='.$id.'"class="text-decoration-none"><i class="fas fa-shopping-bag"></i>Add to Cart</a></button>';
   }?>
   </div>
</div>
</form>

</div>


 <?php
}}
}

?>
</div>

</div>
</body>
</html>