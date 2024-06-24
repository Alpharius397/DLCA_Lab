<?php
// connects to student database
    $db_server="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="labrats";
    $conn="";

    try{
        $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }

    catch(mysqli_sql_exception){
        echo "No connection";
    }
?>

