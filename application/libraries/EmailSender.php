<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
	public static function sendEmail($to, $subject, $body) {
		$mail = new PHPMailer(true);
		try {
			$mail->isSMTP();
			$mail->Host = 'mail.focuspublicidade.com.br';
			$mail->SMTPAuth = true;
			$mail->Username = 'dispara-email-site@focuspublicidade.com.br';
			$mail->Password = 'u_3LVp6E?!j#';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			$mail->setFrom('dispara-email-site@focuspublicidade.com.br', 'Agenda Médica ON');
			$mail->addAddress($to);
			
			$mail->isHTML(true);
			$mail->CharSet = 'UTF-8'; 
			$mail->Subject = $subject;
			$mail->Body = $body;

			$mail->send();
		} catch (Exception $e) {
			error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
		}
	}
}
