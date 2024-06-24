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
        width: 50%;
    }

    .c{
        width: 50%;
        max-height: 400px;
        display: flex;
        padding: auto;
        border: 1px solid #ccc;
        margin: 0px auto;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
        text-align: center;
        align-items: center;
        justify-items: center;
        overflow-x: scroll;
        overflow-y: scroll;

    }

    .draws{
        margin: auto;
        margin-left: -25px;
        margin-top: -25px;
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
        <div class="Dhruv">
            <div class="Aryan">
                <h1>Experiment 6: MUX and DeMUX</h1> 
            </div> 
            <section id="aim">
        <h2>Aim</h2>
        <p>Multiplexer (MUX) and demultiplexer (DEMUX) systems are fundamental components in various data processing applications, executing the transformation of input data into a different format for efficient storage, transmission, or interpretation, and subsequently reconstructing the original data or a meaningful representation from the transformed format. Their aims include enabling efficient data routing, secure information transmission, and accurate data distribution. By adhering to principles of information theory and machine learning, they facilitate error detection and correction, forming the building blocks for complex systems through configurations of these elementary components.</p>
    </section>

    <section id="theory">
        <h2>Theory</h2>
        <p>Multiplexers (MUX) and demultiplexers (DEMUX) are fundamental building blocks in digital systems and various data processing applications. They perform specific transformations on input data to produce a different representation, facilitating efficient data handling, transmission, and interpretation.</p>
        <ol>
            <li><b>Multiplexer (MUX):</b>
                <div class="a">
                    <div class="b">
                        <ul>
                            <li><b>Function:</b> A multiplexer (MUX) takes multiple input signals and selects one of them to be the output. This process reduces the number of lines needed to transmit multiple signals, optimizing the use of communication channels.</li><br>
                            <li><b>Operation:</b> The multiplexer processes the input data based on a selection input, generating a single output. For example, a 4-to-1 multiplexer takes four input lines and selects one of them to be transmitted on the single output line.</li><br>
                            <li><b>Application:</b> Multiplexers optimize data transmission by allowing multiple signals to share a single communication channel. They are used in communication systems to efficiently route data, in data acquisition systems to collect multiple sensor signals, and in digital electronics to simplify circuit design. Applications include signal routing, data collection, and circuit optimization.</li><br>
                        </ul>
                    </div>
                    <div class="c"><canvas id='mux' class='draws'></canvas></div>
                </div>
            </li><br>
            <li><b>Demultiplexer (DEMUX):</b>
                <div class="a">
                    <div class="b">
                        <ul>
                            <li><b>Function:</b> A demultiplexer (DEMUX) takes a single input signal and distributes it to one of several output lines. This process ensures that the data is routed to the correct destination, allowing for efficient data distribution.</li><br>
                            <li><b>Operation:</b> The demultiplexer processes the input data based on a selection input, distributing the single input to one of the multiple output lines. For example, a 1-to-4 demultiplexer takes one input line and directs it to one of four output lines.</li><br>
                            <li><b>Application:</b> Demultiplexers are essential in data distribution, ensuring that signals are routed to their correct destinations. They are used in communication systems to direct incoming data to the correct receiver, in data acquisition systems to distribute collected data to appropriate processing units, and in digital electronics to simplify circuit design. Applications include signal distribution, data routing, and circuit optimization.</li><br>
                        </ul>
                    </div>
                    <div class="c"><canvas id='demux' class='draws'></canvas></div>
                </div>
            </li><br>
        </ol>
    </section>


</div>
<div>
    <script src="../../../../formula/Aryan.js"></script>
    <script>

        const mux = document.getElementById('mux');
        const demux= document.getElementById('demux');
        const nRandom = 4;
        const activeRandom = Math.floor(Math.random()*(Math.pow(2,nRandom)));
        const binaryRandom = binary(activeRandom,nRandom);

        drawMUX(active=binaryRandom,canvas=mux,n=nRandom);
        drawDeMUX(active=binaryRandom,canvas=demux,n=nRandom);

    </script>
</div>
    </main>
</body>
</html>