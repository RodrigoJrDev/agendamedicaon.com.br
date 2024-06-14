<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender {
	public static function sendEmail($to, $subject, $body) {
		$mail = new PHPMailer(true);
		try {
			$mail->isSMTP();
			$mail->Host = 'mail.agendamedicaon.com.br';
			$mail->SMTPAuth = true;
			$mail->Username = 'sistema@agendamedicaon.com.br';
			$mail->Password = 'Kcpkk^clpmQ~';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			$mail->setFrom('sistema@agendamedicaon.com.br', 'Agenda Médica ON');
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
