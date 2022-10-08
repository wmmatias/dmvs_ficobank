<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Email extends CI_Model {

    function creation_email($form_data)
    { 
        //form data
        $fullname = $this->security->xss_clean($form_data['fullname']);
        $to = $this->security->xss_clean($form_data['email']); 
        $loan = $this->security->xss_clean($form_data['typeofloan']);
        $documents = $this->security->xss_clean($form_data['typeofdocs']);
        $subject = $this->security->xss_clean('Your '. $loan.' has been approved');
        $from = $this->security->xss_clean('ficobank7@gmail.com');
        $body = 'test email';

        //server setup for mailing
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ficobank7@gmail.com';
        $mail->Password = 'mrtvrzwyleqskpka';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //compose email
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHtml(true);
        $mail->Body = '
            <p>'. $fullname .'</p>
            <h1>Hello World</h1>
        ';

        //condition checking if email sent
        return ($mail->send() ? 'Message sent' : 'Message not sent');
        
    }
}