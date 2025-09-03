<?php
session_name('amlak');
session_start();
    require 'dbcon.php'; 
 function fetch_data()  
 {  
      $output = '';  
      $conect = mysqli_connect("localhost", "root", "", "blog");
      $test = array($_SESSION['user_name']);
      $test_str=implode($test);  
      $sql = "SELECT * FROM $test_str ORDER BY id ASC";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                           
                          <td>'.$row["name"].'</td>  
                          <td>'.$row["zone"].'</td>  
                          <td>'.$row["price"].'</td>  
                          <td>'.$row["area"].'</td> 
                          <td>'.$row["customer"].'</td> 
                          <td>'.$row["phone"].'</td> 
                          <td>'.$row["rent"].'</td> 
                          <td>'.$row["address"].'</td> 
                     </tr>  
                          ';  
      }  
      return $output;  
 } 
    if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!doctype html>
<html lang="fa" dir="rtl">
    
  <head>
  <style>
              @import url('https://fonts.googleapis.com/css2?family=Beiruti:wght@200..900&display=swap');
          #div1{
          font-family: "Beiruti", sans-serif;
              }
        @media only screen and (max-width:800px) {
            #no-more-tables tbody,
            #no-more-tables tr,
            #no-more-tables td {
                display: block;
            }
            #no-more-tables thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            #no-more-tables td {
                position: relative;
                padding-left: 50%;
                border: 1px solid black;
                border-bottom: 1px solid #eee;
                height: 50px;
            }
            
            #no-more-tables{
                    width: 100%;
                    overflow-x: hidden;
                    position:relative;
                }
            #no-more-tables tr {
                border-bottom: 1px solid #ccc;
            }
            #no-more-tables tr td form{
                    position:absolute;
                    display: inline;
                }
                #no-more-tables tr td form button{
                    margin-right:100px;
                }
           
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/Gognos_icon.png" />

    <!--  Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <title>ققنس</title>
    
</head>
<body id="div1">
<div class="d-grid gap-2 " >
  <a class="btn btn-primary fs-3  fst-italic fw-semibold " id="div1" type="button" href="../../index.html" >خروج</a>
          
                     <form method="post">  
                     <div class="d-grid gap-2">
                     <a class="btn btn-primary fs-3  fst-italic fw-semibold " id="div1" type="button" href="pdf.php" >pdf</a>
                     </div>

                     </form>   


</div>

  <div class="table-responsive" id="no-more-tables">
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-5">
                            <p>
                                    <?php 
                                    $test = array($_SESSION['user_name']);
                                    $test_str=implode($test);
                                    $dash_category_query = "SELECT * from $test_str ";
                                    $dash_category_query_run= mysqli_query($con,$dash_category_query);
                                    
                                    if($category_total = mysqli_num_rows( $dash_category_query_run)+1)
                                    {

                                        if($category_total <="5")
                                        { 
                                            $category_total_add=$category_total-1;
                                            echo  '
                                            <a href="student-create.php" type="button" class="btn btn-primary">
                                            اضافه کردن مورد : <span class="badge bg-secondary">'.$category_total_add.'</span>
                                          </a> ';
                                           }
                                           else{
                                            $category_total_add=$category_total-1;
                                                echo'
                                                       
                                                       <a href="#" class="btn btn-primary float-end" >
                                                       مورد های ذخیره شده ی شما =  
                                                        <small class="text-body-secondary">'.$category_total_add.'</small>
                                                        </a>
                                              ';
                                                  
                                               }
                                   
                                    }
                                         else{
                                                echo'<h4 class="mb-0"> مشکل اطلاعات</h4>';
                                             }
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="name" Required class="form-select  mt-1">
                                                <option value="disable" >انتخاب کن</option>
                                                <option value="خرید" <?=isset($_GET['students'])==true ? ($_GET['students']=='خرید'?'selected':''):''?>>خرید</option>
                                                <option value="فروش"<?=isset($_GET['students'])==true ? ($_GET['students']=='فروش'?'selected':''):''?>>فروش</option>
                                                <option value="درخواست"<?=isset($_GET['students'])==true ? ($_GET['students']=='فروش'?'selected':''):''?>>درخواست</option>
                                                <option value="رهن"<?=isset($_GET['students'])==true ? ($_GET['students']=='فروش'?'selected':''):''?>>رهن</option>
                                                <option value="اجاره"<?=isset($_GET['students'])==true ? ($_GET['students']=='فروش'?'selected':''):''?>>اجاره</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                        
                                            <button type="submit" class="btn btn-primary mt-1">فیلتر</button>
                                            <a href="index.php" class="btn btn-danger mt-1">ریست</a>
                                            
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class='row'>
                            <div class="col-md-7">
                                <form action="" dir="ltr">
                            <div class="input-group mb-3">

                                
                            
                             <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="جستجو">
                              <button type="submit" class="btn btn-primary"> جستجو</button>
                              </div>
                              
                              </form>
                            </div>
                        </div>
                            <p class="fw-bolder fs-2 text-primary-emphasis p-1 mb-4 bg-dark text-white text-center">املاک <?php  echo $_SESSION['user_name']; ?></p>
                         
                                     <?php 
                                     if(isset($_GET['name'])&& $_GET['name']!='')
                                     {
                                        $test = array($_SESSION['user_name']);
                                        $test_str=implode($test);
                                        $students = ($_GET['name']);
                                        
                                        $query = "SELECT * FROM $test_str WHERE name='$students' ORDER BY id DESC ";
                                        $query_run = mysqli_query($con, $query);
                                     }
                                     elseif (isset($_GET['search']))
                                     {
                                        $test =array ($_SESSION['user_name']);
                                        $test_str=implode($test);
                                         $filtervalues = $_GET['search'];
                                         $query = "SELECT * FROM $test_str   WHERE CONCAT(name,area,price,zone) LIKE '%$filtervalues%'  ";
                                         $query_run = mysqli_query($con, $query);
                                     }
                                     else {
                                        $test =array ($_SESSION['user_name']);
                                        $test_str=implode($test);
                                        $query = "SELECT * FROM $test_str ORDER BY id DESC ";
                                        $query_run = mysqli_query($con, $query);
                                     }
                                     

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                      ?>

                        <table class="table  table-responsive table-bordered border-dark  table-hover text-center">
                        
                          
                            <thead>
                                <tr class="table-active" >
                                    <th><h5>ردیف</h5></th>
                                    <th><h5>مورد</h5></th>
                                    <th><h5>منطقه</h5></th>
                                    <th><h5>قیمت</h5></th>
                                    <th><h5>متراژ</h5></th>
                                    <th><h5>اصلاحات</h5></th>
                                </tr>
                            </thead>
                            <tbody >

                                        <?php
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['id']; ?></td>
                                                <td><?= $student['name']; ?></td>
                                                <td><?= $student['zone']; ?></td>
                                                <td><?= $student['price']; ?></td>
                                                <td><?= $student['area']; ?></td>
                                                <td>
                                                    <div class="d-grid gap-2 d-md-block">
                                                     
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">نمایش</a>
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">اصلاح</a>
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger  btn-sm ">حذف</button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        
                            </tbody>
                        </table>
                        <?php
                                    }
                                    else
                                    {
                                        echo '<h5>اطلاعات ذخیره نشده</h5>';
                                    }
                                
                               ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>