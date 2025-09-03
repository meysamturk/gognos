
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
                            <a href="statistics.php" class="btn btn-danger float-start">بازگشت</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                        <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" type="text" name="part">
                            <option selected>قسمت...</option>
                            <option value="بلوک">بلوک</option>
                            <option value="میلنگ">میلنگ</option>
                            <option value="کپه">کپه</option>
                        </select>
                        </div>
                            <div class="mb-3">
                            <label>نام</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="mb-3">
                            <label>شماره پرسنل</label>
                                <input type="text" name="user_number" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>مرحله</label>
                                <input type="text" name="stage_one" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                            <label>تعداد</label>
                                <input type="text" name="number_one" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                            <label>مرحله</label>
                                <input type="text" name="stage_two" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                            <label>تعداد</label>
                                <input type="text" name="number_two" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                            <label>مرحله</label>
                                <input type="text" name="stage_three" class="form-control" value="0">
                            </div>
                            <div class="mb-3">
                            <label>تعداد</label>
                                <input type="text" name="number_three" class="form-control" value="0">
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

 