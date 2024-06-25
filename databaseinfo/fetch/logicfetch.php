<?php
// Sets Session lim and puts logical question/answer data inside answer.json

    $_SESSION['lim'] = 5;
    $lim = $_SESSION['lim'];

    $off = intval($_SESSION['page']);
    $sql = "SELECT * from questions order by id asc limit $lim offset $off;"; 
    $result = mysqli_query($conn, $sql);

    $questiondata =array();
    while($row = $result->fetch_array()) { 
        array_push($questiondata, array( 
            "index" => $row['id'],
            "Question" => $row["user"], 
            "options" => array($row["option1"],$row["option2"],$row["option3"],$row["option4"]),
            "ans" => $row["answer"]
        ));
    } 

    $sql = 'select count(id) as id from questions';
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result)>0){
        $row = $result->fetch_array();
        $_SESSION['pLimit'] = $row['id'];
    }
    
    $_SESSION['data'] = $questiondata;


?>