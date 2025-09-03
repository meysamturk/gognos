
<?php
    require 'config.php'; 
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
    <link rel="icon" type="image/x-icon" href="../../../assets/Gognos_icon.png" />
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
                            <label> نام کاربری</label>
                                <input type="text" name="user_name" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>رمز عبور</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>نام</label>
                                <input type="text" name="name" class="form-control">
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

 