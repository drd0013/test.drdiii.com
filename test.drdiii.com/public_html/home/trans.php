<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Account Transactions</title>
	<link href="../includes/datepicker/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
	<script src="../includes/datepicker/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../includes/datepicker/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			inline: true
		});
				$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	});
	</script>
		<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	</style>
</head>
<body>
	Displaying last 30 days of transaction history: <br>
	<?php include('../includes/get_trans.php'); ?>
	<h2 class="demoHeaders">Datepicker</h2>
	<div id="datepicker"></div>
</body>
</html>