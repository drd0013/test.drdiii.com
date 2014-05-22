<?php
include('./includes/connection.php');

$email = $_POST['email'];
$escapedPW = mysql_real_escape_string($_POST['password']);

$saltQuery = "select salt 
from userlogin 
where email = '$email'";
$result = mysqli_query($con,$saltQuery)
or die(header("location: login.php?remarks=nfd1"));
# you'll want some error handling in production code :)
# see http://php.net/manual/en/function.mysql-query.php Example #2 for the general error handling template
$row = mysqli_fetch_assoc($result);
$salt = $row['salt'];
if (!$result){
	header("location: login.php?remarks=nfd4");
	exit();
}

$saltedPW =  $escapedPW . $salt;

$hashedPW = hash('sha256', $saltedPW);

$PWquery = "select count(email) as num
from userlogin 
where email = '$email' and 
password = '$hashedPW'";

$result = mysqli_query($con,$PWquery)
or die(header("location: login.php?remarks=nfd2"));
$login = mysqli_fetch_assoc($result);
$login = $login['num'];

if ($login > 0){
	header("location: ./login_success.php?remarks=" . (string)$email . '');
}
else{
	header("location: login.php?remarks=nfd3");
}

# if nonzero query return then successful login

?>