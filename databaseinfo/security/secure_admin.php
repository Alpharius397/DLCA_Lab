<?php
// auto kick
 if(!(isset($_SESSION['admin']))){

        $path = reroading($level).'landing/home.php';
        $_SESSION = array();
        header("Location: $path?error1=Unauthorized Entry!&where=log&type=admin");
        session_abort();
    }

?>