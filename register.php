<?php
    include("mycon.php");

if(isset($_POST['register'])){
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
	
    move_uploaded_file($u_pic_temp, "img/$u_pic");
    $query = "INSERT INTO all_users (u_name, u_email, u_pass, u_pic, u_dob, u_country, u_city, u_site, u_bio) values ('$u_name', '$u_email', '$u_pass', '$u_pic', '$u_dob', '$u_country', '$u_city','$u_site','$u_bio')";
    if(mysqli_query($con, $query)){
        echo "<script>window.open('login.php', '_self')</script>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .register{
            margin: auto;
            width: 50%;
            margin-top: 20px;
        }
        body, html {
    margin: 0;
    padding: 0;
    display: grid;
    place-items: center;
    min-height: 100vh;
    background: linear-gradient(to right, #007bff, #6610f2);
    font-family: Arial, sans-serif;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 20vh; /* Use vh for a responsive height */
    transform: scaleY(5.5);
    border-bottom-right-radius: 50% 20%;
    border-bottom-left-radius: 50% 20%;
    z-index: -1;
}

.container {
    position: relative;
    max-width: 100%; /* Use percentage for maximum width for responsiveness */
    margin: 50px;
    padding: 20px;
    background: #6A8DAB;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    border-radius: 15px;
    z-index: 1;
}

/* Responsive adjustments */
@media (min-width: 576px) { /* Adjustments for small devices and up */
    .container {
        width: 500px; /* Fixed width for larger screens */
    }
}

/* Input and textarea styling for better usability on mobile */
input[type="text"],
input[type="email"],
input[type="password"],
input[type="file"],
input[type="date"],
input[type="url"],
textarea {
    width: 100%; /* Full width to maximize space */
    box-sizing: border-box; /* Include padding and border in the element's width */
}

/* Button and Link Adjustments */
.btn-success, .btn-default {
    width: 100%; /* Full width for easier touch */
    margin: 5px 0; /* Add some space between buttons */
}

a {
    display: block; /* Make links block to utilize full width */
    margin-top: 10px; /* Space above the link */
}

/* Further Responsive Adjustments */
@media (max-width: 575.98px) { /* Adjustments for extra small devices */
    body::before {
        height: 25vh; /* Increase height percentage for smaller screens */
    }

    .container {
        padding: 15px; /* Adjust padding for smaller screens */
    }

    textarea {
        height: auto; /* Allow textarea to adjust based on content */
    }
}

    </style>
</head>
<body>
    
    <div class="container border shadow-lg">
                    <h2 class="text-center">Registeration</h2>
                    <hr>
                    <div class="row justify-content-center">
                     <div class="col-12">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-4">
                            <label>Name</label>
                            <input type="text" name="u_name" value="" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label>Email</label>
                            <input type="email" name="u_email" value="" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" name="u_pass" value="" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label>Picture</label>
                            <input type="file" name="u_pic" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label>DOB</label>
                            <input type="date" name="u_dob" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label>Country</label>
                            <input type="text" name="u_country" value="" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label>City</label>
                            <input type="text" name="u_city" value="" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label>Website</label>
                            <input type="url" name="u_site" value="" class="form-control" >
                        </div>
                        <label>Bio</label>
                        <div class="mb-4">
                            <textarea name="u_bio" id="" cols="64" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="register" class="btn btn-success" value="Register">
                        <div class="text-center">
                        <p>Already a member? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
</div>
</body>
</html>