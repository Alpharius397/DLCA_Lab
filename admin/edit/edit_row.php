<?php 
// edits editable records cause we are aligned with [REDACTED] and [REDACTED]. signed by: Inquisitorial Insignia =][=
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

        $path = $_POST['path'];

        if(isset($_POST['username']) && isset($_POST["exp"]) && isset($_POST['rating']) && isset($_POST['feed'])){
            $user = $_POST['username'];
            $exp = $_POST["exp"];
            $rating = $_POST['rating'];
            $feed = $_POST['feed'];

            switch($exp){
                case 'Logic Gates and IC': $table='logic';break;
                case "Booth's Algorithm": $table = 'booth';break;
                case 'Restoring Division Algorithm': $table = 'res';break;
                case 'Non-Restoring Division Algorithm': $table = 'non';break;
                case 'Encoder and Decoder': $table = 'encode';break;
            }

            $sql = "UPDATE $table set rating='$rating',feedback='$feed',time=(select curdate()) where user='$user'";

        }

        if(isset($_POST['ques']) && isset($_POST['index']) &&  isset($_POST['opt1']) && isset($_POST['opt2']) && isset($_POST['opt3']) && isset($_POST['opt4']) &&isset($_POST['ans'])){
           
            $ques = $_POST['ques'];
            $index = $_POST['index'];
            $opt1 = $_POST['opt1'];
            $opt2 = $_POST['opt2'];
            $opt3 = $_POST['opt3'];
            $opt4 = $_POST['opt4'];
            $ans = $_POST['ans'];
    
            $sql = "UPDATE questions set user='$ques', option1='$opt1', option2='$opt2', option3='$opt3', option4='$opt4',answer='$ans' where id='$index'";
        }

        switch($path){
            case 'review': $path = 'feedanalysis/'.$path;break;
            case 'logicq': $path = 'logicquestion/'.$path;break;
        }

        try{
            $result = mysqli_query($conn,$sql);
            header("Location: ../app/$path.php?note=Record Changed!");
            exit();
        }

        catch(mysqli_sql_exception $e){
            header("Location: ../app/$path.php?note=Error Occured!");
            exit();
        }
    }

    mysqli_close($conn);
        
?>