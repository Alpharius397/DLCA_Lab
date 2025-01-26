<?php
// mails the user for confirmation of registration for admin.
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

    include($path.'databaseinfo/mail/mail_main.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $who = $_POST['who'];
        if($who=='student'){
            include($path.'databaseinfo/main/database.php');
            $table = 'info';
        }

        else if($who=='admin'){
            include($path.'databaseinfo/main/admin.php');
            $table = 'admin';
        }
        else{
            header("Location: ../entry/entry.php?error=Some error occured! Please try again");
        }

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS); 

        $sql = "SELECT user,email FROM $table WHERE email = '$email'";
        try{
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $user = $row['user'];

        }
        catch (Exception $e) {
            header("Location: ../entry/entry.php?error=Some error occured! Please try again.&type=$who");
            exit();
        }

        if ($result && mysqli_num_rows($result) > 0) {      

            try {

                $otp = rand(100000,999999);
                $subject = 'Password change';
                $message = "Test: Your ($who) DLCA Virtual Lab's OTP for username $user is $otp";

                $_SESSION['OTP'] = $otp;
                $_SESSION['email'] = $email;

                writeMail($email,$message,$subject);
                
                header("Location: ../changing/change.php?type=$who");
                
            } 
                
            catch (Exception $e) {
                header("Location: ../entry/entry.php? error= Some error occured! Please try again.&type=$who");
                exit();
            }
        
        }

        else {
            header("Location: ../entry/entry.php? error= Email ID is not registered!&type=$who");
            exit();
        }

        mysqli_close($conn);

        
    }

?>
