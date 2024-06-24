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
            height: max-content;
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
       border: 3px solid  #454242a9;
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
    }
    
    #algoTable{
        width: 95%;
        border-collapse: collapse;
        display: flex-start;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        display: none;
        
    }
        
    #algoTable th, td{
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
        
    #algoTable th {
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

    #algoTable{
        display:none;
    }

    #con{
        padding: 8px;
        text-align: center;
        border: 0px solid #ffffff;
    }
    
    input[type = 'text'],input[type = 'number'],input[type = 'number']{
        width:80%;
        margin: auto;
        font-size: 16px;
        padding: 5px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .mn{
        display: none;
        border: 2px solid #ccc;
        padding: 20px;
        overflow-y: scroll;
        overflow-x: scroll;
        scroll-behavior: smooth;
        scrollbar-width:thin;
    }




    .hin{
        width: fit-content;
        display: flex;
        margin: auto;
    }

    #List{
        width: fit-content;
        font-size: 16px;
        padding: 5px;
        border-radius: 16px;
    }
    
    #M{
        font-size: 16px;
    }
    
    #result p{
        font-size: 16px;
    }
    
    tr:nth-child(even){
        background-color: #f2f2f2;
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

        #algoTable{
            display:none;
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
            justify-items: center;
            scrollbar-width:thin;
            border: 1px solid #CCC;
        }

