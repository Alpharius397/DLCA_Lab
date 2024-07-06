<?php
session_start();

function reroading($level)
{
    $path = '';

    for ($i = 0; $i < $level; $i++) {
        $path .= '../';
    }

    return $path;
}

$level = 3;
$path = reroading($level);

include($path."databaseinfo/security/secure_admin.php");
include($path."databaseinfo/main/database.php");
include($path.'databaseinfo/page_setup/eachcount.php');
include($path."databaseinfo/fetch/expFetch.php");
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
            margin: 0px auto;
            width: 80%;


        }

        section {
            margin-top: 30px;
            margin-bottom: 30px;
        }


        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .Dhruv {
            margin-top: 100px;
        }

        .Aryan {
            text-align: center;
        }


        .scrolls {
            display: inline-flex;
        }

        .white{
            cursor: pointer;
            width: 50px;
            height: 50px;
            color: grey;
            font-size: 20px;
            background: none;
            transition: 0.4s ease;
            border: 0px;
            margin-top: 10px;
            border-radius: 50px;
        }

        .white:hover {
            color: #fff;
            background: grey;
        }

        .black{
            cursor: default;
            width: 50px;
            height: 50px;
            color: white;
            font-size: 20px;
            background: none;
            transition: 0.4s ease;
            border: 0px;
            margin-top: 10px;
            border-radius: 50px;
            user-select: none;
        }

        h1 {
            margin: 10px;
            min-width: 500px;
            max-width: 500px;
        }

        :root{
            --arc:0deg;
            --color:red;
        }

        .circular-progress{
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            background: conic-gradient(var(--color) var(--arc), #ededed 0deg);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 1s ease-out;
        }

        .circular-progress::before{
            content: "";
            position: absolute;
            height: 130px;
            width: 130px;
            border-radius: 50%;
            background-color: #fff;
        }

        .progress-value{
            position: relative;
            font-size: 40px;
            font-weight: 600;
            color: rgb(94, 94, 94);
            transition: 1s ease-out;
        }

        .overall{
            font-size: 20px;
            width: 100%;
            color: #7d2ae8;
            display: block;
            margin: auto;
            text-align:center;
        }

        .sect {
            display: flex;
            width: 100%;
        }

        .charts {
            display: block;
            justify-content: center;
            align-items: center;
        }

        #avg {
            margin: auto;
            margin-right: 0px;
            width: max-content;
            display: block;
            justify-content: center;
            align-items: center;
            margin-left: 10px;
        }

        #comp {
            width: 80%;
            margin: auto;
            margin-left: 0px;
        }

        #total-done {
            display: flex;
            margin: auto;
            margin-top: 10px;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
            margin: 5px;
            height: 80%;
        }

        tr {
            width: 80%;
            margin: 15px;
        }

        .stars-l{
            width: 10%;
            padding: 0px;
        }

        .stars-r{
            width: 10%;
            padding-right: 30px;
        }

        .bar {
            background-color: #f1f1f1;
            width: 100%;
            height: 40px;
            margin: 0px;
            padding: 0px;
            border-radius: 40px;
        }

        .bar-0 {
            width: 0%;
            height: 100%;
            margin: 0px;
            background-color: red;
            z-index: 1;
            transition: 0.6s ease-out;
            border-radius: 40px;
        }

        .bar-1 {
            width: 0%;
            height: 100%;
            margin: 0px;
            background-color: orange;
            z-index: 1;
            transition: 0.6s ease-out;
            border-radius: 40px;
        }

        .bar-2 {
            width: 0%;
            height: 100%;
            margin: 0px;
            background-color: lawngreen;
            z-index: 1;
            transition: 0.6s ease-out;
            border-radius: 40px;
        }

        .bar-3 {
            width: 0%;
            height: 100%;
            margin: 0px;
            background-color: green;
            z-index: 1;
            transition: 0.6s ease-out;
            border-radius: 40px;
        }



        .real-star{
            color:gold;
            margin: 0px;
            width: min-content;
            height: min-content;
            display: inline-flex;
        }

        .mid{
            width: 80%;
        }

        #currPage{
            width: 70%;
        }
    </style>
