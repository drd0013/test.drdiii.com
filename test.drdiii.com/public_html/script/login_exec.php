<?php
include('../includes/connection.php');

$esc_email = mysqli_real_escape_string($con, $_POST['email']);
$esc_pw = mysqli_real_escape_string($con, $_POST['password']);

$get_salt = 
    "SELECT salt, password, cust_id
    FROM userlogin
    WHERE email = '$esc_email'";

$res = mysqli_query($con, $get_salt);
if($row = mysqli_fetch_row($res)){
    $salt = $row[0];
    $salt_pw = $esc_pw . $salt;
    $hash_pw = hash('sha256', $salt_pw);
    }
else{
    mysqli_close($con);
    header("location: ../login.php?remarks=nfd1");
	exit;
    }
if($hash_pw == $row[1]){
    session_start();
	$_SESSION['email'] = $esc_email;
	$_SESSION['cust_id'] = $row[2];
	session_regenerate_id();
    mysqli_close($con);
    header("Location: ../home/index.php");
	exit;
    }
else{
    mysqli_close($con);
    header("location: ../login.php?remarks=nfd2");
	exit;
    }
?>