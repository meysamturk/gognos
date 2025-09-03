<?php

session_start();
require 'config.php';

   
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
  

    $query = "DELETE FROM `saipa_quality_control` WHERE id='$student_id' ";
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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_number = mysqli_real_escape_string($conn, $_POST['user_number']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $block_number = mysqli_real_escape_string($conn, $_POST['block_number']);
    $work_shift = mysqli_real_escape_string($conn, $_POST['work_shift']);
    $num39 = mysqli_real_escape_string($conn, $_POST['num39']);
    $num59 = mysqli_real_escape_string($conn, $_POST['num59']);
    $num185 = mysqli_real_escape_string($conn, $_POST['num185']);
    $num253 = mysqli_real_escape_string($conn, $_POST['num253']);
    $num217 = mysqli_real_escape_string($conn, $_POST['num217']);
    $num28 = mysqli_real_escape_string($conn, $_POST['num28']);
    $num17mf = mysqli_real_escape_string($conn, $_POST['num17mf']);
    $num15mf = mysqli_real_escape_string($conn, $_POST['num15mf']);
    $num15f = mysqli_real_escape_string($conn, $_POST['num15f']);
    $num17f = mysqli_real_escape_string($conn, $_POST['num17f']);
    $num25mf = mysqli_real_escape_string($conn, $_POST['num25mf']);
    $num25f = mysqli_real_escape_string($conn, $_POST['num25f']);
    $num123= mysqli_real_escape_string($conn, $_POST['num123']);
    $num168 = mysqli_real_escape_string($conn, $_POST['num168']);
    
   
    $query = "UPDATE `saipa_quality_control` SET name='$name', user_number='$user_number', date='$date', block_number='$block_number' , work_shift='$work_shift', num39='$num39', num59='$num59', num185='$num185',num253='$num253',num217='$num217',num28='$num28',num17mf='$num17mf',num15mf='$num15mf',num15f='$num15f',num17f='$num17f',num25mf='$num25mf',num25f='$num25f',num123='$num123',num168='$num168' WHERE id='$student_id' ";
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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_number = mysqli_real_escape_string($conn, $_POST['user_number']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $block_number = mysqli_real_escape_string($conn, $_POST['block_number']);
    $work_shift = mysqli_real_escape_string($conn, $_POST['work_shift']);
    $num39 = mysqli_real_escape_string($conn, $_POST['num39']);
    $num59 = mysqli_real_escape_string($conn, $_POST['num59']);
    $num185 = mysqli_real_escape_string($conn, $_POST['num185']);
    $num253 = mysqli_real_escape_string($conn, $_POST['num253']);
    $num217 = mysqli_real_escape_string($conn, $_POST['num217']);
    $num28 = mysqli_real_escape_string($conn, $_POST['num28']);
    $num17mf = mysqli_real_escape_string($conn, $_POST['num17mf']);
    $num15mf = mysqli_real_escape_string($conn, $_POST['num15mf']);
    $num15f = mysqli_real_escape_string($conn, $_POST['num15f']);
    $num17f = mysqli_real_escape_string($conn, $_POST['num17f']);
    $num25mf = mysqli_real_escape_string($conn, $_POST['num25mf']);
    $num25f = mysqli_real_escape_string($conn, $_POST['num25f']);
    $num123= mysqli_real_escape_string($conn, $_POST['num123']);
    $num168 = mysqli_real_escape_string($conn, $_POST['num168']);
  
    
    $query = "INSERT INTO `saipa_quality_control` (name,user_number,date,block_number,work_shift,num39,num59,num185,num253,num217,num28,num17mf,num15mf,num15f,num17f,num25mf,num25f,num123,num168) VALUES ('$name','$user_number','$date','$block_number','$work_shift','$num39','$num59','$num185','$num253','$num217','$num28','$num17mf','$num15mf','$num15f','$num17f','$num25mf','$num25f','$num123','$num168')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "مورد جدید ذخیره شد";
        header("Location: saipa_quality_control-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "مورد جدید ذخیره نشد";
        header("Location: saipa_quality_control-create.php");
        exit(0);
    }
}

?>
