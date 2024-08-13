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

    function writeMail($to,$msg,$sub){

        $success = mail($to,$sub,$msg);
        return $success;
    }

?>