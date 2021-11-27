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
    <link rel="stylesheet" href="admin_orderlist.css">
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
<div class="card text-center">
  <div class="card-header">
   <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Employee<span> Details</span><button  type="button" onclick="document.location='admin_empadd.php'" class="btn btn-secondary"><i class="far fa-user-plus"></i></button></h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"><div class="input-group mb-3">
            <form action="admin_empsearch.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search For An Employee" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-search"></i>&nbsp;Search</button>
           
</div></h5>
    <p class="card-text"><table class="table table-hover">
    <tr>
    <th>Employee&nbsp;ID</th>
    <th>Employee&nbsp;Name </th>
    <th>Employee&nbsp;phone</th>
    <th>Employee&nbsp;Address</th>
    <th>Salary</th>
    <th colspan="3">Delete&nbsp;/&nbsp;Update&nbsp;Info</th>
  </tr>
  <?php
  include 'connect.php';
mysqli_select_db($connection,'store');
$display = "select *from employee";
$display_result = mysqli_query($connection,$display);
$count = "Select count(emp_id) as total from employee";
$run = mysqli_query($connection,$count);
$result = mysqli_fetch_assoc($run);
while($fetch_display = mysqli_fetch_assoc($display_result))
{?>


<tr>
<td><?php echo $fetch_display['emp_id']?></td>
    <td><?php echo $fetch_display['emp_name']?></td>
    <td>0<?php echo $fetch_display['emp_phone']?></td>
    <td><?php echo $fetch_display['emp_address']?></td>
    <td><?php echo $fetch_display['salary']?>&nbsp;&#x09F3</td>
    <?php echo' <td> <a class="btn btn-light" href="admin_empremove.php?empid='.$fetch_display['emp_id'].'role="button"><i class="far fa-trash-alt"></i></a></td>'?>
    <?php echo' <td> <a class="btn btn-light" href="admin_empedit.php?empid='.$fetch_display['emp_id'].'role="button"><i class="far fa-user-edit"></i><b></b></a></td>'?>
</tr> <?php }?>
</table></p>
<b>Total Employee : <?php echo $result['total']?></b>
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