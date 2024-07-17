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
        var_dump($_POST);
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }

        html {
            scroll-behavior: smooth;
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
            margin-top: 100px;
            width: 80%;
        }

        section {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        label {
            width: 100px;
        }

        input[type='search'], input[type='email'], input[type='number'], select {
            flex: 1;
            padding: 8px;
            margin-left: 10px;
            max-width: 300px; /* Adjusted max-width */
        }

        input[type='submit'], button, input[type='button'] {
            margin: 10px;
            padding: 10px 20px;
            background-color: #971426;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type='submit']:hover, button:hover, input[type='button']:hover {
            background-color: #730d1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            color: #971426;
        }

        td{
            background-color: #971426;
            color: #fff;
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

        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-top: 10px;
            resize: none;
        }

        #edit-heading {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
            background-color: #971426;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px 10px 0 0;
        }

        #editing {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
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
                    <div class="form-group">
                        <label for='found'>User: </label>
                        <input type='search' id='found' name='found' placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for='which'>Experiment: </label>
                        <select id='which' name='which'>
                            <option value="-1">None</option>
                            <option value="0">Logic Gates and IC</option>
                            <option value="1">Booth's Algorithm</option>
                            <option value="2">Restoring Division Algorithm</option>
                            <option value="3">Non-Restoring Division Algorithm</option>
                            <option value="4">Encoder and Decoder</option>
                            <option value="5">MUX and DeMUX</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for='how'>Rating: </label>
                        <select id='how' name='how'>
                            <option value="-1">None</option>
                            <option value="3">3-5</option>
                            <option value="6">6-8</option>
                            <option value="9">9-11</option>
                            <option value="12">12-15</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for='sort'>Sort by: </label>
                        <select id='sort' name='sort'>
                            <option value="0">Oldest</option>
                            <option value="1">Latest</option>
                        </select>
                    </div>
                    <input type='text' name='path' value='feed' id='path' style='display: none;'>
                    <input type='submit' name='submit' id='submit' value="Submit">
                    <input type='button' id='cancel' name='cancel' onclick="location.href='review.php';" value="Cancel Search">
                </form>
            </section>
            <section id="aim">
                <table id='feedTable'>
                    <thead>
                        <tr>
                            <td>Sr. No.</td>
                            <td>User</td>
                            <td>Experiment</td>
                            <td>Rating</td>
                            <td>Feedback</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody class='here'></tbody>
                </table>
                <div class='pages'>
                    <form id="page" method="post">
                        <input type='text' value="admin" name='path' id='path' style='display: none;'>
                        <label for="options">Page:</label>
                        <select id="options" name="options">
                            <?php include('../../../databaseinfo/page_setup/paging.php'); ?>
                        </select>
                    </form>
                </div>
            </section>
            <section id='editing'>
                <h2 id="edit-heading">Edit Response</h2>
                <form id='edit' method='post' action='../../edit/edit_row.php'>
                    <input type='text' name='path' id='path' value='review' readonly style='display:none;'>
                    <div class="form-group">
                        <label for='username'>Username: </label>
                        <input type='text' id='username' name='username'>
                    </div>
                    <div class="form-group">
                        <label for='exp'>Experiment: </label>
                        <input type='text' name='exp' id='exp'>
                    </div>
                    <div class="form-group">
                        <label for='rating'>Rating: </label>
                        <input type='number' name='rating' id='rating' min='0' max='15'>
                    </div>
                    <div class="form-group">
                        <label for='feed'>Feedback: </label>
                        <textarea name='feed' id='feed' maxlength="200"></textarea>
                    </div>
                    <input type='submit' id='submit' name='submit' value='Submit'>
                    <input type='button' id='cancel' name='cancel' value="Cancel" onclick="clearForm(form);hide(section)">
                </form>
            </section>

            <a href="#aim" id="scroll" style="display:none"></a>
            <a href="#editing" id="scroll_edit" style="display:none"></a>

        </div>
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
                    document.getElementById('scroll').click();
            });

            hide(section);
            var data =<?php arrayJS($_SESSION['data']);?>

            var userfeed = document.querySelector('.here');

            for(let i=0; i<data.length; i++){
                if(data[i].rating!=0){
                    app_admin(i,data[i].Username,data[i].exp,data[i].rating,data[i].feed,userfeed);
                }
            }

            var element = document.querySelectorAll('.edit');

            element.forEach(elements => { 
                elements.addEventListener('click', () => {
                    hide(section);
                    fetchdata(elements);
                    document.getElementById('scroll_edit').click();
                    reveal(section);
                })
            });

            <?php if(isset($_SESSION['note'])){ 
                if(!($_SESSION['note'])){
                    echo " alert('Record was not found');";
                    echo "location.href='review.php';";
                }
                unset($_SESSION['note']);
            }?>

            <?php if(isset($_GET['note'])){
                $note = $_GET['note'];
                echo "alert('$note');";

                if(!(isset($_GET['found']))){
                    echo "location.href='review.php';";
                }
            }?>

            <?php 
                if( isset($_POST['options']) || ((isset($_GET['found'])|| isset($_GET['sort']) || isset($_GET['how']) || isset($_GET['which'])) && isset($_GET['what']))){
                    echo "document.getElementById('scroll').click();";
                }
            ?>
        </script>
    </main>
</body>
</html>
