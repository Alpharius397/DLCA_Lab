<?php 
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

   $level = 3;
   $path = reroading($level);
   include($path."databaseinfo/security/secure_admin.php");
   include($path.'databaseinfo/main/database.php');
   include($path.'databaseinfo/helper/help.php');

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
            width: 80%;
            margin-top: 60px;
        }

        section {
            margin-bottom: 30px;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type='text'], input[type='search'], input[type='number'], textarea, .select{
            width: 40%; /* Adjusted width for smaller boxes */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px ;
        }

        input[type='submit'], input[type='button'],button, input[type='reset'] {
            background-color: #971426;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type='submit']:hover,input[type='button']:hover, button:hover, input[type='reset']:hover {
            background-color: #6d0d1a;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        table td {
            background-color: #971426;
            color: #ffffff;
        }

        th {
            color: #971426;
        }

        html {
            scroll-behavior: smooth;
        }

        .pages {
            text-align: right;
            margin: 20px 0;
        }

        .pages select {
            padding: 5px;
        }

        .actions form {
            display: inline-block;
        }

        #asd,.select_label{
            display: inline-block;
        }

        .select{
            width: 20%;
            display: inline-block;
        }

    </style>
</head>
<body>
<header class="Nav">
        <a href="../../main/interface.php" class="back-button">Back</a>
</header>

    <main>
        <div class="Dhruv">

        <section id="search">
        <h2>Search</h2>
            <form method="get" action="../../../databaseinfo/search/search.php">
                <label for="found">Enter question:</label>
                <input type="search" id="found" name="found" placeholder="Enter question">
                <input type="submit" name="submit" value="Search">
                <input type="button" onclick="location.href='logicq.php';" value="Cancel Search">
            </form>
        </section>
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
        <label for="options" id="asd">Page:</label>
        <select id="options" name="options">
            <?php
                include('../../../databaseinfo/page_setup/paging.php');
            ?>
        </select>
    </form>
        </div>
        
        </section>
        
        <section id='editing'>
            <h2>Edit Response</h2>
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
                    <label for='ans' class="select_label">Answer:</label>
                    <select id='ans' name='ans' class='select' required>   
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
            <h2>Add Question</h2>

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
                <label for='new_ans' class="select_label">Answer:</label>
                <select id='new_ans' name='new_ans' class='select' required>  
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                </select><br>
                <input type='submit' id='submit' name='submit' value='Submit'>
                <input type='button' id='cancel' name='cancel' value="Cancel" onclick="clearForm(new_form);hide(add)"><br>
                
            </form>

            <a href="#search" id="scroll" style="display:none"></a>
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
            var data =<?php arrayLogic($_SESSION['data']);?>;

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

<?php 
                if( isset($_POST['options']) || ((isset($_GET['found'])|| isset($_GET['sort']) || isset($_GET['how']) || isset($_GET['which'])) && isset($_GET['what']))){
                    echo "document.getElementById('scroll').click();";
                }
            ?>

    </script>

</div>
    </main>
</body>
</html>