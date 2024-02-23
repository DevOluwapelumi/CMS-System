<?php
session_start();
if(!isset($_SESSION['u_id'])){
    echo "<script>window.open('../login.php','_self')</script>";
} else{
    include("mycon.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create Post</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        .require {
            color: #666;
        }
        label small {
            color: #999;
            font-weight: normal;
            }
        .post{
            margin: 0 auto;
            width: 100%;
            margin-top: 20px;
            margin-bottom:10px;
        }
    </style>  
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <!-- Sidebar -->
        <?php include('sidebar.php');?>
         <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('topbar.php');?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row post">
         <div class="col-12">
                <h1>Create post</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group has-error">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="p_title" />
                    </div>
                    
                 
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea rows="5" class="form-control" name="p_description" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Post Content</label>
                        <textarea rows="15" class="form-control" name="p_content" ></textarea>
                    </div>
                    
                    <div class="form-group">
                            <label>Picture</label>
                            <input type="file" name="p_pic" class="form-control">
                        </div>
                        <br>
                    <div class="form-group">
                            <input type="submit" value="Publish" name="publish" class="btn btn-primary">
                    </div>
                </form>

    <?php 

    if(isset($_POST['publish'])){
        $p_title =  $_POST['p_title'];
        $p_description =  $_POST['p_description'];
        $p_content =  $_POST['p_content'];
        $p_pic =  $_FILES['p_pic']['name'];
        $p_pic_temp =  $_FILES['p_pic']['tmp_name'];
        $date = date('Y-m-d H:i:s');
        $p_date =  $date;
        $p_id = $_SESSION['u_id'];
        move_uploaded_file($p_pic_temp, "../post_img/$p_pic");
        $query = "INSERT INTO all_posts (p_title, p_description, p_content, p_pic, p_date, p_user) values ('$p_title', '$p_description', '$p_content', '$p_pic', '$p_date', '$p_id')";
        if(mysqli_query($con, $query)){
            $logged_user = $_SESSION['u_id'];
            $user = "select * from all_users where u_id= $logged_user";
            $obj = mysqli_query($con, $user);
            $row = mysqli_fetch_array($obj);
    
            if($row['u_is_admin']=='True') {
                echo "<script>window.open('all_posts.php', '_self')</script>";
            }else {
                echo "<script>window.open('your_posting.php', '_self')</script>";
            }
    
        }
    }
    
    
    ?>
    </div>
         </div>   
    </div>                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; JafriCode.com 2022-23</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php } ?>