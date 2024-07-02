<?php
// handles the data search for all pages (admin: feedback analysis,induction,logic question) and stores them into corresponding json, cause I like complex code :)
    function querymake($path){
        $res = '';
        $query = ['found','which','how','email'];
        $count = array();
        for($i=0;$i<count($query);$i++){
            if(isset($_GET[$query[$i]])){

            switch($query[$i]){
                case 'found': 
                    $temp = strtolower($_GET['found']); 
                    $res = "lower(comb.user) like '%$temp%'";              
                    break;

                case 'which': $temp = intval($_GET['which']); $res = " comb.exp = $temp"; break;

                case 'how': 
                    $temp = intval($_GET['how']);

                    if($temp<12){
                        $gap = $temp+2; 
                    }
                    else{ 
                        $gap = $temp+3;
                    }
                                
                    $res = "comb.rating between $temp and $gap"; break;
                
                case 'email': 
                    $temp = strtolower($_GET['email']);
                    $res = "lower(comb.email) like '%$temp%'";
                    break;
                }

                array_push($count,$res);

            }

        }

        $req = join(" and ",$count);

        if($path=='feed' && count($count)>0){
            $req = " and ".$req;
        }

        return $req;
    }

    $path = $_GET['what'];
    
    $_SESSION['lim'] = 5;
    $lim = $_SESSION['lim'];
    $off = intval($_SESSION['page']);
    $query = querymake($path);

    if(isset($_GET['sort']) && intval($_GET['sort'])==1){
        $sort='desc';
    }
    else{
        $sort='asc';
    }

    switch($path){
        case 'feed': $sql = array("SELECT count(comb.user) as c from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query);",
                    "SELECT * from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query) order by comb.time $sort limit $lim offset $off;");
                    $route = 'feedanalysis/review.php'; break;

        case 'logic': $sql = array("SELECT count(id) as c from questions as comb where $query;","SELECT * from questions as comb where $query order by id asc limit $lim offset $off;"); 
                    $route = 'logicquestion/logicq.php';break;

        case 'req': $sql = array("SELECT count(user) as c from newjoin as comb where $query","SELECT user,email from newjoin as comb where $query");
                    $route = 'request/req.php';break;

        case 'feed-admin': $sql = array("SELECT count(comb.user) as c from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query);",
                    "SELECT * from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query) order by comb.time $sort limit $lim offset $off;");
                    $route = 'feedpage/review.php'; break;

        case 'feed-student': $sql = array("SELECT count(comb.user) as c from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query);",
                    "SELECT * from (SELECT * FROM logic UNION ALL SELECT * FROM booth UNION ALL SELECT * FROM non UNION ALL SELECT * FROM res UNION ALL SELECT * FROM encode UNION ALL SELECT * FROM mux) as comb where (comb.rating>0 $query) order by comb.time $sort limit $lim offset $off;");
                    $route = '../../interface/app/feedback/feedpage.php'; break;
    }

    try{
        $result = mysqli_query($conn, $sql[0]);

        $row = $result->fetch_array();
        $_SESSION['pLimit'] = $row['c'];

        if($row['c']>0){
            $result = mysqli_query($conn, $sql[1]);
    
            $fetchdata = array();
            while($row = $result->fetch_array()) { 
                switch($path){
                    case 'feed': array_push($fetchdata,array( 
                        "Username" => $row["user"], 
                        "feed" => $row["feedback"],
                        "rating" => $row["rating"],
                        "exp" => $row['exp']
                    )); break;
                    
                    case 'logic': array_push($fetchdata,array( 
                        "index" => $row['id'],
                        "Question" => $row["user"], 
                        "options" => array($row["option1"],$row["option2"],$row["option3"],$row["option4"]),
                        "ans" => $row["answer"]
                    )); break;

                    case 'req': array_push($fetchdata,array( 
                        "Username" => $row["user"], 
                        "email" => $row["email"]
                    ));
                }
            }
            
            $_SESSION['data'] = $fetchdata;

            $_SESSION['note'] = true;
        }
    
        else{
            $_SESSION['note'] = false;
        }

    }
    catch(mysqli_sql_exception $e){
       header("Location: ../$route?note=Some Error Occured");
        exit();
    }
?>