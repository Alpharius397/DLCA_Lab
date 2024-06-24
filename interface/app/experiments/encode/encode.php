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
            display:inline-flex;
        }

        label{
            font-weight: bold;
            font-size: 20px;
        }


        table{
            margin: auto;
        }

        #feed{
            font-size: large;
        }

        th,tr{
            font-size: 17px;
            width: 80px;
            color: #971426;
        }

    </style>
</head>

<body>
    <header>
        <header class="Nav">
        <a href="../List.php" class="back-button">Back</a>
        <a href="encodeTheo.php">Theory</a>
        <a href="encode.php" >Simulation</a>
        <a href="encodeEx.php" >Exercise</a>
        <a href="encodeQuiz.php" >Quiz</a>
        </header>
    </header>
    <main>
        <div id="container">
        <div class='main'>
            <h1>Encoder and Decoder Simulation</h1>
            <h2>Choose one.</h2>

            <button id="de">Decoder</button><button id="en">Encoder</button>
            <br>
        </div>
        <div class='page' id='dec'>            
            <label for="de">Enter the type of Decoder </label>
            <select class='size' id='de'>
                <option value='1'>1:2</option>
                <option value='2'>2:4</option>
                <option value='3'>3:8</option>
                <option value='4'>4:16</option>
                <option value='5'>5:32</option>
                <option value='6'>6:64</option>
                <option value='7'>7:128</option>
                <option value='8'>8:256</option>
            </select><br><br>
            <label for="input">Enter the binary input: </label><br><br>
            <table id='input_de'>
                <thead id='de_head'></thead>
                <tbody id='de_body'></tbody>
            </table>
            <div class='draws' id='deDraw'><canvas id='here_de'></canvas></div><p id='feed_de'></p>
        </div>

        <div class='page' id='en'>
            <br>
            <label for="en">Enter the type of Encoder: </label>
            <select class='size' id='en'>
                <option value='1'>2:1</option>
                <option value='2'>4:2</option>
                <option value='3'>8:3</option>
                <option value='4'>16:4</option>
                <option value='5'>32:5</option>
                <option value='6'>64:6</option>
                <option value='7'>128:7</option>
                <option value='8'>256:8</option>
            </select><br><br>
            <label for="en">Enter the active input: </label>
            <select class="input" id='en'>
            </select><br>
            <div class='draws' id='enDraw'><canvas id='here_en'></canvas></div><p id='feed_en'></p>
        </div>
        
            <div>
                <script src='../../../../formula/Aryan.js'></script>
                <script>
                    const deChoice = document.getElementById('de');
                    const enChoice = document.getElementById('en');
                    const size_de = document.querySelector('.size#de');
                    const size_en = document.querySelector('.size#en');
                    const sub_en = document.querySelector('.sub#en');
                    const sub_de = document.querySelector('.sub#de');
                    const page_de = document.querySelector('.page#dec');
                    const page_en = document.querySelector('.page#en');
                    const draw_div_en = document.querySelector('.draws#enDraw');
                    const draw_div_de = document.querySelector('.draws#deDraw');
                    const input_en = document.querySelector('.input#en');
                    const input_de = document.querySelector('.input#de');
                    const canvas_en = document.getElementById('here_en');
                    const canvas_de = document.getElementById('here_de');
                    const en_feed = document.querySelector('#feed_en');
                    const de_feed = document.querySelector('#feed_de');
                    const table_head = document.querySelector('#de_head');
                    const table_body = document.querySelector('#de_body');
                    var opt;

                    hide(page_de); hide(page_en);
                    hide(draw_div_de); hide(draw_div_en);
                    hide(en_feed);



                    deChoice.addEventListener('click', ()=>{
                        reveal(page_de);
                        hide(page_en);
                        renderDecoder(table_head,table_body,canvas_de,parseInt(size_de.value),draw_div_de,de_feed);
                        reveal(draw_div_de);
                    });
                    
                    
                    enChoice.addEventListener('click', ()=>{
                        reveal(page_en);
                        hide(page_de);

                        generate_input(input_en,size_en);
                        drawEncoder(-1,canvas_en,parseInt(size_en.value),draw_div_en,en_feed);

                        reveal(draw_div_en);
                        reveal(en_feed);
                    });

                    size_en.addEventListener('change', ()=>{
                        hide(draw_div_en);
                        hide(en_feed);
                        generate_input(input_en,size_en);
                        drawEncoder(-1,canvas_en,parseInt(size_en.value),draw_div_en,en_feed);
                        reveal(draw_div_en);
                        reveal(en_feed);
                    });

                    size_de.addEventListener('change', ()=>{
                        hide(draw_div_de);
                        renderDecoder(table_head,table_body,canvas_de,parseInt(size_de.value),draw_div_de,de_feed);
                        reveal(draw_div_de);

                    });

                    input_en.addEventListener('change',() => {
                        reveal(draw_div_en);
                        drawEncoder(parseInt(input_en.value),canvas_en,parseInt(size_en.value),draw_div_en,en_feed);
                    });




                    
                </script>
            </div>
        </div>
    </main>
</body>

</html>
