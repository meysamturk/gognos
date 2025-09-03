<?php
session_name('amlak');
    require 'dbcon.php';
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!doctype html>
<html lang="fa" dir="rtl">
    
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

    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>نمایش جزئیات</title>
</head>
<body id="div1">

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>نمایش جزئیات
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
                                
                                    <div class="mb-3">
                                        <label>مورد</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>منطقه</label>
                                        <p class="form-control">
                                            <?=$student['zone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>قیمت</label>
                                        <p class="form-control">
                                            <?=$student['price'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>متراژ</label>
                                        <p class="form-control">
                                            <?=$student['area'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>نام مشتری</label>
                                        <p class="form-control">
                                            <?=$student['customer'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>شماره تماس</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>پیش پرداخت و اجاره</label>
                                        <p class="form-control">
                                            <?=$student['rent'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>توضیحات و آدرس</label>
                                        <p class="form-control">
                                            <?=$student['address'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>مورد یافت شد</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>