<?php
session_name('amlak');
session_start();
require 'dbcon.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
<!doctype html>
<html lang="fa">

  <head>
  <style>
       @import url('https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&display=swap');
          #div1{
          font-family: "Beiruti", sans-serif;
              }            

    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ویرایش مورد</title>
</head>
<body id="div1" dir="rtl">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>ویرایش 
                            <a href="index.php" class="btn btn-danger float-start">بازگشت</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $test =array ($_SESSION['user_name']);
                            $test_str=implode($test);
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM $test_str WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <div class="mb-3">
                                        <label>مورد</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>منطقه</label>
                                        <input type="text" name="zone" value="<?=$student['zone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>قیمت</label>
                                        <input type="text" name="price" value="<?=$student['price'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>متراژ</label>
                                        <input type="text" name="area" value="<?=$student['area'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>نام مشتری</label>
                                        <input type="text" name="customer" value="<?=$student['customer'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>شماره تماس</label>
                                        <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>پیش پرداخت و اجاره</label>
                                        <input type="text" name="rent" value="<?=$student['rent'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>توضیحات و آدرس</label>
                                        <input type="text" name="address" value="<?=$student['address'];?>" class="form-control">
                                    </div>
                                
                                        <button type="submit" name="update_student" class="btn btn-primary">
                                            ذخیره
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>اطلاعاتی پیدا شد</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>