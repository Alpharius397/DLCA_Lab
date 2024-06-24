<?php 
// handles deleting stuff from pages that have that operation, cause ChatGPT: Sure, here's a humorous way to handle the deletion operation in a web application, incorporating a joke ->When it comes to handling the deletion of items from a page, it's crucial to ensure that the operation is smooth and that the user is confident about their actions. Here's a standard approach to implementing the delete functionality, with a touch of humor. 


   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

    $path = reroading(2);
    include($path.'databaseinfo/main/database.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST["index"])){
            $index = $_POST["index"];
            $sql = "DELETE FROM questions where id='$index'";
        }


        if(isset($_POST["user"]) && isset($_POST["exp"])){
            $user = $_POST["user"];
            $exp = $_POST["exp"];

            switch($exp){
                case '0': $table = 'logic';break;
                case '1': $table = 'booth';break;
                case '2': $table = 'res';break;
                case '3': $table = 'non';break;
            }

            $sql = "DELETE FROM $table where user='$user'";
        }

        if(isset($_POST['admin'])){
            include($path.'databaseinfo/main/admin.php');

            $user = $_POST["admin"];
            $email = $_POST['mail'];
            $sql = "DELETE from newjoin where user='$user'";
        }
        
        $_SESSION['page'] = 0;

        $pathApp = $_POST['path'];

        switch($pathApp){
            case 'review': $pathApp = 'feedanalysis/'.$pathApp;break;
            case 'logicq': $pathApp = 'logicquestion/'.$pathApp;break;
            case 'req': $pathApp = 'request/'.$pathApp;break;
        }

        $conn->begin_transaction();
        $conn->autocommit(false);

        try{
            $result = mysqli_query($conn, $sql);
            include($path.'databaseinfo/mail/mail_main.php');

            if(isset($_POST['admin'])){
                $to = $email;
                $msg = "You have been denied the title of Admin. <br> Now sit down user $user.";
                $sub = 'Request Denied';
                writeMail($to,$msg,$sub);

            }
            $conn->commit();
            header("Location: ../app/$pathApp.php?note=Record Deleted!");
            exit();

        }

        catch(mysqli_sql_exception $e){
            $conn->rollback();
            header("Location: ../app/$pathApp.php?note=Some error occured!");
            exit();
        }

        catch(Exception $e){
            $conn->rollback();
            header("Location: ../app/$pathApp.php?note=Record Deleted, but mail cannot be send!");
            exit();
        }

    }
?>