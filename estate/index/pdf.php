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
            #no-more-tables td:before {
                content: attr(data-title);
                position: absolute;
                left: 6px;
                font-weight: bold;
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
  <a class="btn btn-primary fs-3  fst-italic fw-semibold " id="div1" type="button" href="index.php" >خروج</a>
          
                     <form method="post">  
                     <div class="d-grid gap-2">
                     <button onclick= " window.print()" class="btn btn-outline-primary fs-3  fst-italic fw-semibold">گرفتن خروجی</button>  
                     </div>

                     </form>   


</div>
  <div class="table-responsive" id="no-more-tables">
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
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