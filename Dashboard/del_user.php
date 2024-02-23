<?php

session_start();
if(!isset($_SESSION['u_id'])){
    echo "<script>window.open('../login.php','_self')</script>";
} else{
    include("mycon.php");

if(isset($_GET['del'])){
    $id =  $_GET['del'];
    $del_query = "delete from all_users where u_id = $id";
    if(mysqli_query($con, $del_query)){
        echo "<script>alert('User is deleted.....')</script>";
        echo "<script>window.open('all_users.php','_self')</script>";

    }

}
}
?>