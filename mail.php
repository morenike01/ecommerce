<?php
require 'PHPMailer/PHPMailerAutoload.php';

class mailSender{
function mail($email,$message,$header){
	// if(isset($_REQUEST['email']) && isset($_REQUEST['message']) && isset($_REQUEST['header'])){
	// 	$email=$_REQUEST['email'];
	// 	$message=$_REQUEST['message'];
	// 	$header=$_REQUEST['header'];
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'margaret.ayodele@ashesi.edu.gh';                 // SMTP username
	$mail->Password = 'caprilove30';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('margaret.ayodele@ashesi.edu.gh', 'Ayodele');
	$mail->addAddress($email, 'Margaret');     // Add a recipient

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = $header;
	$mail->Body    = $message;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->SMTPOptions = array(
	    'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
	    )
	);

	if(!$mail->send()) {
	    echo 0;
	    // echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 1;
	}
}
}

?>