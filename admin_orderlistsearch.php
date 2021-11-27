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
<a href="#"><i class="fas fa-cart-arrow-down"></i><span>Order Details</span> </a>
<a href="#"><i class="fas fa-id-card"></i><span>Employee Details</span> </a>
<a href="#"><i class="fas fa-cart-plus"></i><span>Product Details</span> </a>
<a href="#"><i class="fas fa-user-circle"></i><span>Customer Details</span> </a>
</div>
<div class="content">
<div class="card text-center">
  <div class="card-header">
   <h2>Order<span> List</span></h2> 
  </div>
  <div class="card-body">
    <h5 class="card-title"><div class="input-group mb-3">
            <form action="admin_orderlistsearch.php" method="POST">
            <input type="text" name="search" class="form-control" placeholder="Search For A Customer" autocomplete="off" required>
            <button type="submit" name="submit" class="btn btn-light"><i class="fas fa-search"></i>&nbsp;Search</button>
           
</div></h5>
    <p class="card-text"><table class="table table-hover">
    <tr>
    <th>ID </th>
    <th>Customer&nbsp;Name </th>
    <th>Code</th>
    <th>Product</th>
    <th>Type</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Order&nbsp;Date </th>
    <th colspan ="4">Cancel&nbsp;Order/View&nbsp;Info</th>
  </tr>
  <?php
 if(isset($_POST['submit']))
 {
     include 'connect.php';
 mysqli_select_db($connection,'store');
     $search=$_POST['search'];
 $query = "select *from orderlist where customer_name Like'%$search%'";
 $result = mysqli_query($connection,$query);
 $row = mysqli_num_rows($result);
 if($row==0){
     $_SESSION['status']="Oops! Not Found";
     $_SESSION['status_code']="error";
     $_SESSION['cause'] = "";
     header("location:admin_orderlist.php");
 }
 else{
while($fetch_display = mysqli_fetch_assoc($result))
{
  $query = "select DATE(order_date) as date from orderlist";
  $run = mysqli_query($connection,$query);
  $fetch = mysqli_fetch_assoc($run);
  ?>


<tr>
<td><?php echo $fetch_display['customer_id']?></td>
    <td><?php echo $fetch_display['customer_name']?></td>
    <td><?php echo $fetch_display['product_id']?></td>
    <td><?php echo $fetch_display['product_name']?></td>
    <td><?php echo $fetch_display['product_type']?></td>
    <td><?php echo $fetch_display['quantity']?></td>
    <td ><?php echo $fetch_display['total_price']?>&nbsp;&#x09F3</td> 
    <td><?php echo $fetch['date']?></td>
    <?php echo' <td> <a class="btn btn-light" href="admin_orderlistremove.php?productid='.$fetch_display['product_id'].'role="button"><i class="far fa-trash-alt"></i></a></td>'?>
    <?php echo' <td> <a class="btn btn-light" href="admin_orderlistcustomer.php?customerid='.$fetch_display['customer_id'].'role="button"><i class="far fa-eye"></i><b></b></a></td>'?>
</tr> <?php }}}?>
</table></p>

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