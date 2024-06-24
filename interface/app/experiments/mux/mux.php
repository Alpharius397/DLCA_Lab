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

        .draws{
            height: 600px;
            width: 600px;
            overflow-y: scroll;
            overflow-x: scroll;
            border: 1px solid black;
            margin: 5px auto;
            margin-top: 5px;
            padding-top: 10px;
        }

        button{
            margin: 10px;
            padding: 15px;
            border-radius: 20px;
            background-color: #0074d9;
            color: white;
            border: #ccc;
            font-size: 15px;
        }

        button:hover{
            color:#0074d9;
            border: 1px solid #0074d9;
            background-color: white;
        }

        .active{
            color:#0074d9;
            border: 1px solid #0074d9;
            background-color: white;
        }

        select{
            margin: 5px;
            border-radius: 50px;
            padding: 5px;
        }

        label{
            font-weight: bold;
            font-size: 20px;
        }

        .input{
            display: flex;
        }

        table{
            margin: auto;
        }

        #feed{
            font-size: large;
        }

        #head th,tr{
            font-size: 20px;
            width: 50px;
            color: #971426;
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
        <div class='main'>
            <h1>MUX and DeMUX Simulation</h1>
            <h2>Choose one.</h2>

            <button id="mux" value='MUX'>MUX</button><button id="demux" value='DeMUX'>DeMUX</button>
        </div><br>
        <div class='page'>            
            <label for="size" id='type'> </label>
            <select id='size'>
            </select><br><br>
            <label for="input">Enter the status signals: </label><br><br>
            <div class="input">
            <table id='input'>
                <thead id='head'></thead>
                <tbody id='body'></tbody>
            </table></div>

            <div class='draws'><canvas id='here'></canvas></div><p id='feed'></p>
        </div>
        </div>
        
            <div>
                <script src='../../../../formula/Aryan.js'></script>
                <script>
                    
                    const select = document.getElementById('size');
                    const name = document.getElementById('type');
                    const canvas = document.getElementById('here');
                    const feed = document.getElementById('feed');
                    const dive = document.querySelector('.draws');
                    const table_head = document.getElementById('head');
                    const table_body = document.getElementById('body');
                    const mux = document.getElementById('mux');
                    const demux = document.getElementById('demux');
                    const page = document.querySelector('.page');
                    const upperLimit = 8;
                    var topic = 'MUX';



                    /** Event State */
                    mux.addEventListener('click',() => {topic=mux.value; newState(topic);});
                    demux.addEventListener('click',() => {topic=demux.value; newState(topic);});
                    select.addEventListener('click',() => {S_table(parseInt(select.value)); listenButton(); drawThing(topic);});

                    /** Initial State Function */
                    hide(page);

                    function newState(topic){
                        reveal(page);
                        selectOpt(select,upperLimit,topic,name);
                        S_table(parseInt(select.value));
                        listenButton();
                        drawThing(topic);
                    }
                    
                </script>
            </div>
        </div>
    </main>
</body>

</html>
