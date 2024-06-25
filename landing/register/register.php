<?php
// handles the register of both types (students and admins).
    function reroading($level){
            $path = '';
    
            for($i=0;$i<$level;$i++){
                $path .= '../';
    
            }
    
            return $path;
        }
    
    $level = 2;
    $path = reroading($level);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $who = $_POST['who'];
        if($who=='student'){
            include($path.'databaseinfo/main/database.php');
            $table = 'info';
        }

        else if($who=='admin'){
            include($path.'databaseinfo/main/admin.php');
            include($path.'databaseinfo/mail/mail_main.php');
            $table = 'newjoin';
        }
        else{
            header("Location: ../home.php? error2=Some error have occured!&where=reg&type=$who");
        }


        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "create", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $secret = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO $table (`user`, `email` ,`password`,`name`)
                VALUE ('$username','$email','$secret','$name' )";

        $conn->begin_transaction();
        $conn->autocommit(false);

        try{
            mysqli_query($conn, $sql);

            if($who=='admin'){
                $to = $email;
                $msg = "Thank you for registering as an admin. Your details have been successfully received."."<br>"."Our team will review your information, and we will notify you once the verification process is complete. <br> Your username: $username, Email: $email";
                $sub = 'Registration Confirmation';
                writeMail($to,$msg,$sub);
            }
            $conn->commit();
            header("Location: ../home.php? error2=You have registered successfully!&where=reg&type=$who");
            exit();
            
        }
        catch(mysqli_sql_exception){
            $conn->rollback();
            header("Location: ../home.php? error2=That username is already taken!&where=reg&type=$who");
            exit();
        }
        catch(Exception $e){
            $conn->rollback();
            header("Location: ../home.php? error2=Some error have occured!&where=reg&type=$who");
            exit();
        }
    }

?>