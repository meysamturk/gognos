<?php
require 'config.php';
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
    

    $query = "DELETE FROM `managers_confirm_statistics` WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "حذف با موفقیت انجام شد";
        header("Location: statistics.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "حذف با موفقیت انجام نشد";
        header("Location: statistics.php");
        exit(0);
    }
}
if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_number = mysqli_real_escape_string($conn, $_POST['user_number']);
    $part = mysqli_real_escape_string($conn, $_POST['part']);
    $stage_one = mysqli_real_escape_string($conn, $_POST['stage_one']);
    $number_one = mysqli_real_escape_string($conn, $_POST['number_one']);
    $stage_two = mysqli_real_escape_string($conn, $_POST['stage_two']);
    $number_two = mysqli_real_escape_string($conn, $_POST['number_two']);
    $stage_three= mysqli_real_escape_string($conn, $_POST['stage_three']);
    $number_three= mysqli_real_escape_string($conn, $_POST['number_three']);
    
    $query = "UPDATE `managers_confirm_statistics` SET name='$name', user_number='$user_number',part='$part', stage_one='$stage_one', number_one='$number_one' , stage_two='$stage_two', number_two='$number_two', stage_three='$stage_three', number_three='$number_three' WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "اصلاحات  با موفقیت انجام شد";
        header("Location: statistics.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "اصلاحات  با موفقیت انجام نشد";
        header("Location: statistics.php");
        exit(0);
    }

}
if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_number = mysqli_real_escape_string($conn, $_POST['user_number']);
    $part = mysqli_real_escape_string($conn, $_POST['part']);
    $stage_one = mysqli_real_escape_string($conn, $_POST['stage_one']);
    $number_one = mysqli_real_escape_string($conn, $_POST['number_one']);
    $stage_two = mysqli_real_escape_string($conn, $_POST['stage_two']);
    $number_two = mysqli_real_escape_string($conn, $_POST['number_two']);
    $stage_three = mysqli_real_escape_string($conn, $_POST['stage_three']);
    $number_three = mysqli_real_escape_string($conn, $_POST['number_three']);
    
    $query = "INSERT INTO `managers_confirm_statistics` (name,user_number,part,stage_one,number_one,stage_two,number_two,stage_three,number_three) VALUES ('$name','$user_number','$part','$stage_one','$number_one','$stage_two','$number_two','$stage_three','$number_three')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "مورد جدید ذخیره شد";
        header("Location: statistics-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "مورد جدید ذخیره نشد";
        header("Location: statistics-create.php");
        exit(0);
    }
}

?>
