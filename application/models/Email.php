<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Email extends CI_Model {

    function creation_document($user_details)
    { 
        $ln = $this->session->userdata('loan_type');
        $fullname = $this->security->xss_clean(ucwords(strtolower($this->session->userdata('fullname'))));
        $agent = $this->security->xss_clean($user_details['first_name']. ' '. $user_details['last_name']);
        $to = ($this->security->xss_clean($user_details['email'])); 
        $loan = $this->security->xss_clean($ln === '0' ? 'Agricultural Loan':($ln === '1' ? 'Commercial Loan':($ln === '2' ? 'Todo-Ani Loan':($ln === '3' ? 'Farm Machienery Loan': ''))));
        $subject = $this->security->xss_clean($fullname. ' ' . $loan.' has been added');
        $doc_num = $this->security->xss_clean($this->session->userdata('doc_num'));
        $from = $this->security->xss_clean('ficobank7@gmail.com');
        $body = '
        <p>Good day! '.$agent.',</p>
        <p>You added the document successfully</p>
        <p>Document No.: '. $doc_num .'</p>
        <p>Client Name: '. $fullname .'</p>
        <p>loan: '. $loan .'</p>
        </br>
        <p>keep this as your transaction receipt</p>
        </br>
        </br>
        <p>Regards,</p>
        <p><b>Ficobank Cauayan</b></p>
        </br>
        </br>
        <small><i>This email message (including attachments, if any) is intended for the use of the individual or the entity to whom it is addressed and may contain information that is privileged, proprietary, confidential and exempt from disclosure. If you are not an intended recipient of this e-mail, you are not authorized to duplicate, copy, retransmit, or redistribute it by any means. Please delete it and any attachments immediately and notify the sender that you have received it in error.</i></small>
        ';

        //server setup for mailing
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ficobank7@gmail.com';
        $mail->Password = 'yrxcvqehlksenkva';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //compose email
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHtml(true);
        $mail->Body = $body;

        //condition checking if email sent
        return ($mail->send() ? 'Message sent' : 'Message not sent');
        
    }

    function creation_account ($form_data)
    { 
        $year = date('Y');
        $password = 'Ficobank@'.$year;
        $fullname = $this->security->xss_clean($form_data['firstname']. ' '. $form_data['lastname']);
        $username = $this->security->xss_clean($form_data['username']);
        $to = $this->security->xss_clean($form_data['email']); 
        $subject = $this->security->xss_clean('Account Creation');
        $from = $this->security->xss_clean('ficobank7@gmail.com');
        $body = '
        <p>Good day! '.$fullname.',</p>
        <p>Your account has been created use this creadentials to <a href="http://dmvs-ficobank.local/">login</a> in your account</p>
        <p>Username:'. $username .'</p>
        <p>Password: '.$password.'</p>
        </br>
        <p>please change your password after your first login</p>
        </br>
        </br>
        <p>Regards,</p>
        <p><b>Ficobank Cauayan</b></p>
        </br>
        </br>
        <small><i>This email message (including attachments, if any) is intended for the use of the individual or the entity to whom it is addressed and may contain information that is privileged, proprietary, confidential and exempt from disclosure. If you are not an intended recipient of this e-mail, you are not authorized to duplicate, copy, retransmit, or redistribute it by any means. Please delete it and any attachments immediately and notify the sender that you have received it in error.</i></small>
        ';

        //server setup for mailing
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ficobank7@gmail.com';
        $mail->Password = 'yrxcvqehlksenkva';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //compose email
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHtml(true);
        $mail->Body = $body;

        //condition checking if email sent
        return ($mail->send() ? 'Message sent' : 'Message not sent');
        
    }

    
    function release_location ($form_data,$user_details)
    {   
        $location = '';
        if($form_data['location'] === '0'){
            $location = 'Offices';
        }
        elseif($form_data['location'] === '1'){
            $location = 'ROD';
        }
        elseif($form_data['location'] === '2'){
            $location = 'Treasury';
        }
        elseif($form_data['location'] === '3'){
            $location = 'LTO';
        }
        //form data
        $doc_number = $this->security->xss_clean($form_data['doc_number']);
        $fullname = $this->security->xss_clean($form_data['fullname']);
        $agent = $this->security->xss_clean($user_details['first_name']. ' '. $user_details['last_name']);
        $to = $this->security->xss_clean($user_details['email']); 
        $subject = $this->security->xss_clean('Document moved');
        $from = $this->security->xss_clean('ficobank7@gmail.com');
        $body = '
        <p>Good day! '.$agent.',</p>
        <p>You successfully released the following document in ' .$location.'</p>
        <p>Document number: '. $doc_number .'</p>
        <p>Applicant: '. $fullname .'</p>
        </br>
        <p>keep this as your transaction receipt</p>
        </br>
        </br>
        <p>Regards,</p>
        <p><b>Ficobank Cauayan</b></p>
        </br>
        </br>
        <small><i>This email message (including attachments, if any) is intended for the use of the individual or the entity to whom it is addressed and may contain information that is privileged, proprietary, confidential and exempt from disclosure. If you are not an intended recipient of this e-mail, you are not authorized to duplicate, copy, retransmit, or redistribute it by any means. Please delete it and any attachments immediately and notify the sender that you have received it in error.</i></small>
        ';

        //server setup for mailing
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ficobank7@gmail.com';
        $mail->Password = 'yrxcvqehlksenkva';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //compose email
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHtml(true);
        $mail->Body = $body;

        //condition checking if email sent
        return ($mail->send() ? 'Message sent' : 'Message not sent');
        
    }

    function add_location ($form_data,$user_details)
    {   
        $location = '';
        if($form_data['location'] === '1'){
            $location = 'Offices';
        }
        elseif($form_data['location'] === '2'){
            $location = 'ROD';
        }
        elseif($form_data['location'] === '3'){
            $location = 'Treasury';
        }
        elseif($form_data['location'] === '4'){
            $location = 'LTO';
        }
        $status = ($form_data['status'] ==='0' ? 'Recieve' : ($form_data['status'] ==='1' ? 'Release' : ($form_data['status'] ==='2' ? 'Deliver' :'')));
        $personnel = $form_data['recieved_by'];
        $doc_number = $this->security->xss_clean($form_data['doc_number']);
        $agent = $this->security->xss_clean($user_details['first_name']. ' '. $user_details['last_name']);
        $to = $this->security->xss_clean($user_details['email']); 
        $subject = $this->security->xss_clean('Document update');
        $from = $this->security->xss_clean('ficobank7@gmail.com');
        $body = '
        <p>Good day! '.$agent.',</p>
        <p>The document ' .$doc_number.' is '. $status.' by '.$personnel.' in '.$location.'</p>
        </br>
        <p>keep this as your transaction receipt</p>
        </br>
        </br>
        <p>Regards,</p>
        <p><b>Ficobank Cauayan</b></p>
        </br>
        </br>
        <small><i>This email message (including attachments, if any) is intended for the use of the individual or the entity to whom it is addressed and may contain information that is privileged, proprietary, confidential and exempt from disclosure. If you are not an intended recipient of this e-mail, you are not authorized to duplicate, copy, retransmit, or redistribute it by any means. Please delete it and any attachments immediately and notify the sender that you have received it in error.</i></small>
        ';

        //server setup for mailing
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ficobank7@gmail.com';
        $mail->Password = 'yrxcvqehlksenkva';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //compose email
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHtml(true);
        $mail->Body = $body;

        //condition checking if email sent
        return ($mail->send() ? 'Message sent' : 'Message not sent');
        
    }
}