</style>
</head>
<body>
    <header>
    <header class="Nav">
    <a href="../List.php" class="back-button">Back</a>
        <a href="BoothTheo.php">Theory</a>
        <a href="Booth.php" >Simulation</a>
        <a href="BoothEx.php" >Exercise</a>
        <a href="BoothQuiz.php" >Quiz</a>
    </header>
    </header>

    <main>
    <div id="container">
        <h1>Booth's Algorithm Excerise</h1>
        <h2>Solve the given problem in a step-wise manner.</h2>
    <div class="Q">
        <p>First Number: <p id = "first"></p></p>
        <p>Second Number: <p id = "second"></p></p>
        <button id="reset">Get a Question!</button>
        <button id="hint" style="display: none;">Show Flowchart</button>
    </div>
    <div class="tab1">
        <table id="algoTable">
            <thead>
                <tr>
                    <th style="border-left: 1px solid black">Count</th>
                    <th>M</th>
                    <th>AC</th>
                    <th>Q</th>
                    <th>Q<sub>-1</sub></th>
                    <th style="border-right: 1px solid black">Action</th>
                </tr>
            </thead>
            <tbody id="confirm"></tbody>
            <tbody id="algoBody"><td><input type="number" id="count" min="1"></td>
                <td id="M"></td>
                <td><input type="text" id="AC" required></td>
                <td><input type="text" id="Q" required></td>
                <td><input type="number" id="q1" min="0" max="1" required></td>
                <td>
                    <select id="List">
                        <option>A = A - M</option>
                        <option>A = A + M </option>
                        <option>Right Arithmetic Shift</option>
                    </select>
                </td>
            <td id="con"><button id="check" disabled="true" style="background: grey;">Check Answer</button></td>
        </tbody>
        </table>
    </div>
 
        <div id = "result"></div>
        <div class="mn"style="margin:auto"><div class = "hin"><img src="https://miro.medium.com/v2/resize:fit:1366/1*eZmx_ZWi6VzDVr2ixsPdlQ.png" height = "50%"></div>
    </div>
    
    <div>
    <script src='../../../../formula/Aryan.js'></script>
        <script>
       
        
        var click = 0;
        var button = document.getElementById('reset');
        var check = document.getElementById('check');
        var M = document.getElementById('M');
        const re = document.getElementById('result');
        var final_result;
        var flag = true;
        var flag1 = true;
        var result = [];
        var Cnt = 1;
        var list;
        var hint = document.getElementById('hint');
        var hin = document.querySelector('.mn');
        const algo = document.getElementById('algoTable');
        const tab = document.querySelector('.tab1');
        hint.addEventListener('click', async() =>{
            if(flag1){
                buttondisabled(hint);
                buttondisabled(button);
                buttondisabled(check);
                await sleep(1000);
 
            
            hide(tab);
            reveal(hint);
            reveal(hin);
            buttonEnBlu(hint);
            hint.innerHTML = `Hide Flowchart`;
            button.style.display = 'none';
                flag1 = false;

            }
            else{
                buttondisabled(hint);
                await sleep(1000);
                reveal(algo);
                reveal(tab);

            hide(hin);
            buttonEnBlu(hint);
            hint.innerHTML = `Show Flowchart`;
            button.style.display = 'block';
                flag1 = true;
                buttonEnBlu(button);
                buttonEnGre(check);
                
            }


        });
        button.addEventListener('click', async () => {
                const ques = document.getElementById('algoBody');
                const ans = document.getElementById('confirm');
                const max = document.getElementById('count');
                var place1 = document.getElementById('first');
                var place2 = document.getElementById('second');
                ques.style.display = '';
                var count = document.getElementById('count');
                var AC = document.getElementById('AC');
                var Q = document.getElementById('Q');
                var q1 = document.getElementById('q1');
                var act = document.getElementById('List');
                Cnt = 1;
                result = [];
        
                if (flag) {
                    list = random();
                    result = booth(list[0],list[1]);
                    console.log(result);
        
                    place1.innerHTML = `${list[0]}`;
                    place2.innerHTML = `${list[1]}`;
                    max.max = `${result[0].count}`;
                    M.innerHTML = `${result[0].m}`;
            
                    const giv = document.createElement('tr');
                    giv.innerHTML = `<td>${result[0].count}</td>
                    <td>${result[0].m}</td>
                    <td>${result[0].ac}</td>
                    <td>${result[0].q}</td>
                    <td>${result[0].q1}</td>
                    <td>${result[0].act}</td>`;
                    ans.appendChild(giv); 
                    
                    buttondisabled(button);
                    await sleep(1000);
                   
                    button.innerHTML = `Another Question?`;
                    hint.style.display = 'block';
                    check.style.display = 'block';
                    buttonEnGre(check);
                    buttonEnBlu(hint);
        
                    flag = false;
                    buttonEnBlu(button);
                    reveal(algo);
                                reveal(tab);

                } 
                else {
                    hide(algo);
                    hide(re);
                    hide(tab);
                    hide(hint);
                    buttondisabled(button);
        
                    ans.innerHTML = '';
                    place1.innerHTML = ``;
                    place2.innerHTML = ``;
                    M.innerHTML = ``;
                    re.innerHTML = ``;
                    count.value ='';
                    AC.value = '';
                    Q.value = '';
                    q1.value ='';
                    buttondisabled(check);
                    buttondisabled(hint);
        
                    act.style.background = 'white'; q1.style.background = 'white';
                    Q.style.background = 'white'; AC.style.background = 'white'; 
                    max.style.background = 'white';
        
                    await sleep(1000);
        
                    buttonEnBlu(button);
                    button.innerHTML = `Get Question!`;
                    flag = true;
                }
        });
        
        check.addEventListener('click', async () => {
            var count = document.getElementById('count');
            var M = document.getElementById('M');
            var AC = document.getElementById('AC');
            var Q = document.getElementById('Q');
            var q1 = document.getElementById('q1');
            var act = document.getElementById('List');
            const ans = document.getElementById('confirm');
            let flag = 0;
            let dum = result;
        
            if(result[Cnt].count == count.value){
                count.style.background = 'green';
                flag += 1;
            }
            else{
                count.style.background = 'red';
            }
        
            if(result[Cnt].ac == AC.value){
                AC.style.background = 'green';
                flag += 1;
            }
            else{
                AC.style.background = 'red';
            }
        
            if(result[Cnt].q == Q.value){
                Q.style.background = 'green';
                flag += 1;
            }
            else{
                Q.style.background = 'red';
            }
        
            if(result[Cnt].q1 == q1.value && !(isNaN(parseInt(q1.value)))){
                q1.style.background = 'green';
                flag += 1;
            }
            else{
                q1.style.background = 'red';
            }
        
            if(result[Cnt].act == act.value || result[Cnt].act == "Direct Right Arithmetic Shift"){
                act.style.background = 'green';
                flag += 1;
            }
            else{
                act.style.background = 'red';
            }

            await sleep(1000);

            
            act.style.background = 'white'; q1.style.background = 'white';
                 Q.style.background = 'white'; AC.style.background = 'white'; 
                 count.style.background = 'white';


        
            if(flag==5){
                const giv = document.createElement('tr');
                giv.innerHTML = `<td>${result[Cnt].count}</td>
                <td>${result[Cnt].m}</td>
                <td>${result[Cnt].ac}</td>
                <td>${result[Cnt].q}</td>
                <td>${result[Cnt].q1}</td>
                <td>${result[Cnt].act}</td>`;
                ans.appendChild(giv); 
                Cnt += 1;

                await sleep(1000);

                count.value ='';
                    AC.value = '';
                    Q.value = '';
                    q1.value ='';
        
                act.style.background = 'white'; q1.style.background = 'white';
                 Q.style.background = 'white'; AC.style.background = 'white'; 
                 count.style.background = 'white';
            }
        
            console.log(dum.length);
        
            if(Cnt>=result.length-1){
                ques = document.getElementById('algoBody');
                ques.style.display = 'none';
        
                const re = document.getElementById('result');
        
                re.innerHTML = `<p> M = (${list[0]})<sub>10</sub> = (${result[0].m})<sub>2</sub><br>
                Q = (${list[1]})<sub>10</sub> = (${result[0].q})<sub>2</sub><br>
                Result = (${list[0]*list[1]})<sub>10</sub> = (${result[Cnt].r})<sub>2</sub>`;
            }
        });
        </script>
    </div>
    </main>
</body>

</html>
