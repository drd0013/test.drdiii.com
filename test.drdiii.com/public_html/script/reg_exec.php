<?php

include('../includes/connection.php');

$esc_custid = mysqli_real_escape_string($con, $_POST['custid']);
$esc_contact = mysqli_real_escape_string($con, $_POST['contact']);
$esc_email = mysqli_real_escape_string($con, $_POST['email']);
$esc_pw = mysqli_real_escape_string($con, $_POST['password']);
$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
$salt_pw = $esc_pw . $salt;
$hash_pw = hash('sha256', $salt_pw);
$search_cust = 
    "SELECT phone_1, phone_2 AS tempnum
    FROM userdata
    WHERE cust_id = '$esc_custid'";

$search_id =
    "SELECT cust_id
    FROM userlogin
    WHERE cust_id = '$esc_custid'";

$create_user = 
    "INSERT INTO userlogin (cust_id, email, password, salt)
    VALUES('$esc_custid', '$esc_email', '$hash_pw', '$salt')";


$res = mysqli_query($con,$search_cust);
if (!$row = mysqli_fetch_row($res)){
    mysqli_close($con);
    header("location: ../register.php?remarks=failcust");
	exit;
}
if($esc_contact == $row[0] or $row[1]){
    $res = mysqli_query($con, $search_id);
	if (mysqli_fetch_row($res)){
		mysqli_close($con);
        header("location: ../register.php?remarks=failexists");
		exit;
    }
	elseif(mysqli_query($con,$create_user)){
        	include('../includes/sendmail.php');
            mysqli_close($con);
            header("location: ../register.php?remarks=success");
			exit;
        }
		else{
			mysqli_close($con);
			header("location: ../register.php?remarks=failed");
			exit;
	}
}
else{
    mysqli_close($con);
    header("location: ../register.php?remarks=failnum");
    exit;
}

?>