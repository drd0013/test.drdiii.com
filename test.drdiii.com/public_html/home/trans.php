<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Account Transactions</title>
	<link rel="stylesheet" href=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/development-bundle/themes/base/jquery.ui.all.css'>
	<script src=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/js/jquery-1.10.2.js' type="text/javascript"></script>
	<script src=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/development-bundle/ui/jquery.ui.core.js'></script>
	<script src=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/development-bundle/ui/jquery.ui.widget.js'></script>
	<script src=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/development-bundle/ui/jquery.ui.datepicker.js'></script>
	<link rel="stylesheet" href=$_SERVER['DOCUMENT_ROOT'].'/home/datepicker/development-bundle/demos/demos.css'>
	<script>
		$(function() {
			$( "#from_date" ).datepicker({
				dateFormat: "yymmdd",
				defaultDate: "-30d",
				changeMonth: true,
				changeYear: true,
				numberOfMonths: 2,
				maxDate: "+0d",
				onClose: function( selectedDate ) {
					$( "#through_date" ).datepicker( "option", "minDate", selectedDate );
					}
			});
			$( "#through_date" ).datepicker({
				dateFormat: "yymmdd",
				defaultDate: "+0d",
				changeMonth: true,
				changeYear: true,
				numberOfMonths: 2,
				maxDate: "+0d",
				onClose: function( selectedDate ) {
					$( "#from_date" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
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
	<?php 
	include($_SERVER['DOCUMENT_ROOT'].'/includes/get_trans.php'); 
	?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
		<tr>
    		<td width="95"><div align="right"><label for='from_date'>From Date:</label></div></td>
    		<td width="171"><input type="text" id="from_date" name="from_date" /></td>
    	</tr>
    	<tr>
    		<td width="95"><div align="right"><label for='through_date'>Through Date:</label></div></td>
    		<td width="171"><input type="text" id="through_date" name="through_date" /></td>
    	</tr>
    	<tr>
    		<td>
    			<input name="submit_button" type="submit"  value=" Update "  id="update_button"  class="update_button"/>
			</td>
		</tr>
	</form>	
</body>
</html>