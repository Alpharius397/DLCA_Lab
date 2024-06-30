<?php
// Returns stats of database and sets Session count,score,pLimit,sum and data(total user who performed this exp, average rating) for all experiments

   $sql = array("SELECT count(user) as u FROM `info`;","SELECT count(user) as u,sum(rating) as s FROM `logic` WHERE rating>0;",
   "SELECT count(user) as u,sum(rating) as s FROM `booth` WHERE rating>0;",
   "SELECT count(user) as u,sum(rating) as s FROM `res` WHERE rating>0;",
   "SELECT count(user) as u,sum(rating) as s FROM `non` WHERE rating>0;",
   "SELECT count(user) as u,sum(rating) as s FROM `encode` WHERE rating>0;",
   "SELECT count(user) as u,sum(rating) as s FROM `mux` WHERE rating>0;"); 

   $result = mysqli_query($conn, $sql[0]);
   
   if ($result && mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result); 
      $_SESSION['count'] = $row['u'];
   } 

   $avg_rate = 0;
   $score = array();
   $total = 0;

   for($i=0;$i<count($sql)-1;$i++){
      
      $result = mysqli_query($conn, $sql[$i+1]);
      if ($result && mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);
         
         if($row['s']==null){
            $row['s'] = "0";
         }

         array_push($score,array('count'=>(intval($row['u'])),'score'=>intval($row['s'])));

         $avg = $score[$i]['score']/max(1,$score[$i]['count']);

         $avg_rate += $avg;
         $total += $score[$i]['count'];
         $score[$i]['score'] = $avg;
         
      }
   } 


   $_SESSION['score'] = $score;
   $_SESSION['sum'] = round($avg_rate/(count($sql)-1));
   $_SESSION['pLimit'] = $total;
   
   $_SESSION['logic'] = $score[0]; 
   $_SESSION['booth'] = $score[1]; 
   $_SESSION['res'] = $score[2];
   $_SESSION['non'] = $score[3];
   $_SESSION['encode'] = $score[4];
   $_SESSION['mux'] = $score[5];
?>