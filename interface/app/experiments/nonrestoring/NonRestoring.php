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
    <style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("../../../../images/background/red1.jpg") no-repeat center center fixed;
            background-size: 100% 100%;
            display: flex;
            align-items: center;
            justify-content: center;
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
 
 input[type="number"] {
 width: 40px;
 padding: 6px;
 font-size: 16px;
 border: 1px solid #ccc;
 border-radius: 4px;
 }
 
 #calculate,
 #reset,
 #check-next,
 #check-back {
 font-size: 14px; /* Adjusted font size */
 padding: 10px 14px; /* Adjusted padding */
 background-color: #0074d9;
 color: #fff;
 border: none;
 border-radius: 4px;
 cursor: pointer;
 margin-top: 10px;
 }
 
 table {
 width: 100%;
 border-collapse: collapse;
 margin-top: 20px;
 }
 
 th,
 td {
 border: 1px solid black;
 padding: 8px;
 text-align: center;
 }
 
 th {
 background-color: #333;
 color: #fff;
 border: 1px solid #ffffff;
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

 .tab{
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

        a:hover {
            border-radius: 5px;
            font-size: 120%;
        }

        main {
            width: 80%;
            margin: 0 auto;
            margin-top: 100px;
        }

        #algoTable{
            display:none;
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
            width: 80%;
            margin: 0 auto;
            margin-top: 100px;
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
<header class="Nav">
<a href="../List.php" class="back-button">Back</a>
        <a href="NonRestoTheo.php">Theory</a>
        <a href="NonRestoring.php" >Simulation</a>
        <a href="NonRestoringEx.php" >Exercise</a>
        <a href="NonRestoringQuiz.php" >Quiz</a>
    </header>
    <main>
    <div id="container">
        <h1>Non-Restoring Division Algorithm Simulation</h1>
        <h2>Enter the numbers to be divided in decimal format.</h2>

        <label for="first">Dividend: </label>
        <input type="number" id="first"  min="1">
        <label for="second">Divisor: </label>
        <input type="number" id="second" min="1">
        <button id="calculate">Calculate</button>

        <div class="tab1">
        <table id="algoTable">
            <thead>
                <tr>
                        <th style="border-left: 1px solid black">Count</th>
                        <th>M</th>
                        <th>AC</th>
                        <th>Q</th>
                        <th style="border-right: 1px solid black">Action</th>
                    </tr>
            </thead>
            <tbody id="confirm"></tbody>
            <tbody id="algoBody">
                <td colspan="5" id="comment"></td>
                <td id="con">
                <div class="control">   
                <button id="check-next" disabled="true" style="background: grey;">Next Step</button><button id="check-back" disabled="true" style="background: grey;">Previous Step</button></div></td>
            </tbody>
        </table>
        </div>
        <div id = "result"></div>
    </div>
        
    </div>
   
    <div>
        <script src='../../../../formula/Aryan.js'></script>
        <script>

var result;
var opt = [0,"As <b>A</b> is less than zero (as sign bit of A is 1),we assign Q<sub>0</sub> as 0. Additionally we decreement the <b>Count</b> by 1.","As <b>A</b> is greater than zero (as sign bit of A is 0), we subtract <b>M</b> (Divisor) from <b>A</b>.Thus, A ← A - M.","We perform Left Arithmetic Shift on <b>A</b> and <b>Q</b>.","As <b>A</b> is greater than zero (as sign bit of A is 0),we assign Q<sub>0</sub> as 1.","As <b>A</b> is less than zero (as sign bit of A is 1), we add <b>M</b> (Divisor) into <b>A</b>.Thus, A ← A + M."];


var cnt = 0;
const re = document.getElementById('result');
const button = document.getElementById('calculate');
const back = document.getElementById('check-back');
const next = document.getElementById('check-next');
const p = document.getElementById('comment');
const tab = document.querySelector('.tab1');
const ans = document.getElementById('confirm');
const algo = document.getElementById('algoTable');
var loop = true;
var Q,M;
var ac,m,q;

button.addEventListener('click', async () =>{
    buttondisabled(next);buttondisabled(back);
    next.style.display = '';
    back.style.display = ''; 
    p.style.display = '';
    con.style.display = '';
    ans.innerHTML = ``;
    re.innerHTML = ``;
    cnt = 0;

    M = parseInt(document.getElementById('first').value);
    Q = parseInt(document.getElementById('second').value);

    document.getElementById('first').value = M;
    document.getElementById('second').value = Q;
    if ((!(isNaN(M) || isNaN(Q))) && (M>=0 && Q>0)){

        if(loop){
        result = nonrestoring(M,Q);
        opt[0] = "Initialization: M ← ("+Q+")<sub>10</sub>, Q ← ("+M+")<sub>10</sub> and AC ← 0.";
        var count = result[0].count;
        ans.innerHTML = '';
        p.innerHTML = '';
        re.innerHTML = '';

        const giv = document.createElement('tr');
        giv.innerHTML = `<td>${result[cnt].count}</td>
                                    <td><p class="m"></p><br>${result[cnt].m}</td>
                                    <td><p class="ac"></p><br>${result[cnt].ac}</td>
                                    <td><p class="q"></p><br>${result[cnt].q}</td>
                                    <td>${result[cnt].act}</td>`;
                                ans.appendChild(giv);
                                m=document.querySelectorAll('.m');
                                ac=document.querySelectorAll('.ac');
                                q=document.querySelectorAll('.q');
                                q1=document.querySelectorAll('.Q1');
                                bitDiv(m[m.length-1],ac[ac.length-1],q[q.length-1]);
                                colchange(result,cnt);
        Nonfind_state(cnt,p,opt);

        
        reveal(algo);
        reveal(tab);
        buttondisabled(button);
        await sleep(1000);

        buttonEnGre(next);
        button.innerHTML = `Change Question?`;
        buttonEnBlu(button);
        loop = false;
        console.log(result);
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
    else{
        if(isNaN(M) || M<0){
            document.getElementById('first').style.backgroundColor="red";
        }
        if( isNaN(Q) || Q<1){
            document.getElementById('second').style.backgroundColor="red";
        }
        ans.innerHTML=``;
        p.innerHTML = ``;
        algo.style.display = 'none';
        await sleep(1000);
        document.getElementById('second').style.backgroundColor="white";
        document.getElementById('first').style.backgroundColor="white";
        
        alert("Invalid Number in Numerator or Denominator!");
        console.log("Null values detected!");
    }
    });


next.addEventListener('click', async () => {
        cnt += 1;    
        const giv = document.createElement('tr');
        giv.innerHTML =`<td>${result[cnt].count}</td>
                                    <td><p class="m"></p><br>${result[cnt].m}</td>
                                    <td><p class="ac"></p><br>${result[cnt].ac}</td>
                                    <td><p class="q"></p><br>${result[cnt].q}</td>
                                    <td>${result[cnt].act}</td>`;
                                ans.appendChild(giv);
                                m=document.querySelectorAll('.m');
                                ac=document.querySelectorAll('.ac');
                                q=document.querySelectorAll('.q');

                                bitDiv(m[m.length-1],ac[ac.length-1],q[q.length-1]);
                                colchange(result,cnt);
        Nonfind_state(cnt,p,opt);
        

    buttonEnGre(back)

    if(cnt>=result.length-1){
        buttondisabled(next);
        reveal(re);
        re.innerHTML = `<h1>Final Answer</h1><p> Q = (${M})<sub>10</sub> = (${result[0].q})<sub>2</sub><br>
                M = (${Q})<sub>10</sub> = (${result[0].m})<sub>2</sub><br>
                Quotient = (${Math.floor(M/Q)})<sub>10</sub> = (${result[result.length-1].q})<sub>2</sub><br>
                Remainder = (${M%Q})<sub>10</sub> = (${result[result.length-1].ac})<sub>2</sub></p>`;
    }

});

back.addEventListener('click', async () => {
    
    if(cnt>=result.length-1){
        re.innerHTML = ``;
    }
    
    cnt-=1;
    ans.removeChild(ans.lastChild);
    Nonfind_state(cnt,p,opt)

    if(cnt<=0){
        buttondisabled(back);
;
    }
    buttonEnGre(next);

});
       
    </script>
    </div></main>
</body>

</html>