<?php
// allows user to mail and simply calling the function and including this (mail folder)

    if (!class_exists('PHPMailer\PHPMailer\Exception')){
        require $path."databaseinfo/mail/PHPMailer/src/Exception.php";
    }


    if (!class_exists('PHPMailer\PHPMailer\PHPMailer')){
        require $path.'databaseinfo/mail/PHPMailer/src/PHPMailer.php';
    }

    if (!class_exists('PHPMailer\PHPMailer\SMTP')){
        require $path.'databaseinfo/mail/PHPMailer/src/SMTP.php';
    }

    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // using mail()
    function writeMail($to,$msg,$sub){
        $headers['Content-type'] = 'text/html; charset=iso-8859-1';
        $success = mail($to,$sub,$msg,$headers);
        return $success;
    }


/*    
    //using php mailer

    function writeMail($to,$msg,$sub){

        $mail = new PHPMailer(true);
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'rajjm397@gmail.com';                    
        $mail->Password   = 'pqpdhxnvautwxvoh';                              
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;                                  

        $mail->setFrom('rajjm397@gmail.com');
        $mail->addAddress($to);     

        $mail->isHTML(true);                                
        $mail->Subject = $sub;
        $mail->Body    = $msg;

        $mail->send();

    }
*/
?>