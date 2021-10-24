<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>LOGIN</title>
</head>
<body>
<div class="menu-bar">
        <ul>
            <li><a href="index.php"><i class="fa fa-home "></i> Home</a></li>
            <li><a href="customer.php"> <i class="fa fa-desktop "></i> Products</a></li>
            <li><a href="#"><i class="fa fa-phone "></i>  Contact us</a></li>
             
        </ul>
    </div>
    <div class="container">
<div class ="box">

<div class="icon">
<i class="fa fa-user-circle" aria-hidden="true"></i>

</div>
<div class="content">
    <h3>Employee Panel</h3>
    <br>
    <p><b> This section is only for Employee </b></p>
    <br>
    <div class="button">
                <input type ="submit" onclick="document.location='employee.php'" value="LOGIN">
                
              </div>
</div>

</div>
<div class ="box">
    
<div class="icon">
<i class="fa fa-user-secret" aria-hidden="true"></i>


</div>
<div class="content">
    <h3><span>Admin Panel</span></h3>
    <br>
    <p><b> This section is only for Admin</b></p>
    <br>
    <div class="button">
                <input type ="submit" onclick="document.location='admin.php'" value="LOGIN">
              </div>
</div>

</div>

</div>

    </div>
</body>
</html>