<?php
// auto kick
 if(!(isset($_SESSION['user']))){

        $path = reroading($level).'landing/home.php';
        $_SESSION = array();
        header("Location: $path?error1=Unauthorized Entry!&where=log&type=student");
        session_abort();
    }

?>