<?php 
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

   if(isset($_POST['options'])){
        $_SESSION['page'] = $_POST['options'];
    }

    $level = 3;
    $path = reroading($level);
   include($path."databaseinfo/security/secure_admin.php");
   include($path.'databaseinfo/main/database.php');
   include($path.'databaseinfo/helper/help.php');
   


   if(!((isset($_GET['found']) || isset($_GET['sort']) || isset($_GET['how']) || isset($_GET['which'])) && isset($_GET['what']) )){
    include($path.'databaseinfo/page_setup/eachcount.php');
    include($path.'databaseinfo/fetch/feedfetch.php');
   }
   else{
    include($path.'databaseinfo/search/search_data.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Ratings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("../../../images/background/feed1.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            flex-direction: column;
            min-height: 100vh;
        }

        .feedback-container {
            width: 100%;
            margin: auto;
            margin-top: 5%;
            display: flex;
        }

        .userfeedback {
            padding: 10px;
            display: inline-block;
            background-color: rgba(246, 246, 246, 0.8);
            width: 70%;
            margin: auto;
            margin-bottom: 7%;
        }

        .userfeedback h2{
            margin: 10px;
            color: #971426;
            text-align: center;
            border: 0px solid #ccc;
            border-radius: 8px;

        }

        .user{
            font-size: 18px;
            font-weight: bold;
            color:black;
            padding-left: 1px;
            padding-right: 1px;
            display: inline-block;
        }
        
        .one{
            border: 1px solid black;
            border-radius: 8px;
            padding: 10px;
            margin: 10px;
        }
        .rate {
            color: #ff9800; /* Orange color for rating */
            font-size: 18px;
            display: inline-block;
        }

        .exp{
            display: inline-block;
            font-style: italic;
            color: grey;
            font-size: 18px;
            font-weight: 500;
        }

        .feed{
            display: inline-block;
            padding-left: 15px;
            margin-top: 5px;
        }

        .main{
            margin: auto;
            height: 20%;
        }

        .chart1 h2{
            margin: 10px;
            color: #971426;
            text-align: center;
        }


        .chart1{
            color: #971426;
            background-color: rgba(246, 246, 246, 0.8); 
            border-radius: 10px;
            margin: auto;
            width: 60%;
            margin-top: 5%;
            padding: 10px;
        }

        header {
            display: flex;
            background-color: #971426; 
            padding: 20px;
            color: #ffffff;
            width: 100%;
            box-sizing: border-box;
        }
        
        header h4{
            margin: auto;
            text-align: center;
        }

        header a{
            text-decoration: none;
            font-weight: bold;
            color: #ffffff;
        }

        #rating{
            padding: 5%;
            margin: auto;
        }

        #options{
            border-radius: 4px;
            height: max-content;
            font-size:medium;

        }

        label{
            align-items: flex-end;
            font-weight:bold;
            color: #971426;
        }

        .pages{
            display: inline-block;
            height: 15%;
            padding-left: 85%;
        }

        .search{
            display:flex;
            align-items:center;
            align-self: center;
            justify-content: space-evenly;
            justify-items: center;
        }

        input,select{
            margin: 5px;
            border-radius: 50px;
            padding: 5px;
        }

        button{
            width: 200px;
            height: 30px;
            margin: auto;
            border-radius: 50px;
            color:#971426;
            border: 1px solid red;
        }

        button:hover{
            width: 200px;
            display: inline-block;
            height: 30px;
            border-radius: 50px;
            color:#ffffff;
            background-color: #971426;
            border: 1px solid white;
        }

        #options{
            display: inline-flex;
            height: 30px;
            font-size: 15px;
            border-radius: 15px ;
        }

        .button{
            display: flex;
            padding: auto;
            align-items: center;
            height: 60px;
            justify-content: space-between;
        }
        
        #submit{
            margin-right: 5%;
        }

        #cancel{
            margin-left: 5%;
        }
    </style>
</head>

<body>
    <header>
    <a href="../../main/interface.php" class="back-button">Back</a>
    <h4>Comments</h4>
    <a style="-ms-user-select: none;user-select: none;color: #971426;" class="white" >Back</a>
    </header>
<main>
    <div class="main">
        
    <div class="chart1">
    <h2>Overall Review</h2>
   <canvas id="rating" style="width:70%;max-width:700px">
        </canvas>
    </div>
    <div class="feedback-container">
        
        <div class="userfeedback">
            <h2>Student FeedBack</h2>
            <div class='here'>
            
            <br>
            <div class='search'>
            <form method="get" action='../../../databaseinfo/search/search.php' id="ss">
        <label for='found'>User: </label>
        <input type='search' id='found' name='found' value="<?php if(isset($_GET['found'])){ echo $_GET['found']; }?>" placeholder="Username">
        <label for='which'>Experiment: </label>
        <select id='which' name='which' value="<?php if(isset($_GET['which'])){ echo $_GET['which']; }?>">
        <option value="-1">None</option>
            <option value="0">Logic Gates and IC</option>
            <option value="1">Booth's Algorithm</option>
            <option value="2">Restoring Division Algorithm</option>
            <option value="3">Non-Restoring Division Algorithm</option>
            <option value="4">Encoder and Decoder</option>
            <option value="5">MUX and DeMUX</option>
        </select>
        <label for='how'>Rating: </label>
        <select id='how' name='how' value="<?php if(isset($_GET['how'])){ echo $_GET['how']; }?>">
            <option value="-1">None</option>
            <option value="3">3-5</option>
            <option value="6">6-8</option>
            <option value="9">9-11</option>
            <option value="12">12-15</option>
        </select>
        <label for='sort'>Sort by: </label>
        <select id='sort' name='sort' value="<?php if(isset($_GET['sort'])){ echo $_GET['sort']; }?>">
            <option value="0">Oldest</option>
            <option value="1">Latest</option>
        </select>
        <input type='text' name='path' value='feed-student' id='path' style='display: none;'></form></div>
        <div class='button'>
        <button name='submit' id='submit' value="Begin Search" onclick="document.getElementById('ss').submit()">Search</button>
        <button id='cancel' name='cancel' onclick="location.href='feed.php';" value="Cancel Search">Cancel</button>
            
    </div>
    <br>
        </div>
        <div class='pages'>
        <form id="page" method="post">
        <label for="options">Page:</label>
        <select id="options" name="options">
            <?php
                include('../../../databaseinfo/page_setup/paging.php');
            ?>
        </select>
    </form>
        </div>
    </div>
    </div>
    </div>
