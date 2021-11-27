<?php
session_start();
if(isset($_POST['submit']))
{
    include 'connect.php';
    mysqli_select_db($connection,'store');
    $photo = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $query ="insert into product(product_id, product_name, product_type, quantity, product_price,img)values('$id','$name','$type','$quantity','$price','$photo')";
    mysqli_query($connection,$query);
    $_SESSION['status']="Product Added Successfully";
    $_SESSION['status_code']="success";
    $_SESSION['cause'] = "";
    header("location:admin_product.php");
}
else
{
    $_SESSION['status1']="Failed To Add Product";
    $_SESSION['status_code1']="error";
    $_SESSION['cause'] = "";
    header("location:admin_product.php");
}

?>