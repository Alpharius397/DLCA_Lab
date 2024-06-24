<?php
// Depends on pageLimit for session pLimit handles page option set

    $i=0;
    $limit = intval($_SESSION['pLimit']);

    while($i<$limit){
        $j = min($limit,$i+$_SESSION['lim']);
        $k=$i+1;
        echo "<option value=$i>$k - $j</option>";

        $i = min($limit,$i+$_SESSION['lim']);
    }
?>