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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("../../../../images/background/red3.jpg") no-repeat center center fixed;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main {
            margin-top: 100px;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        #container {
            width: 80%;
            margin: 10px auto;
            margin-left: 10px;
            margin-right: 10px;
            padding: 50px;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            text-align: center;
            align-self: center;
            justify-self: center;
        }
    


       
        h1 {
            color: #971426;
        }
        label {
            font-size: 16px;
            color: #333;
            margin-right: 10px;
        }

        input[type="number"] {
            width: 40px;
            padding: 6px;
            font-size: 16px;
           border: 3px solid  #454242a9;
            border-radius: 4px;
            color: #333;
        }

        select {
            font-size: 16px;
            padding: 8px;
           border: 3px solid  #454242a9;
            border-radius: 4px;
            color: #333;
        }

        #submit, #nextQuestion {
            font-size: 16px;
            margin-top: 10px;
            margin-right: 10px;
            padding: 8px 16px;
            background-color: #0074d9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #truthTable {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #truthTable th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            background-color: #333;
            color: #fff;
        }

        #table1 td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }


        #truthtable tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        .gate {
            width: 100px;
            height: 100px;
            background-color: #e0e0e0;
            border: 2px solid #333;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        
    #sim table{
        height: 100px;
    }

    #tab th,td {
        border: 0px solid #ccc;
        width: 10px;
        background-color: rgba(255, 255, 255, 0);
    }


    .T{
        display: flex;
        margin: 20px auto;
        margin-left: 0px;
        user-select: none;
        justify-content: center;
        align-items: center;
    }
    #sim{
        width: max-content;
        height: min-content;
        display: none;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 0px auto;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
        overflow-y: scroll;
            overflow-x: scroll;
            text-align: center;
            align-items: center;
            justify-items: center;
            scrollbar-width:thin;
    }

        .incorrect {
            color: red;
        }

        .correct{
            color: green;
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
            z-index: 100;        
        } 
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
            margin-top: 100px;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .tab1{
            display: none;
            height:300px;
            margin-top: 20px;
            margin-bottom: 10px;
            width: 100%;
            overflow: hidden;
            overflow-y: scroll;
            overflow-x: scroll;
            text-align: center;
            align-items: center;
            justify-items: center;
            scrollbar-width:thin;
            border: 1px solid #CCC;
        }

        #sim{
        width: max-content;
        height: min-content;
        display: none;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 0px auto;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
        overflow-y: scroll;
            overflow-x: scroll;
            text-align: center;
            align-items: center;
            justify-items: center;
            scrollbar-width:thin;
    }

    #ta{
        align-items: center;
        display: none;
        padding-left: -10px;
        width: min-content;
        
    }

    #ta table{
        border: 1px solid #CCC;
    }

    input[type="number"], select {
        margin: 5px auto;
        margin-bottom: 10px;
    }

    #result{
            display: flex;
            margin: 5px auto;
            justify-content:space-evenly;
        }

        #result p{
            display: inline-block;
            margin: 5px;
            font-size: 16px;
        }

        #wrong{
            color: #971426;
        }

        #correct{
            color: #00904a;
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
    <div id="container">
        <h1>Logic Gates Exercise</h1>
        <div style="display:inline-flex;">
        <div style="display:inline-block;margin:5px">
        <label for="inputA">Input A:</label>
        <input type="number" id="inputA" min="0" max="1" disabled>
        </div>
        <div style="display:inline-block;margin:5px">
        <label for="inputB">Input B:</label>
        <input type="number" id="inputB" min="0" max="1" disabled>
        </div>
        <div style="display:inline-block;margin:5px">
        <label for="gateSelector">Given Gate:</label>
        <select id="gateSelector" disabled="True">
                <option value="AND Gate">AND Gate</option>
                <option value="OR Gate">OR Gate</option>
                <option value="NOT Gate">NOT Gate</option>
                <option value="NOR Gate">NOR Gate</option>
                <option value="XOR Gate">XOR Gate</option>
                <option value="XNOR Gate">XNOR Gate</option>
                <option value="NAND Gate">NAND Gate</option>
        </select>
        </div>
    </div>
        <div style="display:inline-block;margin-top:10px;">
        <label for="output">Calculated Output:</label>
        <select id="output">
            <option value=1>1</option>
            <option value=0>0</option>
        </select>
        </div><br>

        <button id="submit">Submit</button>
        <button id="nextQuestion">Restart Attempt</button>
    <div class="tab1">
        <table id="truthTable">
            <thead>
                <tr>
                    <th>Input A</th>
                    <th>Input B</th>
                    <th>Gate</th>
                    <th>Output</th>
                    <th>Your Output</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="table1"></tbody>
        </table>
    </div>
        <div class = "T">
    <div id ="sim"></div>
    <div id ="ta">
        <table style="border: 1px solid black;padding:1px;margin:0px">
            <tr>

                <th style="color:#00904a;padding: 5px;">Green</th>
                <th style="color:#00904a;padding: 5px;">1</th>
            </tr>
            <tr >
                <th style="color:red;padding: 5px;">Red</th>
                <th style="color:red;padding: 5px;">0</th>
            </tr>
        </table>
    
    </div>

    </div>
    <div id = "result">
            <p id="total" class="remark">Total Attempts: <b id="tot">0</b></p>
            <p id="correct" class="remark">Correctly Answered: <b id="corr">0</b></p>
            <p id="wrong" class="remark">Incorrectly Answered: <b id="wro">0</b></p>
        </div>

      <script src="../../../../formula/Aryan.js"></script>
        <script>

            const sub = document.getElementById('submit');
            const next = document.getElementById('nextQuestion');
            const sim = document.getElementById('sim');
            const ta =document.getElementById("ta");
            var stats = {'correct':0,'wrong':0,'total':0};
            var attempts = {'correct':document.getElementById('corr'),'wrong':document.getElementById('wro'),'total':document.getElementById('tot')}

            window.addEventListener("load", async ()=>{ generateRandomValues(false,sim);});

            sub.addEventListener('click',async () =>{

                buttondisabled(sub);
                buttondisabled(next);
                checkAnswer(sim);
                logicCount(false);
                await sleep(1000);

                buttonEnBlu(sub);
                buttonEnBlu(next);
            });
            
            next.addEventListener('click', async()=>{
                buttondisabled(sub);
                buttondisabled(next);
                generateRandomValues(true,sim);
                stats = {'correct':0,'wrong':0,'total':0};
                logicCount(true);

                await sleep(1000);

                buttonEnBlu(sub);
                buttonEnBlu(next);
                
                });
            
            
        </script>
    </div>
    </main>
</body>
</html>