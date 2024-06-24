<?php 
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

   $path = reroading(3);
   include($path."databaseinfo/security/secure.php");
   include($path.'databaseinfo/main/database.php');

   if(isset($_POST['options'])){
        $_SESSION['page'] = $_POST['options'];
    }

   if(!(isset($_GET['found']) && isset($_GET['what']))){
        include($path.'databaseinfo/fetch/logicfetch.php');
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
            width: 20%;
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
        
    </header>

    <main>
        <div class="Dhruv">
            <div class="Aryan">
            <h1 style='margin: 5px auto;'>Logic Questions</h1>
            </div> 
        <section>
        <form method="get" action='../../../databaseinfo/search/search.php'>
        <label for='found'>User: </label>
        <input type='search' id='found' name='found' value="<?php if(isset($_GET['found'])){ echo $_GET['found']; }?>" >
        <input type='text' name='path' value='logic' id='path' style='display: none;' readonly>
        <input type='submit' name='submit' id='submit'>
        <input type='button' id='cancel' name='cancel' onclick="location.href='logicq.php';" value="Cancel Search">
            </form>

        <?php if(isset($_GET['search'])){$_SESSION['page']=0 ;} ?>

        </section>
        <section id="aim">
            <table id='feedTable'>
                <thead>
                    <tr>
                        <td> Sr. No. </td>
                        <td> Question </td>
                        <td> Option A </td>
                        <td> Option B </td>
                        <td> Option C </td>
                        <td> Option D </td>
                        <td> Answer </td>
                        <td> Actions </td>
                    </tr>
                </thead>
                <tbody class='here'></tbody>

            </table>

<div class='pages'>
    <form id="page" method="post">
        <input type='text' value="logic-ques" name='path' id='path' style='display: none;'>
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
                    <input type='number' id='index' name='index' style="display: none;">
                    <label for='ques'> Question: </label>
                    <input type='text' id='ques' name='ques' value="empty" required><br>
                    <label for='opt1'> Option 1: </label>
                    <input type='text' name='opt1' id='opt1'value="what" required><br>
                    <label for='opt2'> Option 2: </label>
                    <input type='text' name='opt2' id='opt2'value="what" required><br>
                    <label for='opt3'> Option 3: </label>
                    <input type='text' name='opt3' id='opt3'value="what" required><br>
                    <label for='opt4'> Option 4: </label>
                    <input type='text' name='opt4' id='opt4'value="what" required><br>
                    <label for='ans'> Answer: </label>
                    <select id='ans' name='ans' required>  
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select><br>
                    <input type='text' name='path' value='logicq' id='path' style='display: none;' readonly>
                    <input type='submit' id='submit' name='submit' value='Submit'>
                    <input type='button' id='cancel' name='cancel' value="Cancel" onclick="clearForm(form);hide(section)">
                </form>
        
                
        </section>
        <section id='add'>
            <p>Add Question</p>

            <form action='../../add/add_row.php' method='post' id='new'>
                <label for='quest'>Question:</label>
                <input type='text' name='quest' id='quest' placeholder="Enter a Logic Gate Question" required><br>
                <label for='o1'>First Option:</label>
                <input type='text' name='o1' id='o1' placeholder="First Option" required><br>
                <label for='o2'>Second Option:</label>
                <input type='text' name='o2' id='o2' placeholder="Second Option" required><br>
                <label for='o3'>Third Option:</label>
                <input type='text' name='o3' id='o3' placeholder="Third Option" required><br>
                <label for='o4'>Fourth Option:</label>
                <input type='text' name='o4' id='o4' placeholder="Fourth Option" required><br>
                <label for='new_ans'>Answer:</label>
                <select id='new_ans' name='new_ans' required>  
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                </select><br>
                <input type='submit' id='submit' name='submit' value='Submit'>
                <input type='button' id='cancel' name='cancel' value="Cancel" onclick="clearForm(new_form);hide(add)"><br>
                
            </form>


        </section>
</div>
<div>
    <script src="../../../formula/Aryan.js"></script>
    <script>

            const name = ['logic','booth','res','non']
            const expName = ["Logic Gates and IC","Booth's Algorithm","Restoring Division Algorithm","Non-Restoring Division Algorithm"];
            var option = document.getElementById('options');
            const form = document.getElementById('edit');
            const section = document.getElementById('editing');
            const edit_index = document.getElementById('index');
            const edit_ques = document.getElementById('ques');
            const edit_opt1 = document.getElementById('opt1');
            const edit_opt2 = document.getElementById('opt2');
            const edit_opt3 = document.getElementById('opt3');
            const edit_opt4 = document.getElementById('opt4');
            const edit_ans = document.getElementById('ans');
            const new_form = document.getElementById('new');
            const add = document.getElementById('add');
            
            option.value = <?php echo intval($_SESSION['page'])?>;
                option.addEventListener('change', () => {
                    document.getElementById('page').submit();
            });

            hide(section);
            var data;
            fetch('../../../databaseinfo/main/answer.json').then((response) => response.json()).then((json) => {

                    data = json;
                    var userfeed = document.querySelector('.here');

                    for(let i=0; i<data.length; i++){
                        console.log(data)
                            app_logic(i,data[i].index,data[i]['Question'],data[i]['options'],data[i]['ans'],userfeed);
                    }
                        var element = document.querySelectorAll('.edit');

                        element.forEach(elements => { elements.addEventListener('click', () => {
                                    hide(section);
                                    fetchLogic(elements);
                                    reveal(section);
                    
                        })});

                    });
            
                    <?php 
                        if(isset($_SESSION['note'])){ if(!($_SESSION['note'])){
                            echo " alert('Question not found');";
                            echo "location.href='logicq.php';";
                        }

                        unset($_SESSION['note']);
                    }
                    ?>
                
                    <?php if(isset($_GET['note'])){
                            $note = $_GET['note'];
                                echo "alert('$note');";
                        if(isset($_GET['found'])){

                        }
                        else{
                            echo "location.href='logicq.php';";
                        }
                        
                    }?>

    </script>

</div>
    </main>
</body>
</html>