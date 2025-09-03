<?php
session_name('users_tavoni_saipa');  
session_start();
@include '../config/config.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = 1;
   $test = array($_SESSION['user_name']);
   $test_str=implode($test);
   $select_cart = mysqli_query($conn, "SELECT * FROM $test_str WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'محصول قبلا به سبد اضافه شده';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO $test_str(name, price, quantity) VALUES('$product_name', '$product_price', '$product_quantity')");
      $message[] = 'محصول به سبد اضافه شد';
   }
}
?>

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
   <link rel="icon" type="image/x-icon" href="../../assets/Gognos_icon.png" />
   <title>محصول </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body dir="rtl" id="div1">
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading" id="div1">محصولات</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <h3 id="div1"><?php echo $fetch_product['name']; ?></h3>
            <div id="div1" class="price"><?php echo number_format($fetch_product['price']); ?>ریال</div>
            <input id="div1" type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input id="div1" type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input id="div1" type="submit" class="btn" value="اضافه کردن به سبد" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>