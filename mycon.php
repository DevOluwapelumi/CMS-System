<?php
# host, username, pwd, db name
$servername = "localhost";
$username = "root";
$user_pwd = "";
$db = "cms";
$con = mysqli_connect($servername, $username, $user_pwd, $db);

if(!$con){
    die("Connection is failed". mysqli_connect_error());
}
?>