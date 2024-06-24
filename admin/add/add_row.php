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

        $ques = $_POST['quest'];
        $opt1 = $_POST['o1'];
        $opt2 = $_POST['o2'];
        $opt3 = $_POST['o3'];
        $opt4 = $_POST['o4'];
        $ans = $_POST['new_ans'];

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