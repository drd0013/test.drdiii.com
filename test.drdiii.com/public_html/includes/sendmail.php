<?php
$subject = 'Widgets Registation';
$message = 'Hello ' . (string)$email . ' and thank you for registering your Widgets account!';
$headers = 'From: noreply@drdiii.com' . "\r\n" .
	'Bcc: admin@drdiii.com' . "\r\n"  .
    'X-Mailer: PHP/' . phpversion();

mail($email, $subject, $message, $headers);
?>