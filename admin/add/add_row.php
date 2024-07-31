<?php 
// adds new logical question into database
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

        $ques =  mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'quest', FILTER_SANITIZE_SPECIAL_CHARS));
        $opt1 = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'o1', FILTER_SANITIZE_SPECIAL_CHARS));
        $opt2 = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'o2', FILTER_SANITIZE_SPECIAL_CHARS));
        $opt3 = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'o3', FILTER_SANITIZE_SPECIAL_CHARS));
        $opt4 = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'o4', FILTER_SANITIZE_SPECIAL_CHARS));
        $ans = mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'new_ans', FILTER_SANITIZE_SPECIAL_CHARS));

        $sql = "INSERT INTO `questions`(`user`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ('$ques','$opt1','$opt2','$opt3','$opt4','$ans')";

        try{
            $result = mysqli_query($conn,$sql);
            header('Location: ../app/logicquestion/logicq.php?note=Record Added!');
            exit();
        }

        catch(mysqli_sql_exception $e){
            header('Location: ../app/logicquestion/logicq.php?note=Error Occured!');
           exit();
        }
    }

    mysqli_close($conn);
        
?>