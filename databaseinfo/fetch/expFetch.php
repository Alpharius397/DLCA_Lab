<?php
// fetch the data of all experiments and order them in 4 ranges: 3-5,6-8,9-11,12-15 ratings, stores result in $_SESSION

    $table = array('logic','booth','res','non','encode','mux');
    $value = array(3,5,6,8,9,11,12,15);
    $dict = array();

    for($i=0;$i<count($table);$i++){

        $temp1 = $table[$i];
        $res = array();

        for($j=0;$j<count($value);$j+=2){
            
            $temp2 = $value[$j];
            $temp3 = $value[$j+1];

            $sql = "SELECT count(user) as c from $temp1 where rating between $temp2 and $temp3 and rating>0;";

            try{
                $result = mysqli_query($conn, $sql);
                $row = $result->fetch_array();
                array_push($res,$row['c']);
            }

            catch(mysqli_sql_exception){
                header("Location: analysis.php?note=Some error occured!");
            }
        }

        array_push($dict,$res);

    }

    $_SESSION['expRate'] = $dict;

?>