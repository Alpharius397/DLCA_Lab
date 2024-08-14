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
    include($path.'databaseinfo/main/database.php');
    include($path.'databaseinfo/fetch/logicrandom.php');
    include($path.'databaseinfo/helper/help.php');
    mysqli_close($conn); 

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logic Gates Quiz</title>
    <style>
 body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url("../../../../images/background/red3.jpg") no-repeat center center fixed;
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
            font-size: 16px; 
            margin-bottom: 10px;
        }

        .logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
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
            margin-top: 100px;
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
    </style>
</head>
<body>
<header>
    <header class="Nav">
    <a href="../List.php" class="back-button">Back</a>
        <a href="LogicTheo.php">Theory</a>
        <a href="LogicTable.php" >Simulation</a>
        <a href="LogicEx.php" >Exercise</a>
        <a href="LogicQuiz.php" >Quiz</a>
    </header>
    </header>

    <main><br><br><br>
        <div class="quiz-container">
            <div class="logo">
                <img src="../../../../images/background/kjsieit-logo.svg" alt="Logo 1">
                <img src="../../../../images/background/logo2.png" alt="Logo 2">
            </div>
            <h2>Logic Gates Quiz</h2>
            <ol id='answers'>
               
            </ol>
            <button class="submit-button" onclick="submitQuiz1()">Check Answer</button>
            <p class="score"></p>
            <a href="logicfeed.php"><button class="feed-button">Submit Feedback</button></a>
        </div>
    </main>

    <script src='../../../../formula/Aryan.js'></script>
    <script>
        var answers = questionConstruct(<?php arrayLogic($_SESSION['data']);?>);
        console.log(answers);
        function submitQuiz1() {
            if (answers!=[]){
            ques = ['q1',"q2","q3","q4","q5"];
            let score = 0;
            ques.forEach(question => {
                const selectedOption = document.querySelector(`input[name=${question}]:checked`);
                const selectedOption1 = document.querySelector(`input[name=${question}]`);
                const feedback = selectedOption1.parentElement.querySelector('.feedback');
                if (selectedOption) {
                    const userAnswer = selectedOption.value;
                    const correctAnswer = answers[question];
                    if (userAnswer === correctAnswer) {
                        score++;
                        feedback.textContent = 'Correct Answer';
                        feedback.style.color = 'green';
                    } else {
                        feedback.textContent = 'Incorrect Answer';
                        feedback.style.color = 'red';
                    }
                }
                else{
                        feedback.textContent = 'No Answer Selected';
                        feedback.style.color = 'red';
                    }
            });
            const scoreDisplay = document.querySelector('.score');
            scoreDisplay.textContent = `You scored ${score} out of ${Object.keys(answers).length}`;
            scoreDisplay.style.color = 'green';
            if(score>4){
            document.querySelector('.feed-button').style.display = 'block';
            }
        }}
    </script>

</body>

</html>
