<?php

session_start();
require 'config.php';

   
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
  

    $query = "DELETE FROM `login_users` WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "حذف با موفقیت انجام شد";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "حذف با موفقیت انجام نشد";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
   
   
    $query = "UPDATE `login_users` SET user_name='$user_name', password='$password', name='$name' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "اصلاحات  با موفقیت انجام شد";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "اصلاحات  با موفقیت انجام نشد";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    
    
    $query = "INSERT INTO `login_users` (user_name,password,name) VALUES ('$user_name','$password','$name')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "مورد جدید ذخیره شد";
        header("Location: add_user_create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "مورد جدید ذخیره نشد";
        header("Location: add_user_create.php");
        exit(0);
    }
}

?>
