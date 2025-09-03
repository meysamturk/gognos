    <?php
        require 'config.php'; 
    ?>
    <!doctype html>
    <html lang="fa-IR" dir="rtl">
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
                    margin-right:5px;
                }
                
                
            
            } 
        </style>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--  Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <title>ثبت آمار</title>
        <nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
      <div class="container-fluid">
      <a class="navbar-brand " href="../index.html">ققنس</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
           </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.html">خروج</a>
        </li>
      </ul>
      
    </div>
    </div>
    </nav>
    </head>
    <body id="div1">
    <div class="table-responsive" id="no-more-tables">
        <div class="container mt-4">

            <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card ">


                    

                    <div class="card-header">
        <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
        <p>
                                        <?php 
                                        $dash_category_query = "SELECT * from `managers_confirm_statistics` ";
                                        $dash_category_query_run= mysqli_query($conn,$dash_category_query);
                                        $category_total = mysqli_num_rows( $dash_category_query_run); 
                                                echo  '
                                                <a href="statistics-create.php" type="button" class="btn btn-primary">
                                                اضافه کردن مورد : <span class="badge bg-secondary">'.$category_total.'</span>
                                            </a>

                                                ';
                                        ?>
                                    </p>
        </li>
        <li class="nav-item">
                                    <form action="" method="GET">
                                        <div class="float-start">  
                                            <div class="col-md-4 ">
                                                <a href="statistics.php" class="btn btn-danger mx-1">ریست</a>  
                                            </div>
                                        </div>
                                    </form>  
        </li>
        
                </ul>
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
                                <p class="fw-bolder fs-2 text-primary-emphasis p-1 mb-4 bg-dark text-white text-center">ثبت آمار</p>
                            
                                        <?php 
                                        if(isset($_GET['name'])&& $_GET['name']!='')
                                        {
                                            
                                    
                                            
                                            
                                            $students = ($_GET['name']);
                                            
                                            $query = "SELECT * FROM `managers_confirm_statistics` WHERE name='$students' ORDER BY id DESC ";
                                            $query_run = mysqli_query($conn, $query);
                                        }
                                        elseif (isset($_GET['search']))
                                        {
                                            $test =array ('name');
                                            
                                            $filtervalues = $_GET['search'];
                                            $query = "SELECT * FROM `managers_confirm_statistics`   WHERE CONCAT(name,user_number) LIKE '%$filtervalues%'  ";
                                            $query_run = mysqli_query($conn, $query);
                                        }
                                        else {
                                            $test =array ('name');
                                            
                                            $query = "SELECT * FROM `managers_confirm_statistics` ORDER BY id DESC ";
                                            $query_run = mysqli_query($conn, $query);
                                        }
                                        

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                        ?>

                            <table class="table  table-responsive-sm table-bordered border-dark  table-hover text-center">
                            
                            
                                <thead>
                                    <tr class="table-active" >
                                        <th><h5>ردیف</h5></th>
                                        <th><h5>نام</h5></th>
                                        <th><h5>شماره پرسنل</h5></th>
                                        <th><h5>قسمت</h5></th>
                                        <th><h5>مرحله</h5></th>
                                        <th><h5>تعداد</h5></th>
                                        <th><h5>مرحله</h5></th>
                                        <th><h5>تعداد</h5></th>
                                        <th><h5>مرحله</h5></th>
                                        <th><h5>تعداد</h5></th>
                                        <th><h5>ویرایش</h5></th>
                                        
                                    </tr>
                                </thead>
                                <tbody >

                                            <?php
                                            foreach($query_run as $student)
                                            {
                                                ?>
                                                <tr>
                                                    <td data-title="ردیف"><?= $student['id']; ?></td>
                                                    <td data-title="نام"><?= $student['name']; ?></td>
                                                    <td data-title="شماره پرسنل"><?= $student['user_number']; ?></td>
                                                    <td data-title="قسمت"><?= $student['part']; ?></td>
                                                    <td data-title="مرحله"><?= $student['stage_one']; ?></td>
                                                    <td data-title="تعداد"><?= $student['number_one']; ?></td>
                                                    <td data-title="مرحله"><?= $student['stage_two']; ?></td>
                                                    <td data-title="تعداد"><?= $student['number_two']; ?></td>
                                                    <td data-title="مرحله"><?= $student['stage_three']; ?></td>
                                                    <td data-title="تعداد"><?= $student['number_three']; ?></td>
                                                    
                                                    <td data-title="ویرایش" class="edits_btn">
                                                    <div class="d-grid gap-2 d-md-block">
                                                        <form action="code.php" method="POST" class="d-inline">
                                                            <a  href="statistics-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">اصلاح</a>
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
