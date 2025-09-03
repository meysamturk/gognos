<?php
session_name('amlak');
session_start();
require 'dbcon.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
   
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
    $test =array ($_SESSION['user_name']);
    $test_str=implode($test);

    $query = "DELETE FROM $test_str WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

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
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $zone = mysqli_real_escape_string($con, $_POST['zone']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $customer = mysqli_real_escape_string($con, $_POST['customer']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $rent= mysqli_real_escape_string($con, $_POST['rent']);
    $address= mysqli_real_escape_string($con, $_POST['address']);
    $test =array ($_SESSION['user_name']);
    $test_str=implode($test);
    $query = "UPDATE $test_str SET name='$name', zone='$zone', price='$price', area='$area' , customer='$customer', phone='$phone', rent='$rent', address='$address' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

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
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $zone = mysqli_real_escape_string($con, $_POST['zone']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $area = mysqli_real_escape_string($con, $_POST['area']);
    $customer = mysqli_real_escape_string($con, $_POST['customer']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $rent = mysqli_real_escape_string($con, $_POST['rent']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $test =array ($_SESSION['user_name']);
    $test_str=implode($test);
    $query = "INSERT INTO $test_str (name,zone,price,area,customer,phone,rent,address) VALUES ('$name','$zone','$price','$area','$customer','$phone','$rent','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "مورد جدید ذخیره شد";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "مورد جدید ذخیره نشد";
        header("Location: student-create.php");
        exit(0);
    }
}

?>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>