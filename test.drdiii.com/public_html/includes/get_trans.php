<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
session_start();
$trans_found = 'n';
$today = date("YmdHis");
$cust_id = $_SESSION['cust_id'];
$get_trans = 
    "SELECT tran_datetime, tran_type, tran_amt, bal
    FROM cust_trans
    WHERE cust_id = '$cust_id'";
    /*AND tran_datetime > '$from_date'
    AND tran_datetime < '$through_date'";*/
	
if (empty($_POST['from_date'])){
	$from_date = date('YmdHis', strtotime("now -30 days") );
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
	
$res = mysqli_query($con, $get_trans);
?>
<div style="text-align: center">
<table border="1" style="width:600px">
<tr>
	<th>Transaction Date</th>
	<th>Transaction Type</th>
	<th>Transaction Amount</th>
	<th>Resulting Balance</th>
</tr>
<?php
while ($row = mysqli_fetch_row($res)){
	$tran_date = strtotime($row[0]);
	if (strtotime($from_date) <= $tran_date and $tran_date <= strtotime($through_date)){
		if ($row[1] == 'P'){
			$tran_type = 'Payment';
		}
		elseif ($row[1] == 'B'){
			$tran_type = 'Bill';
		}
		else{
			$tran_type = 'Unknown';
		}
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $tran_type; ?></td>
			<td>$<?php echo $row[2]; ?></td>
			<td>$<?php echo $row[3]; ?></td>
		</tr>
		<?php
		$trans_found = 'y';
	}
}
?>
</table>
</div>
<br />
<?php
if ($trans_found == 'n'){
	echo 'No transactions found in date range';	
}
?>