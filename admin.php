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
    <link rel="stylesheet" href="admin.css">
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

<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><i class="fas fa-truck-loading"></i>Total Order Placed</div>
  <div class="card-body">
    <h5 class="card-title">Order Pending</h5>
    <?php
   include 'connect.php';                  //fetching total order pending from Database
   mysqli_select_db($connection,'store');
   $query ="select customer_id from orderlist";
   $result=mysqli_query($connection,$query);
   $check = mysqli_num_rows($result);
  echo'<p class="card-text"> '.$check.' </p>';
    ?>
    
  </div>
</div>
<div class="card1 text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card1-header"><span>&#x09F3</span> Annual Sell</div>
  <div class="card1-body">
    <h5 class="card1-title">Total Sales</h5>
    <?php
    mysqli_select_db($connection,'store');
    $query ="select sum(total_price) as 'total' from shipped";
    $result= mysqli_query($connection,$query);
    $fetch =mysqli_fetch_assoc($result);
    $money =$fetch['total'];                   //fetching total sales from Database
    if($money>=1)
    {
        
        echo'<p class="card1-text">&#x09F3 '.$money.'</p>';
    }
    else{?>
        <p class="card1-text">0</p>
        <?php
    }
   
    ?>
  </div>
</div>
<div class="card3 text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card3-header"><i class="fab fa-stack-overflow"></i>Stock Alert</div>
  <div class="card3-body">
    <?php
mysqli_select_db($connection,'store');
$query="select quantity from product where quantity=0";
$result=mysqli_query($connection,$query);
$row= mysqli_num_rows($result);
if($row>4)
{
  echo'<h5 class="card3-title2">Status: <span>Critical</span></h5>';
  echo'<p class="card3-text">'.$row.' Products Stocked Out</p>';
}
else{
  echo'<h5 class="card3-title">Status :<span> OK</span></h5>';
  echo'<p class="card3-text">'.$row.' Products Stocked Out</p>';
}
    ?>
  </div>
</div>
<div class="card4 text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card4-header"><i class="fas fa-shipping-fast"></i>Shipment</div>
  <div class="card4-body">
    <h5 class="card4-title">Total Shipped</h5>
    <?php
     mysqli_select_db($connection,'store');
     $query="select *from shipped";
     $result=mysqli_query($connection,$query);
     $row=mysqli_num_rows($result);
     echo'<p class="card4-text">'.$row.'</p>'
    ?>
    
  </div>
</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['status1']) && $_SESSION['status1'] !=''){
?>
        <script>
            swal({
  title: "<?php echo $_SESSION['status1'];?>",
  text: "Welcome, <?php echo $_SESSION['admin']; ?> !",
  icon: "<?php echo $_SESSION['status_code1'];?>",
  button: "OK",
}); </script>
<?php
}
unset($_SESSION['status1']);
?>   
</body>
</html>