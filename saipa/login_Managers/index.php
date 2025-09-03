<!DOCTYPE html>
<html lang="fa">
<head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&display=swap');
            #div1{
                font-family: "Beiruti", sans-serif;
            }
         </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="../assets/Gognos_icon.png" />
    <title>صفحه ی ورود</title>
</head>
<body id="div1">

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="img/login.png" class="img-fluid" style="width: 250px;">
           </div>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center" action="login.php" method="post">
            
            <form action="login.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
                <div class="header-text mb-4" dir="rtl">
                     <h2>ققنس</h2>
                </div>
                <div class="input-group mb-3" dir="rtl">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="uname" placeholder="نام کاربری">
                </div>
                <div class="input-group mb-3" dir="rtl">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="رمز عبور">
                </div>
                <div class="input-group mb-3 ">
                    <button class="btn btn-lg btn-primary w-100 fs-6 " type="submit">ورود</button>
                </div>
                <div class="text-center mt-4">
                <a id="div1" class="btn btn-lg btn-outline-secondary w-100 fs-6" href="../index.html">
                    <i class="fas fa-download me-2"></i>
                      سایت سایپا آذربایجان 
                </a>
                </div>
                </form>
                
          </div>
       </div> 

      </div>
    </div>

</body>
</html>