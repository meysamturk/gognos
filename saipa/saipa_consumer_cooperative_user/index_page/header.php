<header class="header" dir="ltr">
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&display=swap');
          #div1{
          font-family: "Beiruti", sans-serif;
              }
        </style>
   <link rel="stylesheet" href="css/style.css">
   <div class="flex">
      <a href="#" class="logo" id="div1">ققنس</a>
      <nav class="navbar" id="div1">
         
         <a id="div1" href="products.php">مشاهده ی محصولات</a>
         <a id="div1" href="../../login_Personnel/index.html">خروج</a>
         
      </nav>

      <?php  
      error_reporting(E_ALL ^ E_NOTICE);
      session_start(); 
      if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
      $test = array($_SESSION['user_name']);
      $test_str=implode($test); 
      $select_rows = mysqli_query($conn, "SELECT * FROM $test_str") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      
      ?>

      <a id="div1" href="cart.php" class="cart">سبد خرید <span id="div1"><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>
<?php 
}else{
     header("Location: cart.php");
     exit();
}
 ?>