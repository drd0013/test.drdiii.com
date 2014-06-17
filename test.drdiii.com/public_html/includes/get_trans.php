<?php
session_start();
include('./connection.php');
echo $host;
$today = date("Y-m-d");
$cust_id = $_SESSION['cust_id'];
$get_trans = 
    "SELECT tran_datetime, tran_type, tran_amt, bal
    FROM cust_trans
    WHERE cust_id = '$cust_id'";
    /*AND tran_datetime > '$from_date'
    AND tran_datetime < '$through_date'";*/
echo $_SESSION['cust_id'] . $cust_id;
	
if (empty($_POST['from_date'])){
	$from_date = date('Y-m-d', strtotime("now -30 days") );
}
else{
	$from_date = $_POST['from_date'];
}
if (empty($_POST['through_date'])){
	$through_date = $today;
}
else{
	$through_date = $_POST['through_date'];
}
echo $from_date . '  ' . $through_date . '  ' . $cust_id;
	
$res = mysqli_query($con, $get_trans);
echo mysqli_num_rows($res);
while ($row = mysqli_fetch_assoc($res)){
	echo $row[0] . '  ' . 
	$row[1] . '  ' . 
	$row[2] . '  ' . 
	$row[3]; 
	
}
?>