</main>

<a href="#submit" id="scroll" style="display:none"></a>
</body>

</html>

<script src='../../../formula/Aryan.js'></script>
<script src="../../../formula/Chart.js"></script>
    <script> 
            const search_which = document.getElementById('which');
            const search_how = document.getElementById('how');
            const search_sort = document.getElementById('sort');

            search_which.value = <?php if(isset($_GET['which'])){echo $_GET['which'];} else {echo intval(-1);}?>;
            search_sort.value = <?php if(isset($_GET['sort'])){echo $_GET['sort'];} else {echo "1";}?>;
            search_how.value = <?php if(isset($_GET['how'])){echo $_GET['how'];} else {echo intval(-1);}?>;
            
            var option = document.getElementById('options');
            
            option.value = <?php echo intval($_SESSION['page'])?>;
            option.addEventListener('change', () => {
                document.getElementById('page').submit();
            });

            
            var data =<?php arrayJS($_SESSION['data']);?>;

                    var boothrat=<?php echo round($_SESSION['booth']['score']) ?>,restrat=<?php echo round($_SESSION['res']['score']) ?>,
                    nonrestrat=<?php echo round($_SESSION['non']['score']) ?>,logicrat=<?php echo round($_SESSION['logic']['score']) ?>,
                    encoderat=<?php echo round($_SESSION['encode']['score']) ?>,muxrat=<?php echo round($_SESSION['mux']['score']) ?>;

                    var logic = "Logic Gates and IC: "+<?php echo $_SESSION['logic']['count']; ?>;
                    var booth = "Booth's Algorithm: "+<?php echo $_SESSION['booth']['count']; ?>;
                    var rest = "Restoring Division Algorithm: "+<?php echo $_SESSION['res']['count']; ?>;
                    var nonrest = "Non-Restoring Division Algorithm: "+<?php echo $_SESSION['non']['count']; ?>;
                    var encode = "Encoder and Decoder: "+<?php echo $_SESSION['encode']['count']; ?>;
                    var mux = "MUX and DeMUX: "+<?php echo $_SESSION['mux']['count']; ?>

                    var xValues = [logic,booth,rest,nonrest,encode,mux];   
                    const expName = ["Logic Gates and IC","Booth's Algorithm","Restoring Division Algorithm","Non-Restoring Division Algorithm","Encoder and Decoder","MUX and DeMUX"];
                    var userfeed = document.querySelector('.here');

                    for(let i=0; i<data.length; i++){
                        if(data[i].rating!=0){
                            app(data[i].Username,data[i].rating,expName[data[i].exp],data[i].feed,userfeed);
                        }

                    }
                    
                    new Chart("rating", {
                    type: "bar",
                    
                    data: {
                        labels:['Experiments'],
                        datasets: [{
                        backgroundColor: 'red',
                        data: [logicrat],
                        label: logic
                        },{
                        backgroundColor: 'green',
                        data: [boothrat],
                        label: booth
                        },{
                        backgroundColor: 'blue',
                        data: [restrat],
                        label: rest
                        },{
                        backgroundColor: 'orange',
                        data: [nonrestrat],
                        label: nonrest
                        },{
                        backgroundColor: 'purple',
                        data: [encoderat],
                        label: encode
                    },{
                        backgroundColor: 'black',
                        data: [muxrat],
                        label: mux
                    }]
                    },
                    options: {
                                layout: {padding: {top:10}},
                                legend: { display: true, position: 'top', fontsize: 45, fontS: 'bold' },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Experiments',
                                            fontColor: '#911',
                                            fontFamily: 'Comic Sans MS',
                                            fontSize: 25,
                                            fontStyle: 'bold',

                                        },
                                        ticks: {
                                            autoskip: false,
                                            beginAtZero: true

                                        },
                                    }],
                                    yAxes: [{
                                        display: true,
                                        scaleLabel: {
                                            display: true,
                                            labelString: 'Ratings',
                                            fontColor: '#191',
                                            fontFamily: 'Comic Sans MS',
                                            fontSize: 25,
                                            fontStyle: 'bold',
                                        },

                                        ticks: {
                                            autoskip: false,
                                            beginAtZero: true
                                        },
                                    }]
                                }
                            }
                    });

                    <?php 
                        if(isset($_SESSION['note'])){ if(!($_SESSION['note'])){
                            echo " alert('Record was not found');";
                            echo "location.href='feed.php';";
                        }

                        unset($_SESSION['note']);
                    }
                    ?>
                
                    <?php if(isset($_GET['note'])){
                        
                            $note = $_GET['note'];
                            echo "alert('$note');";

                        if(!(isset($_GET['found']))){

                            echo "location.href='feed.php';";
                        }
                        
                    }?>

<?php 
                if( isset($_POST['options']) || ((isset($_GET['found'])|| isset($_GET['sort']) || isset($_GET['how']) || isset($_GET['which'])) && isset($_GET['what']))){
                    echo "document.getElementById('scroll').click();";
                }
            ?>
   </script>
</body>
</html>


