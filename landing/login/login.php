<?php
// handles the login of both types (students and admins).

    session_start();
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
            $path = '../../interface/main/VLab.php';
            $idx=1;
        }

        else if($who=='admin'){
            include($path.'databaseinfo/main/admin.php');
            include($path.'databaseinfo/mail/mail_main.php');
            $table = 'admin';
            $path = '../../admin/main/interface.php';
            $idx=3;
        }
        else{
            header("Location: ../home.php?error1= User not found!&where=log&type=student");
            exit();
        }

        $username = $_POST["user"];
        $password = $_POST["pass"];

        $username = mysqli_real_escape_string($conn, $username); 
        $password = mysqli_real_escape_string($conn, $password); 

        $sql = "SELECT * FROM $table WHERE user = '$username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row_user = mysqli_fetch_assoc($result);
                

            if ($row_user['user'] === $username && password_verify($password, $row_user['password'])) {
                
                $_SESSION['user'] = $row_user['user'];
                $_SESSION['name'] = $row_user['name'];
                $_SESSION['email'] = $row_user['email'];

                header("Location: $path");
                exit();
                
            } 
            else if ($row_user['user'] === $username || password_verify($password, $row_user['password'])){
                header("Location: ../home.php?error$idx=Incorrect Username or Password!&where=log&type=$who");
                exit();
            }
        }

        else {
            header("Location: ../home.php?error$idx= User not found!&where=log&type=$who");
            exit();
        }

    }
    mysqli_close($conn);

?>