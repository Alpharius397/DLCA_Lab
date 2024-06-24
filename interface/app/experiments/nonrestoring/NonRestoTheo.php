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

        .Dhruv{
            margin-top: 100px;
        }
        .Aryan{
            text-align: center;
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
            margin-top: 100px;
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
    <div class="Dhruv">
            <div class="Aryan">
                <h1>Experiment 4: Non-Restoring Division Algorithm</h1> 
            </div> 
        <section id="aim">
            <h2>Aim</h2>
            <p>The aim of the non-restoring division algorithm is to perform integer division without restoring a partial remainder. It efficiently finds the quotient and remainder through iterative subtractions and comparisons between the dividend and divisor, aiming to achieve faster and less hardware-intensive division operations compared to other algorithms.</p>
        </section>

        <section id="theory">
            <h2>Theory</h2>
            <p>Non - Restoring division algorithm computes binary division via systematic subtraction, shifting, and bit comparisons between dividend and divisor. In this approach, the divisor is repeatedly subtracted from the dividend while tracking the sign of the result. If the result is positive, the subtraction proceeds, and the quotient digit is set; otherwise, the addition takes place. This method continues until the entire dividend is processed, resulting in the quotient and remainder. The non-restoring division offers a hardware-efficient and faster alternative to restoring division algorithms.
            </p>
        </section>

        <section id="procedure">
            <h2>Procedure</h2>
            <p><ol>
                <li><b>Initialization:</b>
                <ul>
                    <li>Identify the dividend (Q) and divisor (M).</li>
                    <li>Initialize a variable called as 0.</li>
                    <li>A counter variable (n) should be set to the number of bits in the dividend.</li>
                </ul>
                </li><br>
                <li><b>Iterative Process:</b>
                    <ul>
                        <li>Start a loop that iterates n times (number of bits in the dividend).</li>
                        <li>Shift the accumulator A left by 1 bit, setting the least significant bit to the next bit of the dividend.</li>
                        <ol>
                            <li>Shift both A and Q left by one bit.</li>
                            <li>Compare the leftmost bits of A and the divisor:</li>
                            <ul>
                                <li>If A is positive or zero, subtract the divisor from A ans set he least significant bit of the quotient to 0.</li>
                                <li>If the result is negative, add the divisor to A and set the least significant bit of the quotient to 1.</li>
                            </ul>
                        </ol>
                    </ul>
                    </li><br>
                    <li><b>Finalization:</b>
                        <ul>
                            <li>After completing iterations, the value in the A after the iteration represents the remainder and the value in Q is the quotient.
                            </li>
                        </ul>
                        </li>

            </ol></p>
        </section>
            <section id="flowchart">
            <h2>Flowchart</h2>
           <img src="../../../../images/flowchart/Flow-Chart-for-Non-Restoring-division.png" width = "70%" alt = "Flowchart">
           </section>

   

        
    </main>
</body>
</html>
