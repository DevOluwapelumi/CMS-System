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
            width: 70%;
            margin-top: 20px;
        }
        body {
    font-family: Arial, sans-serif;
    margin: 0; /* Adjusted to remove default margin */
    padding: 0; /* Ensure there's no default padding */
    height: 100vh; /* Full height of the viewport */
    background: linear-gradient(to right, #007bff, #6610f2); /* Gradient background */
    color: white;
    position: relative; /* Needed for absolute positioning of pseudo-element */
    overflow: hidden; /* Ensures pseudo-element doesn't extend beyond the viewport */
}

body::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 30%; /* Adjust based on the desired size of the curve */
    background: #6A8DAB; /* Color of the curve, matching the container's background */
    border-radius: 100% / 100%; /* Creates the curve */
    transform: scaleY(5.5); /* Stretches the shape to ensure it spans wider than the viewport */
    z-index: -1; /* Ensures the curve is behind the content */
}

.container {
    width: 90%;
    max-width: 400px;
    margin: 10% auto 0; /* Centering the container with a margin top */
    padding: 20px;
    border: 1px solid #cccccc;
    border-radius: 55px;
    background: blue;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative; /* To stack properly on top of the pseudo-element */
    z-index: 1; /* Ensures the container is above the curved background */
}


@media (max-width: 768px) {
    body {
        display: flex; /* Establishes a flex container */
        flex-direction: column; /* Stacks flex items vertically */
        justify-content: center; /* Centers vertically in the flex container */
        align-items: center; /* Centers horizontally in the flex container */
        min-height: 100vh; /* Minimum height of the viewport */
        margin: 10px; /* Provides a little space around the edges */
    }

    .container {
        width: 100%; /* Adjust width for smaller screens */
        max-width: 400px; /* Maximum width to maintain readability */
        padding: 10px; /* Inner spacing */
        margin: 0; /* Reset margin to allow flexbox centering to take effect */
    }

    h2 {
        font-size: 1.5rem; /* Smaller heading on small screens */
    }

    .form-control {
        font-size: 1rem; /* Adjusts form control text size for readability */
    }
}

    </style>
</head>
<body>
<div class="container border shadow-lg mt-5">
  <h2 class="text-center">Sign In</h2>
  <img
    src="https://img.freepik.com/free-vector/flat-design-cms-illustration_23-2148825220.jpg"
    class="img-fluid rounded-top"
    alt=""
  />
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