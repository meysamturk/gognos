<?php
@include 'config.php';
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
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
   <title>سبد خرید</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body dir="rtl">

<?php include 'header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading" id="div1">سبد خرید</h1>

   <table>

      <thead>
         <th id="div1">نام</th>
         <th id="div1">قیمت</th>
         <th id="div1">مقدار</th>
         <th id="div1">جمع مبلغ</th>
         <th id="div1">توجه</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td id="div1"><?php echo $fetch_cart['name']; ?></td>
            <td id="div1"><?php echo number_format($fetch_cart['price']); ?>ریال</td>
            <td>
               <form action="" method="post">
                  <input id="div1" type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input id="div1" type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input id="div1" type="submit" value="افزودن" name="update_update_btn">
               </form>   
            </td>
            <td id="div1"><?php 
                       $sub_total =   $fetch_cart['price'] * $fetch_cart['quantity'];
                       $grand_total +=$sub_total;  
                      echo number_format($sub_total) ;  ?> <a id="div1">ریال</a></td>
            <td><a id="div1" href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> حذف</a></td>
         </tr>
         <?php
             
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;" id="div1">ادامه خرید</a></td>
            <td colspan="2" id="div1">جمع حساب </td>
            <td id="div1"><?php echo number_format($grand_total); ?>ریال</td>
            <td><a id="div1" href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> حذف همه </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a id="div1" href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">تکمیل خرید</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>