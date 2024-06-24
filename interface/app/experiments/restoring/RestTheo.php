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
        /* CSS Styles */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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
            width: 80%;
            margin: 0 auto;
        }

        section {
            margin-top: 30px;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        p {
            margin-top: 10px;
        }

        #flowchart {
            text-align: left;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 20px;
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

        #Simulation button:hover {
            background-color: white;
            border: 1px solid red;
            color: red;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 18px;
            width: 75%;
            max-width: 100%;
            cursor: pointer;
            margin-left: 13%;
            margin-top: 2%;
        }

        
        #Simulation button {
            background-color: #971426;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 18px;
            width: 75%;
            max-width: 100%;
            cursor: pointer;
            margin-left: 13%;
            margin-top: 2%;
        }
        .Dhruv{
            margin-top: 100px;
        }
        .Aryan{
            text-align: center;
        }
    </style>
</head>
<body>
<header>
<header class="Nav">
<a href="../List.php" class="back-button">Back</a>
        <a href="RestTheo.php">Theory</a>
        <a href="Restoring.php" >Simulation</a>
        <a href="RestoringEx.php" >Exercise</a>
        <a href="RestoringQuiz.php" >Quiz</a>
    </header>
    </header>
    <main>
    <div class="Dhruv">
            <div class="Aryan">
                <h1>Experiment 3: Restoring Division Algorithm</h1> 
            </div> 
        <section id="aim">
            <h2>Aim</h2>
            <p>The aim of the restoring division algorithm is to efficiently compute the division of two binary numbers (the dividend and the divisor) while determining both the quotient and remainder. This division process is crucial in various computational tasks, especially in computer arithmetic and digital circuit design.</p>
        </section>

        <section id="theory">
            <h2>Theory</h2>
            <p>Restoring division algorithm computes binary division via systematic subtraction, shifting, 
                and bit comparisons between dividend and divisor. Using Dividend (A) and Quotient (Q) registers, 
                it subtracts/divides or adds/divides, shifting A and Q left. Based on results, sets Q's least 
                significant bit. The process iterates for each dividend bit. The final Q content is the quotient,
                 and A's content after iteration indicates the remainder. Fundamental in early computing, 
                 it provides insights into binary arithmetic and division principles.
            </p>
        </section>

        <section id="procedure">
            <h2>Procedure</h2>
            <p><ol>
                <li><b>Initialization:</b>
                <ul>
                    <li>Load the dividend into register Q.</li>
                    <li>Set register A to zero.</li>
                    <li>Determine the number of bits in the dividend for iteration count.</li>
                </ul>
                </li><br>
                <li><b>Iterative Process:</b>
                    <ul>
                        <li>While iterations remain (based on the number of bits in the dividend):</li>
                        <ol>
                            <li>Shift both A and Q left by one bit.</li>
                            <li>Compare the leftmost bits of A and the divisor:</li>
                            <ul>
                                <li>If A is greater than or equal to the divisor, subtract the divisor from A and set the least significant bit of Q to 1.</li>
                                <li>If A is less than the divisor, add the divisor to A and set the least significant bit of Q to 0.</li>
                            </ul>
                        </ol>
                    </ul>
                    </li><br>
                    <li><b>Finalization:</b>
                        <ul>
                            <li>After completing iterations, the content of Q represents the quotient, and the content of A holds the remainder.</li>
                        </ul>
                        </li>

            </ol></p>
        </section>
            <section id="flowchart">
            <h2>Flowchart</h2>
           <img src="https://lh6.googleusercontent.com/XDWSDU9_TdayNGKCz_-_levm-gCVGI8pDMbrqDhkUD-npMA98ICUBRh5-09hB58gHzFTQg-EhJBx4yVgDwgcl6DtnCp0n7ufePpAsoac5MgsxibJpTcP4zu_wzq8ngd1zP2UZCE" width = "75%" alt = "Flowchart">
           </section>

    </main>
</body>



</html>






