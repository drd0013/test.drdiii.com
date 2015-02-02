<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/connection.php');
session_start();
$trans_found = 'n';
$today = date("Y-m-d");
$cust_id = $_SESSION['cust_id'];
	
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
$get_trans = 
    "SELECT tran_datetime, tran_type, tran_amt, bal
    FROM cust_trans
    WHERE cust_id = '$cust_id'
    AND tran_datetime BETWEEN '$from_date' AND '$through_date'";

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
?>
</table>
</div>
<br />
<?php
if ($trans_found == 'n'){
	echo 'No transactions found in date range';	
}
?>