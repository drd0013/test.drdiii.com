<?php
$subject = 'Widgets Registation';
$message = 'Hello ' . (string)$esc_email . ' and thank you for registering your Widgets account!';
$headers = 'From: noreply@drdiii.com' . "\r\n" .
	'Bcc: admin@drdiii.com' . "\r\n"  .
    'X-Mailer: PHP/' . phpversion();

mail($esc_email, $subject, $message, $headers);
?>