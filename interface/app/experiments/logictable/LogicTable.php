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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <title></title>

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
    
    .Q{
        display: inline-flex;
        align-items: center;
    }
    
    .Q #first, #second{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        height: 30px;
            z-index: 100;        width: 50px;
        text-align: center;
    }
    
    .Q p{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
    }
    
    #reset {
        font-size: 16px;
        padding: 8px 16px;
        background-color: #0074d9;
        color: #fff;
        border: none;
        height: 80%;
        padding-top: 10px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 24px;
        margin-bottom: 16px;
    }
    
    #check{
        font-size: 16px;
        padding: 8px 16px;
        background-color: #00904a;
        color: #fff;
        border: none;
        height: 80%;
        width:fit-content;
        cursor: pointer;
        padding-top: 10px;
        margin-right: 10px;
        border-radius: 4px;
        margin-top: 18px;
        margin-bottom: 18px;
    }
    
    #algoTable{
        width: 95%;
        border-collapse: collapse;
        display: inline-block;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    
    #algoTable th, td{
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }
    
    #algoTable th {
        background-color: #333;
        color: #fff;
        align-items: center;
        border: 1px solid;
        align-self: center;
    }

    #algoTable tbody td,th{
        width: 15%;
    }

    #algoTable thead td,th{
        width: 15%;
    }

    #algoTable tr,td{
        width: max-content;
    }
    
    #M{
        font-size: 16px;
    }

    #confirm th,td{
        border: 1px solid #ccc;
    }

    #con{
        padding: 8px;
        text-align: center;
        border: 1px solid #ffffff;
        width: 50px;
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

    #algoBody td,th{
        border: 1px solid black;
        width: 10px;
    }


    #sim table{
        height: 100px;
    }

    #tab th,td {
        border: 0px solid #ccc;
        width: 10px;
    }
    
    #result p{
        font-size: 16px;
    }
    
    #algoTable tr:nth-child(even){
        background-color: #f2f2f2;
    }

    #gateSelector1, #gateSelector2 {
        width: fit-content;
        font-size: 16px;
        padding: 5px;
        border-radius: 16px;
    }


    #A, #B, #C {
        width: 50px;
        font-size: 16px;
        padding: 5px;
        border-radius: 16px;
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
        #John_Cena th,tr,td{
            border: 0px solid white;
            background-color: rgba(255, 255, 255, 0);
            height: 20px;
        }

        #John_Cena{
            border: 0px solid white;
            background-color: rgba(255, 255, 255, 0);
        }

        .table{
            display: flex;
            margin: 5px;
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
        <h1>Logic Gates Simulation</h1>
        <h2>Solve the given problem in a step-wise manner.</h2>
    <div class="Q">
        <p>First Gate:
            <select id="gateSelector1">
                <option value="AND Gate">AND Gate</option>
                <option value="OR Gate">OR Gate</option>
                <option value="NOT Gate">NOT Gate</option>
                <option value="NOR Gate">NOR Gate</option>
                <option value="XOR Gate">XOR Gate</option>
                <option value="XNOR Gate">XNOR Gate</option>
                <option value="NAND Gate">NAND Gate</option>
        </select></p>
        <p>Second Gate:
            <select id="gateSelector2">
                <option value="-">None</option>
                <option value="AND Gate">AND Gate</option>
                <option value="OR Gate">OR Gate</option>
                <option value="NOT Gate">NOT Gate</option>
                <option value="NOR Gate">NOR Gate</option>
                <option value="XOR Gate">XOR Gate</option>
                <option value="XNOR Gate">XNOR Gate</option>
                <option value="NAND Gate">NAND Gate</option>
        </select></p>
        <button id="reset">Finalize</button>
    </div>
    <div class="tab1">
    <div class="table">
        <table id="algoTable">
            <thead>
                <tr>
                    <th class="colA">Input A</th>
                    <th class="colA">Input B</th>
                    <th class="colB">Input C</th>
                    <th class="colA">Gate 1</th>
                    <th class="colB">Gate 2</th>
                    <th class="colA">Output</th>
                </tr>
            </thead>
            <tbody id="confirm"></tbody>
            <tbody id="John_Cena">
                <tr>
                    <td class="colA" rowspan="2"></th>
                    <td class="colA" rowspan="2"></th>
                    <td class="colB" rowspan="2"></th>
                    <td class="colA" rowspan="2"></th>
                    <td class="colB" rowspan="2"></th>
                    <td class="colA" rowspan="2"></th>
                </tr>
            </tbody>
            <tbody id="algoBody">
                <td class="colA"><select id="A" disabled="true">
                    <option>0</option>
                    <option>1</option>
                </select>
            </td>
            <td class="colA">
                <select id="B" disabled="true">
                    <option>0</option>
                    <option>1</option>
                </select>
            </td > 
                <td class="colB">
                    <select id="C" disabled="true">
                    <option>0</option>
                    <option>1</option>
                </select>
            </td>
                <td id="g1" class="colA">-</td>
                <td id="g2" class="colB">-</td>
                <td id="out" style="border: 0px solid white;display:none" ></td>
            <td id="con" style="border: 0px solid white"><button id="check" disabled="true" style="background: grey;">Begin Simulation</button></td>
            </tbody>
        </table>
        </div>
    </div>
 
        <div id = "result"></div>
    <div class = "T">
    <div id ="sim"></div>
    <div id ="ta">
        <table style="border: 1px solid #ccc;border-collapse: collapse;;padding:1px;margin:0px">
            <tr>
                <th style="color:#00904a;padding: 5px;">Green</th>
                <th style="color:#00904a;padding: 5px;">1</th>
            </tr>
            <tr>
                <th style="color:red;padding: 5px;">Red</th>
                <th style="color:red;padding: 5px;">0</th>
            </tr>
        </table>
    
    </div>
    </div>

    
    <div>
        <script src = '../../../../formula/Aryan.js'></script>
        <script>
            const gateSelector1 = document.getElementById('gateSelector1');
            const gateSelector2 = document.getElementById('gateSelector2');
            const button = document.getElementById('reset');
            var check = document.getElementById("check");
            const sim = document.getElementById('sim');
            const ta = document.getElementById('ta');
            const tab = document.querySelector('.tab1');
            const Confirm = document.getElementById('confirm');
            const algo = document.getElementById('algoTable');
            var cnt = 0;

            const truthTableBody = document.querySelector('#truthTable tbody');
            const gateContainer = document.getElementById('gateContainer');

            const g1 = document.getElementById('g1');
            const g2 = document.getElementById('g2');
            const out = document.getElementById('out');

            const colA = document.querySelectorAll('.colA');
            const colB = document.querySelectorAll('.colB');

            var inputA = document.getElementById('A');
                var inputB = document.getElementById('B');
                var inputC = document.getElementById('C');

            var A_flag,B_flag,C_flag,gate2_flag;
            var flag = true;

            var gate_1,gate_2;
            var fgate,sgate;


            
            button.addEventListener('click', async () => {
                if(flag){
                    gate_1 = gateSelector1.value;
                    gate_2 = gateSelector2.value;
                    gateSelector1.disabled = true;
                    gateSelector2.disabled = true;
                    console.log(gate_1,gate_2);
                    buttonEnGre(check);
                    buttondisabled(button);
                    await sleep(1000);
                    buttonEnBlu(button);
                    reveal(tab);
                    button.innerHTML = "Change Logic Gates";
                    gatecheck(gate_1,gate_2,inputA,inputB,inputC);
                    g1.innerHTML=`${gate_1}`;
                    g2.innerHTML=`${gate_2}`;
                    flag = false;
                    cnt = 0;
                    fgate = gate(gate_1);
                    sgate = gate(gate_2);
                    console.log(fgate,sgate);
                    console.log(gate_1,gate_2);
                    algo.style.display = 'block';
                    
                    if (gate_2  =='-' ){
                        dissappear(colB);
                    }
                    else{
                        appear(colB);
                    }

                    appear(colA);
                }
                else{
                    Confirm.innerHTML = ``;
                    buttondisabled(check);
                    buttondisabled(button);
                    
                    inputA.disabled = "true";
                    inputB.disabled = "true";
                    inputC.disabled = "true";
                    cnt = 0;
                    hide(tab);
                    sim.style.display = 'none';
                    ta.style.display = 'none';
                    algo.style.display = 'none';

                    inputA = document.getElementById('A');
                    inputB = document.getElementById('B');
                    inputC = document.getElementById('C');

                    await sleep(1000);
                    buttonEnBlu(button);
                    gateSelector1.disabled = false;
                    gateSelector2.disabled = false;

                    button.innerHTML = "Finalize";
                    flag = true;
                    
                }
            });

            check.addEventListener('click', async () => {


                var row = document.createElement('tr');

                var inputValA = parseInt(inputA.value);
                var inputValB = parseInt(inputB.value);
                var inputValC = parseInt(inputC.value);
                var output = true;
                var out = true;
                const gate = [];
                sim.style.display = 'none';
                ta.style.display = 'none';

                if(gate_2 == '-'){
                    
                    output = gate2(gate_1,inputValA,inputValB);
                    confirminsert(inputA,inputB,inputC,gate_1,gate_2,output);
                    gatesdisplay1(sim,inputValA,inputValB,output,fgate);
                    sim.style.display = 'block';
                    ta.style.display = 'block';
                    dissappear(colB);


                }
                else{
                    if(gate_2 == 'NOT Gate'){
                    
                            out = gate2(gate_1,inputValA,inputValB);
                            output = gate3(gate_1,gate_2,inputValA,inputValB,inputValC);
                            gatesdisplay2(sim,inputValA,inputValB,out,inputValC,output,fgate,sgate);
                            confirminsert(inputA,inputB,inputC,gate_1,gate_2,output);
                            sim.style.display = 'block';
                            ta.style.display = 'block';
                    }
                    else{
                       
                            out = gate2(gate_1,inputValA,inputValB);
                            output = gate3(gate_1,gate_2,inputValA,inputValB,inputValC);
                            gatesdisplay2(sim,inputValA,inputValB,out,inputValC,output,fgate,sgate);
                            confirminsert(inputA,inputB,inputC,gate_1,gate_2,output);
                            sim.style.display = 'block';
                            ta.style.display = 'block';

                    }

                    appear(colB);

                    

                }
                appear(colA);
                buttondisabled(check);

                await sleep(1000);

                buttonEnGre(check);

            });


    </script>
    </div>
        </main></body>

</html>
