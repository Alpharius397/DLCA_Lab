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
    <title>Booth's Algorithm Quiz</title>
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

        main {
            margin-top: 100px;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

  
        .quiz-container {
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: left;
            /* Adjusted text alignment to left */
            margin: auto;
            height: fit-content;
            margin-bottom: 30px;
            max-width: 600px;
            /* Adjusted max-width for the main container */
        }

        .quiz-container h2 {
            color: #971426;
        }

        .quiz-container p {
            font-size: 16px; /* Adjusted font size to make it consistent */
            margin-bottom: 10px;
            /* Added margin for better spacing */
        }

        .logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        table{
        width: 100%;
        border-collapse: collapse;
        display: flex-start;
        font-size: 15px;
    
    }
    
    td{
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    
    th {
        background-color: #333;
        color: #fff;
        align-items: center;
        align-self: center;
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }
    

    .mn{
        display: none;
        border: 2px solid #ccc;
        padding: 20px;
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

    #algoTable{
        width: 100%;
    }

        .logo img {
            max-width: 100px;
            max-height: 50px;
        }

        .white {
            color: #971426;
        }

        main {
            width: 80%;
            margin: auto;
        }

        .quiz-container ol {
            padding-left: 10px;
            margin-left: 10px;
            text-align: left;
            margin-top: 0;
        }

        .quiz-container ol li {
            margin-bottom: 10px;
        }

        .submit-button {
            margin-left: 35%;
            background-color: #971426;
            color: #ffffff;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            width: 30%;
        }

        .tab{
            width: 100%;
        }

        .feed-button{
            margin-left: 35%;
            background-color: #971426;
            color: #ffffff;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            display: none;
        }

        .feedback {
            font-weight: bold;
            margin-top: 5px;
        }

        .score {
            color: green;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
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
            z-index: 100;
        } 
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
<header>
    <header class="Nav">
    <a href="../List.php" class="back-button">Back</a>
        <a href="BoothTheo.php">Theory</a>
        <a href="Booth.php" >Simulation</a>
        <a href="BoothEx.php" >Exercise</a>
        <a href="BoothQuiz.php" >Quiz</a>
    </header>
    </header>

    <main><br><br><br>
        <div class="quiz-container">
            <div class="logo">
                <img src="../../../../images/background/kjsieit-logo.svg" alt="Logo 1">
                <img src="../../../../images/background/logo2.png" alt="Logo 2">
            </div>
            <h2>Booth's Algorithm Quiz</h2>
            <div class="quiz">
            <ol>
                <div class="tab"></div>
            </ol>
            <div class="feedBox">
                <button class="submit-button" onclick="submitQuiz(count)">Check Answer</button><br>
                <p class="score"></p><br>
                <a href="boothfeed.php"><button class="feed-button">Submit Feedback</button></a>
            </div>
        </div>
    </main>
    <script src='../../../../formula/Aryan.js'></script>
    <script>

        var questionOption=["What is the value of <b>AC</b> next step to be taken in the below given Booth's Algorithm?",
        "What is the value of <b>Q</b> next step to be taken in the below given Booth's Algorithm?",
        "What is next step to be taken in the below given Booth's Algorithm?"];

        const tab = document.querySelector('.tab');
        var count = createquestion(0);

    </script>

</body>

</html>
