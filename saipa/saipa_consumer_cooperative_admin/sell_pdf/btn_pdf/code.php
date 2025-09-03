<?php
require 'config.php'; 

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);
    $query = "DELETE FROM `tavoni_pdf` WHERE id='$student_id' ";
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
    $zone = mysqli_real_escape_string($conn, $_POST['number']);
    $price = mysqli_real_escape_string($conn, $_POST['total_products']);
    $area = mysqli_real_escape_string($conn, $_POST['total_price']);
    
    
    $query = "UPDATE `orders` SET name='$name', number='$number', total_products='$total_products' WHERE id='$student_id' ";
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

?>
