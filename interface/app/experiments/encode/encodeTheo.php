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
        <div class="Dhruv">
            <div class="Aryan">
                <h1>Experiment 5: Encoder and Decoder</h1> 
            </div> 
        <section id="aim">
            <h2>Aim</h2>
            <p>Encoder and decoder systems are fundamental components in various data processing applications, executing the transformation of input data into a different format for efficient storage, transmission, or interpretation, and subsequently reconstructing the original data or a meaningful representation from the transformed format. Their aims include enabling efficient data compression, secure information transmission, and accurate data reconstruction. By adhering to principles of information theory and machine learning, they facilitate error detection and correction, forming the building blocks for complex systems through configurations of these elementary components.</p>
        </section>

        <section id="theory">
            <h2>Theory</h2>
            <p>Encoders and decoders are fundamental building blocks in digital systems and various data processing applications. They perform specific transformations on input data to produce a different representation, facilitating efficient data handling, transmission, and interpretation.</p>
            <ol>
                <li><b>Encoder:</b>
            <div class="a">
                <div class="b">
                <ul>
                    <li><b>Function:</b> An encoder takes multiple input signals and converts them into a unique binary code. This process reduces the number of bits needed to represent the input, optimizing storage and transmission.</li><br>
                    <li><b>Operation:</b> The encoder processes the input data based on predefined rules or learned patterns, generating a compact encoded output. For example, a 4-to-2 binary encoder converts four input lines into two output lines, reducing the number of bits while maintaining the unique representation of each input.</li><br>
                    <li><b>Application:</b> Encoders optimize data storage and transmission by converting data into efficient formats. They are used in data compression to reduce file sizes, in communication systems to format data for transmission, and in digital electronics to convert analog signals to digital for further processing. Applications include image compression, secure transmission, and efficient storage.</li><br>
                </ul>
           
                </div>
                 <div class="c"><canvas id='encode' class='draws'></canvas></div>
</div></li><br>
<li><b>Encoder:</b>
            <div class="a">
                <div class="b">
                <ul>
                <li><b>Function:</b> A decoder takes encoded binary input and converts it back into the original data or a format that is easier to understand or further process. This process restores the data to its initial form, ensuring accurate interpretation and use.</li><br>
                <li><b>Operation:</b> The decoder processes the encoded data using predefined rules or learned patterns, reconstructing the original input. For example, a 2-to-4 binary decoder converts two input lines into four output lines, expanding the data back to its original form.</li><br>
                <li><b>Application:</b> Decoders are essential in data decompression, restoring compressed files to their original size for use. They are used in communication systems to convert received encoded signals back into their original form, and in digital electronics to interpret encoded data for display or further processing. Applications include data decompression, signal interpretation, and digital display systems.</li><br>
                </ul>
           
                </div>
                 <div class="c"><canvas id='decode' class='draws'></canvas></div>
</div></li><br>
            </section>

</div>
<div>
    <script src="../../../../formula/Aryan.js"></script>
    <script>

        const encode = document.getElementById('encode');
        const decode = document.getElementById('decode');
        const nRandom = 4;
        const activeRandom = Math.floor(Math.random()*(Math.pow(2,nRandom)));
        const binaryRandom = binary(activeRandom,nRandom);

        drawDecoder(input=binaryRandom,canvas=decode,n=nRandom);
        drawEncoder(active=activeRandom,canvas=encode,n=nRandom);

    </script>
</div>
    </main>
</body>
</html>