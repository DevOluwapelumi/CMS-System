<?php
session_start();
include("mycon.php");

if(isset($_POST['login'])){
   $u_email =  $_POST['u_email'];
   $u_pass =  $_POST['u_pass'];
   $query = "select * from all_users where u_email = '$u_email' and u_pass='$u_pass'";
   $user_obj = mysqli_query($con, $query);
   $row = mysqli_fetch_array($user_obj);
   $id = $row['u_id'];
   $num_of_row = mysqli_num_rows($user_obj);
   
   if($num_of_row == 1){
    $_SESSION['u_id'] = $id;
    echo "<script>window.open('index.php','_self');</script>";
    }
else {
    echo "<script>alert('Your email or passowrd is incorrect, try again...');</script>";
}
}
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .login{
            margin: auto;
            width: 50%;
            margin-top: 20px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #cccccc;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="container border shadow-lg">
  <h2 class="text-center">Sign In</h2>
  <hr>
  <div class="row justify-content-center">
    <div class="col-12">
      <form method="post">
        <div class="mb-4">
          <label for="form2Example1" class="form-label">Email address</label>
          <input type="email" name="u_email" id="form2Example1" class="form-control" />
        </div>
        <div class="mb-4">
          <label for="form2Example2" class="form-label">Password</label>
          <input type="password" name="u_pass" id="form2Example2" class="form-control" />
        </div>
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
              <label class="form-check-label" for="form2Example31">Remember me</label>
            </div>
          </div>
          <div class="col">
            <a href="#!">Forgot password?</a>
          </div>
        </div>
        <input type="submit" name="login" value="Login" class="btn btn-primary btn-block mb-4">
        <div class="text-center">
          <p>Not a member? <a href="register.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>