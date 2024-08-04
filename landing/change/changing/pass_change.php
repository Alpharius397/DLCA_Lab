<?php
// handles password changes for both types and sends mail about the same
    session_start();

    function reroading($level){
        $path = '';

        for($i=0;$i<$level;$i++){
            $path .= '../';

        }

        return $path;
    }

    $level = 3;
    $path = reroading($level);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $who = $_POST['who'];

        if($who=='student'){
            include($path.'databaseinfo/main/database.php');
            $table = 'info';
            $idx=1;
        }

        else if($who=='admin'){
            include($path.'databaseinfo/main/admin.php');
            include($path.'databaseinfo/mail/mail_main.php');
            $table = 'admin';
            $idx=3;
        }
        else{
            header("Location: change.php?error=Some error have occurred!");
            exit();
        }

        $otp = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, "confirmPassword", FILTER_SANITIZE_SPECIAL_CHARS);
        $secret = password_hash($pass,PASSWORD_DEFAULT);
        $mail1 = $_SESSION['email'];

        if($otp==$_SESSION['OTP']){
            $sql = "UPDATE $table SET `password`='$secret' WHERE `email` = '$mail1'";
            $msg = "Your account ($who) with email $mail1 has it's password changed!";
            $to = $mail1;
            $sub = 'Password Change';

            $conn->begin_transaction();
            $conn->autocommit(false);

            try {
                mysqli_query($conn, $sql);
                unset($_SESSION['OTP']);
                unset($_SESSION['email']);

                if($who=='admin'){
                    writeMail($to,$msg,$sub);
                }

                $conn->commit();
                header("Location: ../../home.php?error1=Password Successfully Changed!&where=log&type=$who");
                exit();
            } 
            catch (mysqli_sql_exception $e) {
                $conn->rollback();
                header("Location: change.php?error=Some error have occurred!");
                exit();
            }
            catch(Exception $e){
                $conn->rollback();
                header("Location: ../home.php? error$idx=Some error have occured!&where=reg&type=$who");
                exit();
            }
        }

        else{
            header("Location: change.php? error=Incorrect OTP entered!");
            exit();
        }

    }

    mysqli_close($conn);
?>