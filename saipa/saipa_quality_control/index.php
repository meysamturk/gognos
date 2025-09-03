<?php
    session_start();
    require 'config.php'; 
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
                    border-bottom: 10px solid #ccc;
                    
                }
                #no-more-tables tr td form{
                    position:absolute;
                    display: inline;
                }
                #no-more-tables tr td form button{
                   margin-right: 150px;
                }
            } 
        </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="../assets/Gognos_icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <title>کنترل کیفی</title>
  </head>
<body id="div1">
<div class="d-grid gap-2 " >
  <a class="btn btn-primary fs-3  fst-italic fw-semibold " id="div1" type="button" href="../index.html" >خروج</a>
          
                       


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
                                    
                                    
                                    $dash_category_query = "SELECT * from `saipa_quality_control` ";
                                    $dash_category_query_run= mysqli_query($conn,$dash_category_query);
                                    $category_total = mysqli_num_rows( $dash_category_query_run);
                                 
                                        
                                            
                                            echo  '
                                            <a href="saipa_quality_control-create.php" type="button" class="btn btn-primary">
                                            اضافه کردن مورد : <span class="badge bg-secondary">'.$category_total.'</span>
                                          </a>

                                            ';
                                           
                                   
                                  
                                         
                                    ?>
                                </p>


                        
                              




                            </div>
                            <div class="col-md-7">
                            <form action="" method="GET">
                                    <div class="row">  
                                        <div class="col-md-4">
                                            <a href="index.php" class="btn btn-danger">ریست</a>  
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
                            <p class="fw-bolder fs-2 text-primary-emphasis p-1 mb-4 bg-dark text-white text-center">کنترل کیفی </p>
                         
                                     <?php 
                                     if(isset($_GET['name'])&& $_GET['name']!='')
                                     {
                                        
                                
                                        
                                        
                                        $students = ($_GET['name']);
                                        
                                        $query = "SELECT * FROM `saipa_quality_control` WHERE name='$students' ORDER BY id DESC ";
                                        $query_run = mysqli_query($conn, $query);
                                     }
                                     elseif (isset($_GET['search']))
                                     {
                                        $test =array ('name');
                                        
                                         $filtervalues = $_GET['search'];
                                         $query = "SELECT * FROM `saipa_quality_control`   WHERE CONCAT(name,user_number) LIKE '%$filtervalues%'  ";
                                         $query_run = mysqli_query($conn, $query);
                                     }
                                     else {
                                        $test =array ('name');
                                        
                                        $query = "SELECT * FROM `saipa_quality_control` ORDER BY id DESC ";
                                        $query_run = mysqli_query($conn, $query);
                                     }
                                     

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                      ?>

                        <table class="table  table-responsive table-bordered border-dark  table-hover text-center">
                        
                          
                            <thead>
                                <tr class="table-active" >
                                    <th><h5>ردیف</h5></th>
                                    <th><h5>نام</h5></th>
                                    <th><h5>شماره پرسنل</h5></th>
                                    <th><h5>تاریخ</h5></th>
                                    <th><h5>شماره قطعه</h5></th>
                                    <th><h5>شیفت</h5></th>    
                                    <th><h5>ویرایش</h5></th>    
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
                                                <td><?= $student['user_number']; ?></td>
                                                <td><?= $student['date']; ?></td>
                                                <td><?= $student['block_number']; ?></td>
                                                <td><?= $student['work_shift']; ?></td>
                                        
                                                <td>
                                                    <div class="d-grid gap-2 d-md-block">
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <a href="saipa_quality_control-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">اصلاح</a>
                                                    <a href="saipa_quality_control-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">نمایش</a>
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
                                        echo '<h5>no record</h5>';
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
