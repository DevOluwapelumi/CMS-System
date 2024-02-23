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

    <title>User Profile Setting</title>

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
         .register{
            margin: auto;
            width: 50%;
            margin-top: 20px;
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
                <?php include('topbar.php');?>                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
        <div class="row register">
            <div class="col-12">
          <?php
          $id =  $_SESSION['u_id'];
          $query = "select * from all_users where u_id = $id ";
          $obj = mysqli_query($con, $query);
          $row = mysqli_fetch_array($obj);
          
          ?>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">User Profile Updation</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="u_name" value="<?php echo $row['u_name'];?>" class="form-control" >
                        </div> 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="u_email" value="<?php echo $row['u_email'];?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="u_pass" value="<?php echo $row['u_pass'];?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Picture</label>
                            <input type="file" name="u_pic" class="form-control">
                            <img src="../img/<?php echo $row['u_pic'];?>" alt="" width="80" height="80">
                        </div>

                        <div class="form-group">
                            <label>DOB</label>
                            <input type="date" name="u_dob" value="<?php echo $row['u_dob'];?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="u_country" value="<?php echo $row['u_country'];?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="u_city" value="<?php echo $row['u_city'];?>" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="url" name="u_site" value="<?php echo $row['u_site'];?>" class="form-control" >
                        </div>
                        <label>Bio</label>
                        <div class="form-group">
                            <textarea name="u_bio" id="" cols="64" rows="10" class="form-control">
                            <?php echo $row['u_bio'];?>
                            </textarea>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="update" class="btn btn-success" value="Update">
                    </div>
                </form>  
<?php
if(isset($_POST['update'])){
    $u_name =  $_POST['u_name'];
    $u_email =  $_POST['u_email'];
    $u_pass =  $_POST['u_pass'];
    $u_pic =  $_FILES['u_pic']['name'];
	$u_pic_temp =  $_FILES['u_pic']['tmp_name'];
    $u_dob =  $_POST['u_dob'];
    $u_country =  $_POST['u_country'];
    $u_city =  $_POST['u_city'];
    $u_site =  $_POST['u_site'];
    $u_bio =  $_POST['u_bio'];  
	move_uploaded_file($u_pic_temp, "../img/$u_pic");

    $update_user = "update all_users set u_name='$u_name', u_email='$u_email', u_pass='$u_pass', u_pic='$u_pic',u_dob='$u_dob',u_country='$u_country',u_city='$u_city',u_site='$u_site',u_bio ='$u_bio' where u_id='$id'";
    if (mysqli_query($con, $update_user)){
        
        echo "<script>window.open('user_profile.php', '_self')</script>";
        exit();
    }

}

?>
            </div>

        </div>
</div>
                <!-- /.container-fluid -->

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