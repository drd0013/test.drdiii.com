<?php
$host = 'localhost';
$uname = 'gasadmin';
$pword = 'Gassy';
$db = 'gastest';
$key = '/etc/.ssh/key.pem';
$cert = '/etc/.ssh/cert.pem';
$ca = '/etc/.ssh/cacert.pem';


mysqli_options ($con, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);

$con = mysqli_init();
if (!$con){
    die("mysqli_init_falied");
    }

mysqli_ssl_set($con, $key, $cert, $ca, NULL, NULL);


if (!mysqli_real_connect($con,$host,$uname,$pword,$db)){
    die("Connect Error: " . mysqli_connect_error());
}	

?>