</head>

<body>
    <header class="Nav">
        <a href="../../main/interface.php" class="back-button">Back</a>
        <a href="analysis.php">Feedback Analysis</a>
        <a href="review.php">Feedback Edit</a>
    </header>

    <main>
        <div class="Dhruv">
            <div class="Aryan">
                <div class="scrolls">
                    <button class="fa-solid fa-arrow-left black" id="left"></button>
                    <h1 id='currPage'>Logic Gates and IC</h1>
                    <button class="fa-solid fa-arrow-right white" id="right"></button>

                </div>
                <div class='charts' id='total-done'>
                    <canvas id="rating" style="width:70%;height: 300px;min-width:700px;max-height:350px;"></canvas>
                </div>
            </div>
            <section id="aim">
                <h2>Detailed Analysis</h2>
                <div class='sect'>
                    <div class='charts' id='comp'>

                        <table id='rating_review'>
                            <tr>
                                <th class='stars-l'>12★ - 15★</th>
                                <th class="mid">
                                    <div class='bar'><div class='bar-3'></div></div>
                                </th>
                                <th class='stars-r' id='r3'>12</th>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <th class='stars-l'>9★ - 11★</th>
                                <th class="mid">
                                    <div class='bar'><div class='bar-2'></div></div>
                                </th>
                                <th class='stars-r' id='r2'>12</th>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <th class='stars-l'>6★ - 8★</th>
                                <th class="mid">
                                    <div class='bar'><div class='bar-1'></div></div>
                                </th>
                                <th class='stars-r' id='r1'>12</th>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <th class='stars-l'>3★ - 5★</th>
                                <th class="mid">
                                    <div class='bar'><div class='bar-0'></div></div>
                                </th>
                                <th class='stars-r' id='r0'>12</th>
                            </tr>
                        </table>
                    </div>
                    <div class='charts' id='avg'>
                    <div class="circular-progress">
                        <span class="progress-value"></span>
            </div>
                        <span class="overall">Score</span>
                    </div>
                </div>
            </section>

        </div>
        <div>
            <script src="../../../formula/Aryan.js"></script>
            <script src="https://kit.fontawesome.com/9709fae26f.js" crossorigin="anonymous"></script>
            <script src="../../../formula/Chart.js"></script>
            <script>
                const expName = ["Logic Gates and IC","Booth's Algorithm","Restoring Division Algorithm","Non-Restoring Division Algorithm","Encoder and Decoder","MUX and DeMUX"];

                const specColors = ['red', 'green', 'blue', 'orange', 'purple','black'];
                const current = document.getElementById('currPage');
                const left = document.getElementById('left');
                const right = document.getElementById('right');
                const limit = expName.length - 1;
                const chart = document.getElementById('rating').getContext('2d');
                const chartDiv2 = document.getElementById('comp');
                const chartDiv1 = document.getElementById('total-done');
                const score = document.querySelector('.progress-value');
                const root = document.documentElement;
                const pie = new Chart(chart, {
                    type: 'pie',
                    options: {
                        animation: {
                            animateRotate: true
                        }
                    },
                    data: {
                        labels: ["Users who haven't performed the experiment", 'Users who performed the experiment'],
                        datasets: [{
                            data: [0, 0],
                            backgroundColor: [
                                'grey',
                                'grey',
                            ],
                            hoverOffset: 4
                        }]
                    }
                });

                var progress;

                function curr_user(choice){
                    switch (choice) {
                        case 0:
                            return [<?php echo intval($_SESSION['logic']['count']); ?>, <?php echo round($_SESSION['logic']['score']); ?>];
                            break;
                        case 1:
                            return [<?php echo intval($_SESSION['booth']['count']); ?>, <?php echo round($_SESSION['booth']['score']); ?>];
                            break;
                        case 2:
                            return [<?php echo intval($_SESSION['res']['count']); ?>, <?php echo round($_SESSION['res']['score']); ?>];
                            break;
                        case 3:
                            return [<?php echo intval($_SESSION['non']['count']); ?>, <?php echo round($_SESSION['non']['score']); ?>];
                            break;
                        case 4:
                            return [<?php echo intval($_SESSION['encode']['count']); ?>, <?php echo round($_SESSION['encode']['score']); ?>];
                            break;
                        case 5:
                            return [<?php echo intval($_SESSION['mux']['count']); ?>, <?php echo round($_SESSION['mux']['score']); ?>];
                    }
                };

                function expFeed(choice){

                    switch(choice){
                        case 0:
                            return {3:<?php echo intval($_SESSION['expRate'][0][0]);?>,6:<?php echo intval($_SESSION['expRate'][0][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][0][2]);?>,12:<?php echo intval($_SESSION['expRate'][0][3]);?>
                            }; break;

                        case 1:
                            return {3:<?php echo intval($_SESSION['expRate'][1][0]);?>,6:<?php echo intval($_SESSION['expRate'][1][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][1][2]);?>,12:<?php echo intval($_SESSION['expRate'][1][3]);?>
                            }; break;

                        case 2:
                            return {3:<?php echo intval($_SESSION['expRate'][2][0]);?>,6:<?php echo intval($_SESSION['expRate'][2][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][2][2]);?>,12:<?php echo intval($_SESSION['expRate'][2][3]);?>
                            }; break;

                        case 3:
                            return {3:<?php echo intval($_SESSION['expRate'][3][0]);?>,6:<?php echo intval($_SESSION['expRate'][3][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][3][2]);?>,12:<?php echo intval($_SESSION['expRate'][3][3]);?>
                            }; break;

                        case 4:
                            return {3:<?php echo intval($_SESSION['expRate'][4][0]);?>,6:<?php echo intval($_SESSION['expRate'][4][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][4][2]);?>,12:<?php echo intval($_SESSION['expRate'][4][3]);?>
                            }; break;

                        case 5:
                            return {3:<?php echo intval($_SESSION['expRate'][5][0]);?>,6:<?php echo intval($_SESSION['expRate'][5][1]);?>,
                                9:<?php echo intval($_SESSION['expRate'][5][2]);?>,12:<?php echo intval($_SESSION['expRate'][5][3]);?>
                            }; break;
                    }

                }

                function chartPieMake() {
                    var total_user = <?php echo intval($_SESSION['count']); ?>;
                    var current = curr_user(choice);
                    

                    pie.data.datasets[0].data = [total_user-current[0],current[0]];
                    pie.data.datasets[0].backgroundColor[1] = specColors[choice];
                    pie.update();

                    angle_calculate(current[1]);
                }               

                var choice = 0;
                switchOffArrow(left);
                chartPieMake();
                chartVerticalMake(expFeed(choice));

                right.addEventListener('click', () => {
                    choice = min(limit, choice + 1);
                    current.innerHTML = `${expName[choice]}`;
                    switchOnArrow(left);
                    clearInterval(progress);

                    if (choice == limit) {
                        switchOffArrow(right);
                    }
                    
                    chartPieMake();
                    chartVerticalMake(expFeed(choice));

                });

                left.addEventListener('click', () => {
                    choice = max(0, choice - 1);
                    current.innerHTML = `${expName[choice]}`;
                    switchOnArrow(right);
                    clearInterval(progress);

                    if (choice == 0) {
                        switchOffArrow(left);
                    }

                    chartPieMake();
                    chartVerticalMake(expFeed(choice));
                });


                <?php if(isset($_GET['note'])){
                        
                        $note = $_GET['note'];
                        echo "alert('$note');";

                    if(!(isset($_GET['found']))){

                        echo "location.href='analysis.php';";
                    }
                    
                }?>

            </script>
        </div>
    </main>
</body>

</html>

