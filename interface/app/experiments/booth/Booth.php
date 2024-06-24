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
<html>
<head>
<meta charset="UTF-8">
<title>Booth's Algorithm Simulation</title>
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            background: url("../../../../images/background/red.jpg") no-repeat center center fixed;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    input[type="number"] {
            width: 40px;
            padding: 6px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #asd,.first,.not-first{
            display:inline-flex;
            margin-left: 5px;
            height: min-content;
            padding-bottom: 0px;
            margin-bottom: 0px;
            padding-top: 0px;
            margin-top: 5px;
            user-select: none;
        }

        #container {
            width: 100%;
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

        #calculate, #reset, #check-next, #check-back {
            font-size: 14px;
            padding: 10px 14px; 
            background-color: #0074d9;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            margin-left: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #comment {
            padding: 8px;
            text-align: center;
            border: 1px solid black;
            width: 200px;
            height: max-content;
            margin: auto;
        }

        .tab {
            width: 100%;
        }

        #result {
            display: none;
            margin-top: 20px;
            font-size: 20px;
            height:min-content;
            width: 100%;
            overflow: hidden;
            overflow-y: scroll;
            overflow-x: scroll;
            text-align: center;
            justify-items: center;
            scrollbar-width:thin;
            border: 1px solid #CCC;
        }



        #con {
            padding: 8px;
            text-align: center;
            border: 0px solid #ffffff;
            width: 100px;
            margin: auto;
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

        .back-button {
            text-align: left;
            font-size: medium;
            margin-right: 50px;
        }

        header a {
            margin: 15px;
            color: #ffffff;
            text-decoration: none;
            padding: 5px;
            transition: all 0.4s;
        }

        #algoTable{
            width: 95%;
            border-collapse: collapse;
            display: flex-start;
            margin: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: auto;
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

        a:hover {
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
            <h1>Booth's Algorithm Simulation</h1>
            <h2>Enter the numbers to be multiplied in decimal format.</h2>

            <label for="first">First Number: </label>
            <input type="number" id="first" required>
            <label for="second">Second Number: </label>
            <input type="number" id="second" required>
            <button id="calculate">Calculate</button>

            <div class="tab1">
            <table id="algoTable">
                <thead id="head">
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
                <tbody id="algoBody">
                    <td colspan="6" id="comment"></td>
                    <td id="con">
                        <div class="control">
                            <button id="check-next" disabled="true" style="background: grey;">Next Step</button><button
                                id="check-back" disabled="true" style="background: grey;">Previous Step</button>
                        </div>
                    </td>
                </tbody>
            </table>
            </div>
            <div id="result">
            </div>
        
            <div>
                <script src='../../../../formula/Aryan.js'></script>
                <script>
                    var opt = [0, "As Q<sub>0</sub> = 0 and Q<sub>-1</sub> = 1, we add <b>M</b> (Multiplicand) into <b>A</b> (Accumulator). Thus A → A + M.",
                        "As Q<sub>0</sub> = 1 and Q<sub>-1</sub> = 0, we subtract <b>M</b> (Multiplicand) from <b>A</b> (Accumulator). Thus A → A - M.",
                        "We now perform Right Arithmetic Shift on <b>A</b>, <b>Q</b> and <b>Q<sub>-1</sub></b>. Additionally we decrement the <b>Count</b> by 1.",
                        "As both Q<sub>0</sub> and Q<sub>-1</sub> are the same, we perform Right Arithmetic Shift on <b>A</b>, <b>Q</b> and <b>Q<sub>-1</sub></b>. Additionally, we decrement the <b>Count</b> by 1."
                    ];

                    var cnt = 0;
                    var loop = true;
                    const button = document.getElementById('calculate');
                    const back = document.getElementById('check-back');
                    const next = document.getElementById('check-next');
                    const p = document.getElementById('comment');
                    const ans = document.getElementById('confirm');
                    const re = document.getElementById('result');
                    const con = document.getElementById('con');
                    const tab = document.querySelector('.tab1');
                    var Q, M;
                    var ac,m,q,q1;
                    const algo = document.getElementById('algoTable');
                    var result;
                    
                    button.addEventListener('click', async () => {
                        buttondisabled(next);
                        buttondisabled(back);
                        next.style.display = '';
                        back.style.display = '';
                        p.style.display = '';
                        con.style.display = '';
                        ans.innerHTML = ``;
                        re.innerHTML = ``;
                        cnt = 0;

                        M = parseInt(document.getElementById('first').value);
                        Q = parseInt(document.getElementById('second').value);

                        if (!(isNaN(M) || isNaN(Q))) {
                            if(loop){
                                opt[0] = "Initialization: M ← ("+M+")<sub>10</sub>, Q ← ("+Q+")<sub>10</sub> and AC ← 0.";
                                result= booth(M, Q);

                                var count = result[0].count;
                                ans.innerHTML = '';
                                p.innerHTML = '';
                                const giv = document.createElement('tr');
                                giv.className = "row";
                                giv.innerHTML = `<td>${result[0].count}</td>
                                    <td><p class="m"></p><br>${result[cnt].m}</td>
                                    <td><p class="ac"></p><br>${result[cnt].ac}</td>
                                    <td><p class="q"></p><br>${result[cnt].q}</td>
                                    <td><p class="q1"></p><br>${result[cnt].q1}</td>
                                    <td>${result[0].act}</td>`;
                                ans.appendChild(giv);
                                m=document.querySelectorAll('.m');
                                ac=document.querySelectorAll('.ac');
                                q=document.querySelectorAll('.q');
                                q1=document.querySelectorAll('.q1');
                                bit(m[m.length-1],ac[ac.length-1],q[q.length-1],q1[q1.length-1]);
                                colchange(result,cnt);

                                boofind_state(cnt,p,opt);

                                buttondisabled(button);
                                reveal(algo);
                                reveal(tab);
                            
                                await sleep(1000);
                                button.innerHTML = `Another question?`;
                                buttonEnGre(next);
                                buttonEnBlu(button);
                                loop = false;

                            } 
                        
                            else{
                                hide(algo);
                                hide(re);
                                hide(tab);
                                buttondisabled(button);
                                await sleep(1000);
                                buttonEnBlu(button);
                                button.innerHTML = `Calculate`;
                                loop = true;
                            }
                        } 
                        else {
                            console.log("Null values detected!");
                            alert("Please enter a value!");
                        }
                    });

                    next.addEventListener('click', async () => {
                        cnt += 1;
                        const giv = document.createElement('tr');
                        giv.innerHTML = `<td>${result[cnt].count}</td>
                                    <td><p class="m"></p><br>${result[cnt].m}</td>
                                    <td><p class="ac"></p><br>${result[cnt].ac}</td>
                                    <td><p class="q"></p><br>${result[cnt].q}</td>
                                    <td><p class="q1"></p><br>${result[cnt].q1}</td>
                                    <td>${result[cnt].act}</td>`;
                                ans.appendChild(giv);
                                m=document.querySelectorAll('.m');
                                ac=document.querySelectorAll('.ac');
                                q=document.querySelectorAll('.q');
                                q1=document.querySelectorAll('.q1');
                                bit(m[m.length-1],ac[ac.length-1],q[q.length-1],q1[q1.length-1]);

                            colchange(result,cnt);

                        boofind_state(cnt,p,opt)

                        buttonEnGre(back);

                        if (cnt >= result.length - 2) {
                            buttondisabled(next);
                            reveal(re);
                            re.innerHTML = `<h1>Final Answer</h1><p> M = (${M})<sub>10</sub> = (${result[0].m})<sub>2</sub><br>
                                Q = (${Q})<sub>10</sub> = (${result[0].q})<sub>2</sub><br>
                                Result = (${M*Q})<sub>10</sub> = (${result[result.length-1].r})<sub>2</sub></p>`;
                        }
                    });

                    back.addEventListener('click', async () => {
                        if (cnt >= result.length - 2) {
                            re.innerHTML = ``;
                        }
                        hide(re);
                        cnt -= 1;
                        ans.removeChild(ans.lastChild);
                        boofind_state(cnt,p,opt)

                        if (cnt < 1) {
                            buttondisabled(back);
                        }
                        buttonEnGre(next);
                    });
                </script>
            </div>
        </div>
    </main>
</body>

</html>
