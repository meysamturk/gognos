<header class="header" dir="ltr">
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&display=swap');
          #div1{
          font-family: "Beiruti", sans-serif;
              }
        </style>

   <div class="flex">

      <a href="../../index.html" class="logo" id="div1">ققنُس</a>

      <nav class="navbar">
         <a id="div1" href="admin.php">اضافه کردن محصول</a>
         <a id="div1" href="products.php">مشاهده ی محصولات</a>
         <a id="div1" href="../sell_pdf/index.php">سفارش ها</a>
         <a id="div1" href="../add_user/user_list/index.php">اضافه کردن کاربر</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a id="div1" href="cart.php" class="cart">سبد خرید <span id="div1"><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>