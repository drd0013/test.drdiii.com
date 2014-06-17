<?php
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Widget Account Management</title>
 </head>
<body>
Welcome 
<?php
echo $_SESSION['email'] . ' ' . $_SESSION['cust_id'];
?>
 to your account management for Widgets Incorporated!<br>
Please select what you would like to do: <br>
<a href="./trans.php">Look at my transaction history and balance</a><br>
<a href="./pay_balance.php">Pay my Widgets Bill</a><br>
<a href="./manage.php">Manage my online account</a><br>
</body>
</html>
