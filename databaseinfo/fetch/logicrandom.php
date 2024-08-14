<?php
// fetches 5 random questions from database and stores them answer.json
    function check($array,$val) {
        for($i=0;$i<count($array);$i++){
            if($array[$i]==$val){
                return true;
            }
        }
        return false;  
    }

    $main = array();
    $pool = array();

    $sql = "SELECT id FROM questions"; 
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0){
        while($row = $result->fetch_array()){
            array_push($pool,$row['id']);
        }
    } 

    if(count($pool)<5){
        header('Location: LogicTheo.php?error=No questions found! Please ask admin to add questions.');
    }

    $limit = count($pool)-1;
    while(count($main) < 5){
        $rand = rand(0,$limit);
        $res = check($main,$pool[$rand]);

        while($res){
            $rand = rand(1,$limit);
            $res = check($main,$pool[$rand]);
        }

        array_push($main,$pool[$rand]);
    }

    $a = $main[0];
    $b = $main[1];
    $c = $main[2];
    $d = $main[3];
    $e = $main[4];

    $sql = "SELECT id,user,option1,option2,option3,option4,answer FROM questions WHERE id in ('$a','$b','$c','$d','$e'); "; 
    $result = mysqli_query($conn, $sql);

    $questiondata = array();

    while($row = $result->fetch_array()) { 

        array_push($questiondata,array( 
            "index" => $row['id'],
            "Question" => $row["user"], 
            "options" => array($row["option1"],$row["option2"],$row["option3"],$row["option4"]),
            "ans" => $row["answer"]
        ));
            
    } 

    $_SESSION['data'] = $questiondata;

?>