<?php
// fetches data for all users who registered for admin (Grandmaster) but were not inducted into admin(Grandmaster). Eg. Anakin Skywalker 

    $_SESSION['lim'] = 5;
    $lim = $_SESSION['lim'];

    $off = intval($_SESSION['page']);
    
    $sql = "SELECT name,user,email from newjoin order by user asc limit $lim offset $off;"; 
    $result = mysqli_query($conn, $sql);

    $studentdata = array();
    $i=0;
    while($row = $result->fetch_array()) { 
        array_push($studentdata,array( 
            "Username" => $row["user"], 
            "email" => $row["email"],
            "name" => $row["name"]
        ));
    } 

    $_SESSION['pLimit'] = count($studentdata);
    $_SESSION['data'] = $studentdata;


?>