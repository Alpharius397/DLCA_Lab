<?php
// removes unnecessary get urls from search query

    session_start();
    function searchQuery(){
        $res = '';
        $query = ['found','which','how','email'];
        for($i=0;$i<count($query);$i++){
        
            if(isset($_GET[$query[$i]])){
                if($query[$i]!='found' && intval($_GET[$query[$i]])==-1){
                    continue;
                }

                else if($res!='' && $_GET[$query[$i]]!=''){
                    $res = $res.'&'.$query[$i].'='.$_GET[$query[$i]];
                }
                else if($_GET[$query[$i]]!=''){
                    $res = $res.$query[$i].'='.$_GET[$query[$i]];
                }
                
            }
        }

        if($res!=''){
            return $res."&";
        }
        else{
            return $res;
        }
        
    }

    $_SESSION['page'] = 0;
    $path = $_GET['path'];
    $sort = '';

    switch($path){
        case 'feed': $path = '../../admin/app/feedanalysis/review.php'; $what = 'feed';break;
        case 'logic': $path = '../../admin/app/logicquestion/logicq.php'; $what = 'logic';break;
        case 'req': $path = '../../admin/app/request/req.php'; $what = 'req'; break;
        case 'feed-admin':$path = '../../admin/app/feedpage/feed.php'; $what = 'feed'; break;
        case 'feed-student':$path = '../../interface/app/feedback/feedpage.php'; $what = 'feed'; break;
    }

    $ans = searchQuery();
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
        $sort = "sort=$sort&";
    }

    header("Location: $path?$ans"."$sort"."what=$what");
    exit();

?>