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

   $path = reroading(3);
   include($path."databaseinfo/security/secure.php");
   include($path.'databaseinfo/main/database.php');
   


   if(!((isset($_GET['found']) || isset($_GET['sort']) || isset($_GET['how']) || isset($_GET['which'])) && isset($_GET['what']) )){
    include($path.'databaseinfo/page_setup/eachcount.php');
    include($path.'databaseinfo/fetch/feedfetch.php');
   }
   else{
    include($path.'databaseinfo/search/search_data.php');
   }



    mysqli_close($conn); 
    
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
            justify-items: center;
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
        width: 30%;
    }

    .c{
        width: max-content;
        height: min-content;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 0px auto;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
            text-align: center;
            align-items: center;
            justify-items: center;

    }

    #feedTable{
            width: 95%;
            border-collapse: collapse;
            display: flex-start;
            margin: auto;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: auto;
        }
        
        #feedTable th, td{
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        
        #feedTable td {
            background-color: #971426;
            color: #fff;
            align-items: center;
            border: 1px solid #ccc;
            align-self: center;
        }

        #feedTable tbody td,th{
            width: 13%;
        }

        #feedTable thead td,th{
            width: 13%;
        }

        #feedTable tr,td{
            width: max-content;
        }

        .pages{
            display: inline-flex;
            height: 15%;
            padding-left: 90%;
        }

        .actions{
            display: block;
            justify-items: center;
            align-items: center;
            padding: auto;
            height: 100%;
            width: 100%;
        }

        form{
            margin: 5px;
            display: block;
        }

        label{
            display: inline-block;
        }

        input[type='text'], input[type='number']{
            display: inline-block;
            margin-left: 15px;    
            width: fit-content;
        }

        textarea{
            padding-bottom: 0px;
            display: block;
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
                <h1>FeedBack Edit</h1>
            </div> 
        <section>
        <form method="get" action='../../../databaseinfo/search/search.php'>
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
        <input type='text' name='path' value='feed' id='path' style='display: none;'>
        <input type='submit' name='submit' id='submit'>
        <input type='button' id='cancel' name='cancel' onclick="location.href='review.php';" value="Cancel Search">
            </form>

        </section>
        <section id="aim">
            <table id='feedTable'>
                <thead>
                    <tr>
                        <td> Sr. No. </td>
                        <td> User </td>
                        <td> Experiment </td>
                        <td> Rating </td>
                        <td> Feedback </td>
                        <td> Actions </td>
                    </tr>
                </thead>
                <tbody class='here'></tbody>

            </table>

<div class='pages'>
        <form id="page" method="post">
        <input type='text' value="admin" name='path' id='path' style='display: none;'>
        <label for="options">Page:</label>
        <select id="options" name="options">
            <?php
                include('../../../databaseinfo/page_setup/paging.php');
            ?>
        </select>
    </form>
        </div>

        </section>
        
        <section id='editing'>
            <p>Edit Response</p>
                <form id='edit' method='post' action='../../edit/edit_row.php'>
                    <input type='text' name='path' id='path' value='review' readonly style='display:none;'>
                    <label for='username'> Username: </label>
                    <input type='text' id='username' name='username' readonly value="empty"><br>
                    <label for='exp'> Experiment: </label>
                    <input type='text' name='exp' id='exp' readonly value="what"><br>
                    <label for='rating'> Rating: </label>
                    <input type='number' name='rating' id='rating' min='0' max='15'><br>
                    <label for='feed'> Feedback: </label>
                    <textarea  name='feed' id='feed' maxlength="200"></textarea><br>
                    <input type='submit' id='submit' name='submit' value='Submit'>
                    <input type='button' id='cancel' name='cancel' value="Cancel" onclick="clearForm(form);hide(section)">
                </form>
        
                
        </section>
        
</div>
<div>
    <script src="../../../formula/Aryan.js"></script>
    <script>

            const name = ['logic','booth','res','non']
            const expName = ["Logic Gates and IC","Booth's Algorithm","Restoring Division Algorithm","Non-Restoring Division Algorithm","Encoder and Decoder","MUX and DeMUX"];
            const option = document.getElementById('options');
            const form = document.getElementById('edit');
            const section = document.getElementById('editing');
            const edit_name = document.getElementById('username');
            const edit_exp = document.getElementById('exp');
            const edit_feed = document.getElementById('feed');
            const edit_rating = document.getElementById('rating');
            const search_which = document.getElementById('which');
            const search_how = document.getElementById('how');
            const search_sort = document.getElementById('sort');

            search_which.value = <?php if(isset($_GET['which'])){echo $_GET['which'];} else {echo intval(-1);}?>;
            search_sort.value = <?php if(isset($_GET['sort'])){echo $_GET['sort'];} else {echo "1";}?>;
            search_how.value = <?php if(isset($_GET['how'])){echo $_GET['how'];} else {echo intval(-1);}?>;
            
            option.value = <?php echo intval($_SESSION['page'])?>;
                option.addEventListener('change', () => {
                    document.getElementById('page').submit();
            });

            hide(section);
            var data;
            fetch('../../../databaseinfo/main/data.json').then((response) => response.json()).then((json) => {

                    data = json;
                    var userfeed = document.querySelector('.here');

                    for(let i=0; i<data.length; i++){
                        if(data[i].rating!=0){
                            app_admin(i,data[i].Username,data[i].exp,data[i].rating,data[i].feed,userfeed);
                        }
                    }
                        var element = document.querySelectorAll('.edit');

                        element.forEach(elements => { elements.addEventListener('click', () => {
                                    hide(section);
                                    fetchdata(elements);
                                    reveal(section);
                    
                        })});

            });
                    <?php 
                        if(isset($_SESSION['note'])){ if(!($_SESSION['note'])){
                            echo " alert('Record was not found');";
                            echo "location.href='review.php';";
                        }

                        unset($_SESSION['note']);
                    }
                    ?>
                
                    <?php if(isset($_GET['note'])){
                        
                            $note = $_GET['note'];
                            echo "alert('$note');";

                        if(!(isset($_GET['found']))){

                            echo "location.href='review.php';";
                        }
                        
                    }?>

    </script>

</div>
    </main>
</body>
</html>