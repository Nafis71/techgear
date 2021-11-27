<?php 
session_start();
if(isset($_POST['submit']))
           {
                include 'connect.php';
                mysqli_select_db($connection,'store');
                $id = $_POST['emp_id'];
                $name = $_POST['emp_name'];
                $phone = $_POST['emp_phone'];
                $address = $_POST['emp_address'];
                $salary = $_POST['salary'];
                $query ="select emp_id from employee where emp_id ='$id'";
                $run = mysqli_query($connection,$query);
                $row = mysqli_num_rows($run);
                if($row==0)
                {
                $query = "insert into employee (emp_id, emp_name, emp_phone, emp_address, salary) values ('$id','$name','$phone','$address','$salary')";
                mysqli_query($connection,$query);
                $_SESSION['status']="Employee Data Inserted";
                $_SESSION['cause']="";
                $_SESSION['status_code']="success";
                header('location:admin_empdetails.php');
                }
                else
                {
                    $_SESSION['status']="Duplicate Employee ID";
                    $_SESSION['cause']="Current Employee Id is Already Present";
                    $_SESSION['status_code']="error";
                    header('location:admin_empadd.php');
                }
            }
            ?>