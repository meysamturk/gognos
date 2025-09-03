<?php
session_name('users_tavoni_saipa');  
session_start();
@include '../config/config.php';
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $test = array($_SESSION['user_name']);
   $test_str=implode($test);
   $cart_query = mysqli_query($conn, "SELECT * FROM $test_str");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number,total_product,price_total) VALUES('$name','$number','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>تشکر از خرید شما!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> جمع :".$price_total."  ریال </span>
         </div>
         <div class='customer-details'>
            <p>  نام : <span>".$name."</span> </p>
            <p>  شماره پرسنل : <span>".$number."</span> </p>
           
         </div>
            <a href='products.php' class='btn'>اضافه کردن محصول</a>
         </div>
      </div>
      ";
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
      <link rel="icon" type="image/x-icon" href="../../../assets/Gognos_icon.png" />

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body dir="rtl" id="div1">

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading" id="div1">تکمیل سفارش</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $test = array($_SESSION['user_name']);
         $test_str=implode($test);
         $select_cart = mysqli_query($conn, "SELECT * FROM $test_str");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){

            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total = $total += $total_price;
            
      ?>
      <span id="div1"><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>سبد خالی میباشد!</span></div>";
      }
      ?>
      <span class="grand-total" id="div1"> جمع حساب :  ریال<?= number_format($grand_total); ?> </span>
   </div>

      <div class="flex">
         <div class="inputBox" id="div1">
            <span id="div1">نام </span>
            <input id="div1" type="text" placeholder="نام" name="name" required>
         </div>
         <div class="inputBox">
            <span id="div1">شماره پرسنلی</span>
            <input  id="div1" type="number" placeholder="شماره پرسنلی" name="number" required>
         </div>
      </div>
      <input id="div1" type="submit" value="ارسال" name="order_btn" class="btn">
   </form>

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