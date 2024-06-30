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
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700;900&display=swap"
    rel="stylesheet">
<title></title>
<style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("../../../../images/background/red.jpg") no-repeat center center fixed;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        #container {
            width: 100%;
            height: 100%;
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

    .Q p{
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
    }
    
    #reset,#hint {
        font-size: 16px;
        padding: 8px 16px;
        background-color: #0074d9;
        color: #fff;
        border: none;
        height: 80%;
        padding-top: 10px;
        margin-right: 10px;
        border-radius: 4px;
       
        cursor: pointer;
    }
    
    #sub{
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
    }
    
    #algoTable{
        width: 95%;
        border-collapse: collapse;
        display: flex-start;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        border: 1px solid black;
    }
        
    #algoTable th, td{
        padding: 8px;
        text-align: center;
    }
        
    #algoTable thead th {
        background-color: #333;
        color: #fff;
        align-items: center;
        border: 1px solid #ccc;
        align-self: center;
    }

    #algoTable tbody td,th{
        width: 13%;
    }

    #algoTable thead td,th{
        width: 13%;
    }

    #algoTable tr,td{
        width: max-content;
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
            z-index: 100;    } 

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
            height:max-content;
            margin-top: 20px;
            margin-bottom: 10px;
            width: 100%;
            text-align: center;
            justify-items: center;
        }


        #ques th,tr{
            background-color: white;
            text-align: left;
            color: #000;
        }

        #result{
            display: flex;
            margin: 5px auto;
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

        #question{
            font-size: 19px;
            text-align: center;
            color: #971426;
        }

        .options input[type='radio'],label {
            display: inline-block;
            margin: 5px;
        }

        .options{
            display: block;
            align-items: center;
            justify-items: center;
            margin: auto;
            text-align: center;
        }

        #remark p{
            text-align: center;
            margin: 0px;
        }

        #quesRow td{
            border: 1px solid black;
        }

        #submission{
            align-items: center;
            justify-content: center;
        }

        .submit{
            width: 20%;
            border-radius: 10px;
            color:#ffffff;
            background-color: #00904a;
        }

        .submit:hover{
            border: 1px solid #00904a;
            color:#00904a;
            background-color: white;
        }

</style>
</head>
<body>
<header class="Nav">
    <a href="../List.php" class="back-button">Back</a>
        <a href="muxTheo.php">Theory</a>
        <a href="mux.php" >Simulation</a>
        <a href="muxEx.php" >Exercise</a>
        <a href="muxQuiz.php" >Quiz</a>
</header>

    <main>
    <div id="container">
        <h1>MUX and DeMUX Excerise</h1>
        <h2>Solve the given problem in a step-wise manner.</h2>
    <div class="Q">
        <button id="reset">Begin Excerise!</button>
    </div>
    <div class="tab1">
        <table id="algoTable">
            <thead>
                <tr id="heading">
                    <th>Sr. No.</th>
                    <th>Type</th>
                    <th>Size</th>

                </tr>
                <tr id="quesRow">
                    <td id="index">1.</td>
                    <td id="type">MUX</td>
                    <td id="size">2:1</td>
                    <td id="S0">1</td>
                    <td id='S1'>1</td>
                </tr>
            </thead>
            <tbody id="ques">
                <tr>
                <th colspan="5" id="quesT" class="Quiz">
                
                    <p id="question">Select the input which will be redirected as the output.</p>    
                    <br>
                    <div class="options">
                    </div>
                    <p id="remark"></p>
                    <div class="options"><button class="submit" id="sub">Submit</button>
                    </div>
                    
                </th>
            </tr>
            </tbody>

        </table>
        
    </div>
    
        <div id = "result">
            <p id="total" class="remark">Total Attempts: <b>0</b></p>
            <p id="correct" class="remark">Correctly Answered: <b>0</b></p>
            <p id="wrong" class="remark">Incorrectly Answered: <b>0</b></p>
        </div>

        </div>
    </div>
    
    <div>
    <script src='../../../../formula/Aryan.js'></script>
        <script>
            const remark = document.getElementById('remark');
            const quesRow = document.getElementById('quesRow');
            const question = document.getElementById('question');
            const total_tries = document.getElementById('total');
            const correct = document.getElementById('correct');
            const wrong = document.getElementById('wrong');
            const submit = document.getElementById("sub");
            const tableHead = document.getElementById("heading");
            const answerRow = document.querySelectorAll('.Quiz');
            const options = document.querySelector(".options");
            const reset = document.getElementById('reset');
            const main = document.querySelector(".tab1");
            const result = document.getElementById('result');

            var answer = null;
            var state = 0;
            var size = Math.ceil(Math.random()*2)+2;
            var type = ['MUX','DeMUX'];
            var context = {'MUX':[Math.pow(2,size)+':1','Select the input which will be redirected as the output.'],'DeMUX':['1:'+Math.pow(2,size),'Select the output where the input will be redirected to.']}
            var click = {'total':0,'correct':0,'wrong':0};
            var index=1;
            var ready; // Setinterval var

            /** Initial states*/
            newQuesTable(size);
            hide(main);
            hide(result);

            /** Event Listner*/
            submit.addEventListener('click',()=>{
                clearInterval(ready);
                checkMUX();
            });

            reset.addEventListener('click',async () => {
                buttondisabled(reset);
                if(state==1){

                    hide(main);
                    hide(result);

                    await sleep(1000);

                    state = 0;
                    index = 0;
                    click = {'total':0,'correct':0,'wrong':0};
                    reset.innerHTML = `Get Questions`;
                }
                else{
                    
                    reveal(main);
                    reveal(result);

                    await sleep(1000);

                    state = 1;
                    reset.innerHTML = `Reset Attempt`;
                }
                buttonEnBlu(reset);
                updateResult(click);
            });

        </script>
    </div>
    </main>
</body>

</html>
