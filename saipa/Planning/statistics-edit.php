<?php
require 'config.php'; 

    ?>
<!doctype html>
<html lang="fa">

  <head>
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
                            <a href="statistics.php" class="btn btn-danger float-start">بازگشت</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            
                           
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM `managers_confirm_statistics` WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">


                                    <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" type="text" name="part" value="<?=$student['part'];?>">
                                        <option selected>قسمت...</option>
                                        <option value="بلوک">بلوک</option>
                                        <option value="میلنگ">میلنگ</option>
                                        <option value="کپه">کپه</option>
                                    </select>
                                    </div>


                                    <div class="mb-3">
                                        <label>نام</label>
                                        <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>شماره پرسنل</label>
                                        <input type="text" name="user_number" value="<?=$student['user_number'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>مرحله</label>
                                        <input type="text" name="stage_one" value="<?=$student['stage_one'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>تعداد</label>
                                        <input type="text" name="number_one" value="<?=$student['number_one'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>مرحله</label>
                                        <input type="text" name="stage_two" value="<?=$student['stage_two'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>تعداد</label>
                                        <input type="text" name="number_two" value="<?=$student['number_two'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>مرحله</label>
                                        <input type="text" name="stage_three" value="<?=$student['stage_three'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>تعداد</label>
                                        <input type="text" name="number_three" value="<?=$student['number_three'];?>" class="form-control">
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
