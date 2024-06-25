<?php

// Handles student feedback for all 5 experiments cause why not
    session_start();

    include('../../databaseinfo/main/database.php');

    function route($exp){
        $expfeed = $exp.'feed';
        switch($exp){
            case 'logic': $path = "../../interface/app/experiments/logictable/$expfeed.php";break;
            case 'booth': $path = "../../interface/app/experiments/booth/$expfeed.php";break;
            case 'res': $path = "../../interface/app/experiments/restoring/$expfeed.php";break;
            case 'non':$path = "../../interface/app/experiments/nonrestoring/$expfeed.php";break;
            case 'encode':$path = "../../interface/app/experiments/encode/$expfeed.php";break;
            case 'mux':$path = "../../interface/app/experiments/mux/$expfeed.php";break;
        }

        return $path;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_SESSION['user'];
        $exp = $_SESSION['exp'];
        $feed = filter_input(INPUT_POST, "feedback", FILTER_SANITIZE_SPECIAL_CHARS);
        $q1 = $_POST['q1'];
        $q2 = $_POST['q2'];
        $q3 = $_POST['q3'];
        $rating = $q1+$q2+$q3;

        $path = route($exp);

        try {
            $sql = "INSERT INTO $exp (user,rating,feedback) values ('$username','$rating','$feed');" ;
            $result = mysqli_query($conn, $sql);
           header("Location: $path?error=Feedback Sumbitted!");
        } 
        catch (mysqli_sql_exception $e) {

            try{
                $sql = "UPDATE $exp SET rating = '$rating', feedback = '$feed', time = (select curdate()) WHERE user = '$username';";
                $result = mysqli_query($conn, $sql);
                header("Location: $path?error=Feedback Sumbitted!");

            }
            catch (mysqli_sql_exception $e){
                header("Location: $path?error=Some error have occurred!");
                
            }
        }

    }
    exit();

?>