<?php
include('./includes.connection.php');

$esc_email = mysqli_real_escape_string($con, $_POST['email']);
$esc_pw = mysqli_real_escape_string($con, $_POST['password']);

$get_salt = 
    "SELECT salt
    FROM userlogin
    WHERE email = '$esc_email'";

$find_user = 
    "SELECT email
    FROM userlogin
    WHERE email = '$esc_email' AND
    password = '$hash_pw'";

if($res = mysqli_query($con, $get_salt)){
    $row = mysqli_fetch_assoc($res);
    $salt = $row['salt'];
    $salt_pw = $esc_pw . $salt;
    $hash_pw = hash('sha256', $salt_pw);
    }
else{
    mysqli_close($con);
    header("location: /login.php?remarks=nfd1");
    }
if(mysqli_query($con, $find_user)){
    setcookie('email', $esc_email, false, '/user', 'test.drdiii.com');
    setcookie('hash_pw', $hash_pw, false, '/user', 'test.drdiii.com');
    mysqli_close($con);
    header("Location: ./Account/index.php");
    }
else{
    mysqli_close($con);
    header("location: /login.php?remarks=nfd2");
    }
?>