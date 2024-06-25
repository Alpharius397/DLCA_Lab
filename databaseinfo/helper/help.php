<?php

function arrayJS($array){
    $comma = ",";
    $brac1 = array("[","]");
    $brac2 = array("{","}");
    echo "$brac1[0]";
    $res = array();
    for($i = 0; $i < count($array); $i++){

        $dic=array();
        foreach($array[$i] as $x=>$y){
            if(!(isset($array[$i][$x]))){
                $y="";
            }
            array_push($dic,"'$x':'$y'");
        }

        array_push($res,'{'.join($comma,$dic).'}');
        
    }

    echo join($comma,$res);

    echo "$brac1[1]";
}

function arrayLogic($array){
    $comma = ",";
    $brac1 = array("[","]");
    $brac2 = array("{","}");
    echo "$brac1[0]";
    $res = array();
    for($i = 0; $i < count($array); $i++){

        $dic=array();
        foreach($array[$i] as $x=>$y){
            if(!(isset($array[$i][$x]))){
                $y="";
            }
            if($x=='options'){
                $temp = array();
                foreach($y as $a){
                    array_push($temp,"'$a'");
                }
                $y = join($comma,$temp);
                array_push($dic,"'$x':[$y]");
            }
            else{
                array_push($dic,"'$x':'$y'");
            }
            
        }

        array_push($res,'{'.join($comma,$dic).'}');
        
    }

    echo join($comma,$res);

    echo "$brac1[1]";
}


?>