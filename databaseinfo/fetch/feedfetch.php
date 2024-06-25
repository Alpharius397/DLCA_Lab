<?php
// Sets Session lim and puts user data for their exp inside data.json

    $_SESSION['lim'] = 5;
    $lim = $_SESSION['lim'];

    $off = intval($_SESSION['page']);
    $sql = "SELECT * from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where comb.rating>0 order by comb.time desc limit $lim offset $off;"; 
    $result = mysqli_query($conn, $sql);

    $studentdata = array();
    while($row = $result->fetch_array()) { 
        array_push($studentdata, array( 
            "Username" => $row["user"], 
            "feed" => $row["feedback"],
            "rating" => $row["rating"],
            "exp" => $row['exp']
        ));
    } 
    
    $_SESSION['data'] = $studentdata;

?>