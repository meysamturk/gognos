<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   
   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price) VALUES('$p_name', '$p_price')") or die('query failed');

   if($insert_query){
      $message[] = '.محصول اضافه شد';
   }else{
      $message[] = 'خطا';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      
      $message[] = '.محصول حذف شد';
   }else{
     
      $message[] = 'خطا';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      header('location:admin.php');
      $message[] = '.محصول ویرایش شد';
      
   }else{
      header('location:admin.php');
      $message[] = 'خطا';
     
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
   <title>تعاونی مصرف سایپا آذربایجان</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="icon" type="image/x-icon" href="../../assets/Gognos_icon.png" />

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

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data" id="div1">
   <h3 id="div1">اضافه کردن محصول</h3>
   <input id="div1" type="text" name="p_name" placeholder="نام محصول" class="box" required>
   <input id="div1" type="number" name="p_price" min="0" placeholder="قیمت محصول" class="box" required>
   <input id="div1" type="submit" value="ذخیره" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>

         <th id="div1">نام محصول</th>
         <th id="div1">قیمت محصول</th>
         <th id="div1">ویرایش</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr id="div1">
            
            <td id="div1"><?php echo $row['name']; ?></td>
            <td id="div1"> <?php echo number_format( $row['price']); ?> ریال</td>
            <td>
               <a id="div1" href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('آیا میخواهید محصول حذف شود؟');"> <i class="fas fa-trash"></i> حذف </a>
               <a id="div1" href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> ویرایش </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>خطا</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="submit" value="ویرایش" name="update_product" class="btn">
      <input type="reset" value="خروج" id="close-edit" class="option-btn">
   </form>
   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
</section>
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>