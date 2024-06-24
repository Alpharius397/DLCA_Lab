<?php 
// promotes new joinee to admin.
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

    $path = reroading(2);
    include($path.'databaseinfo/main/admin.php');
    include($path.'databaseinfo/mail/mail_main.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $admin = $_POST['admin'];
        
        $sql = "SELECT count(user) as c from admin where user='$admin' or email=(SELECT email FROM newjoin where user='$admin')";
        $conn->begin_transaction();
        $conn->autocommit(false);

        try{
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_array();

            if($row['c']>0){
                header('Location: ../app/request/req.php?note=Username or Email already exists!');
                exit();
            }

            $sql = "SELECT name,password,email FROM newjoin where user='$admin'";
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_array();

            $email = $row['email'];
            $pass = $row['password'];
            $name = $row['name'];

            $sql1 = "INSERT INTO admin(`user`,`name`,`email`,`password`) value ('$admin','$name','$email','$pass');";
            $sql2 = "DELETE FROM newjoin where `user`='$admin';";
            $result1 = mysqli_query($conn,$sql1);
            $result2 = mysqli_query($conn,$sql2);

            $conn->commit();
            $to = $email;
            $msg = "You (username: $admin) have been successfully added as an admin. <br> Congratulation on joining the team!";
            $sub = 'Request Accepted';
            writeMail($to,$msg,$sub);

           header('Location: ../app/request/req.php?note=Record Added!');
           exit();
        }

        catch(mysqli_sql_exception $e){
            $conn->rollback();
           header('Location: ../app/request/req.php?note=Error Occured!');
           exit();
        }

        catch(Exception $e){
            $conn->rollback();
            var_dump($e);
            header('Location: ../app/request/req.php?note=Mail cannot be send');
            exit();
        }
    }
    $conn->autocommit(true);
    mysqli_close($conn);
        


?>