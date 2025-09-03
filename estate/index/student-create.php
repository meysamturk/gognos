<?php
session_name('amlak');
    session_start();
    require 'dbcon.php';
    $test = array($_SESSION['user_name']);
    $test_str=implode($test);
    $dash_category_query = "SELECT * from $test_str ";
    $dash_category_query_run= mysqli_query($con,$dash_category_query);
    $category_total = mysqli_num_rows( $dash_category_query_run);
                                    
   if($category_total <"5")
     {
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

    <title>اضافه کردن مورد</title>
</head>
<body id="div1" dir="rtl">
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>اضافه کردن مورد
                            <a href="index.php" class="btn btn-danger float-start">بازگشت</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>مورد</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>منطقه</label>
                                <input type="text" name="zone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>قیمت</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>متراژ</label>
                                <input type="text" name="area" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>نام مشتری</label>
                                <input type="text" name="customer" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>شماره تماس</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>پیش پرداخت و اجاره</label>
                                <input type="text" name="rent" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>توضیحات و آدرس</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">ذخیره</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}
}
else{
    header("Location: index.php");
     exit();
}

 ?>
 