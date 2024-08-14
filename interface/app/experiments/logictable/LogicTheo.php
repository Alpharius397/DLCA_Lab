<?php 
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

   $level = 4;
   $path = reroading($level);

   include($path."databaseinfo/security/secure.php");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Experiment: Aim, Theory, and Procedure</title>
    <style>
   body {
    font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }


    .tab th,td {
        border: 0px solid #ccc;
        width: 10px;
    }



   
    header {
            display: flex;
            align-items: center;
            background-color: #971426; 
            width: 100%;
            padding: 20px;
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            height: 30px;
            z-index: 100;        } 
        .back-button{
            text-align: left;
            font-size: medium;
            margin-right: 50px;


        }
        header a{
            margin: 15px;
            color: #ffffff;
            text-decoration: none;
            
            padding: 5px;
            transition: all 0.4s;
        }
        a:hover{
           
            border-radius: 5px;
            font-size: 120%;
        } 
        main {
            margin: 0px auto;
            width: 80%;
          
            
        }

        section {
            margin-top: 30px;
        }

   
        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }
    

        #flowchart {
            text-align: left;
            flex-direction: column;
            align-items: flex-start;
        }

        #flowchart h2 {
            margin-bottom: 10px;
        }

        #flowchart img {
            max-width: 110%;
            padding-top: 20px;
            align-self: flex-start;
            margin-left: 13%;
        }
        
        .Dhruv{
            margin-top: 100px;
        }
        .Aryan{
            text-align: center;
        }

        #tab{
            border: 1px solid #333;
            padding: 10px;
            border-radius: 15px;
        }
        #tab th,td {
        border: 0px solid #ccc;
        width: 10px;
    }

    .a{
        display: flex;
    }

    .b{
        width: 30%;
    }

    .c{
        width: max-content;
        height: min-content;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 0px auto;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
            text-align: center;
            align-items: center;
            justify-items: center;

    }

        


    </style>
</head>
<body>
<header>
    <header class="Nav">
    <a href="../List.php" class="back-button">Back</a>
        <a href="LogicTheo.php">Theory</a>
        <a href="LogicTable.php" >Simulation</a>
        <a href="LogicEx.php" >Exercise</a>
        <a href="LogicQuiz.php" >Quiz</a>
    </header>
    </header>

    <main>
        <div class="Dhruv">
            <div class="Aryan">
                <h1>Experiment 1: Logic Gates and IC</h1> 
            </div> 
        <section id="aim">
            <h2>Aim</h2>
            <p>Logic gates are fundamental in digital systems, executing logical operations on binary inputs to produce binary outputs. Their aims include enabling basic computations, information processing, and circuit design. By adhering to Boolean algebra principles, they facilitate error detection and correction, forming the building blocks for complex systems through configurations of these elementary gates.
            </p>
        </section>

        <section id="theory">
            <h2>Theory</h2>
            <p>Logic gates are fundamental building blocks of digital circuits. They perform Boolean functions on one or more binary inputs to produce a single binary output based on certain logical conditions.The basic operation of each Logic Gate are:</p>
            <ol>
                <li><b>AND Gate:</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li>Output is '1' only if all inputs are '1'.</li>
                    <li>Boolean expression: Y = A AND B.</li>
                </ul>
           
                </div>
                 <div class="c"></div>
</div></li><br>
    <li><b>OR Gate:</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li>Output is '1' only if one of the inputs are '1'.</li>
                    <li>Boolean expression: Y = A OR B.</li>
                </ul>
                </div>
                 <div class="c">

    </div></div></li><br>
    <li><b>NOT Gate:</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li>Output is the inverse of the input.</li>
                    <li>Boolean expression: Y = NOT A.</li>
                </ul>
                
                </div>
                 <div class="c">
            </div>
        
        </div></li><br>
   <li><b>NOR Gate:</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li>Output is '0' only if any input is '1'.</li>
                    <li>Boolean expression: Y = NOT (A OR B).</li>
                </ul>
                
                </div>
                 <div class="c">
    </div></div></li><br>
    <li><b>XOR Gate</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li>Output is '1' if inputs differ (one '1', one '0').</li>
                    <li>Boolean expression: Y = A XOR B.</li>
                </ul>
                
                </div>
                 <div class="c">
    
    </div></div></li><br>
            </section>

</div>
<div>
    <script src="../../../../formula/Aryan.js"></script>
    <script>

        const c= document.querySelectorAll('.c');
        window.addEventListener('load', ()=>{
            randomGate(c);
        });

        <?php if(isset($_GET['error'])){$note = $_GET['error'];echo "alert('$note');";}?>
    </script>
</div>
    </main>
</body>
</html>