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
   include($path.'databaseinfo/main/admin.php');
   include($path.'databaseinfo/helper/help.php');

   if(!((isset($_GET['found']) || isset($_GET['email'])))){
    include($path.'databaseinfo/fetch/adminFetch.php');
   } else {
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

        header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #971426;
            width: 100%;
            padding: 20px;
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            height: 60px;
            z-index: 100;
        }

        .back-button {
            position: absolute;
            left: 20px;
            font-size: medium;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            padding: 5px;
            transition: all 0.4s;
        }

        header a:hover {
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

        input[type='search'], input[type='email'] {
            flex: 1;
            padding: 8px;
            margin-left: 15px;
            width: 200px;  /* Adjusted width */
        }

        input[type='submit'], input[type='button'] {
            margin-left: 15px;
            padding: 10px 20px;
            background-color: #971426;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type='submit']:hover, input[type='button']:hover {
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

        td {
            background-color: #971426;
            color: #fff;
        }

        th{
            color: #971426;
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

    </style>
</head>
<body>
    <header>
        <a href="../../main/interface.php" class="back-button">Back</a>
        <h1>Admin Induction</h1>
    </header>

    <main>
        <section>
            <form method="get" action='../../../databaseinfo/search/search.php'>
                <div class="form-group">
                    <label for='found'>User: </label>
                    <input type='search' id='found' name='found' placeholder="Username">
                </div>
                <div class="form-group">
                    <label for='email'>Email: </label>
                    <input type='email' id='email' name='email' placeholder="Email ID">
                </div>
                <input type='text' name='path' value='req' id='path' style='display: none;'>
                <input type='submit' name='submit' id='submit' value="Submit">
                <input type='button' id='cancel' name='cancel' onclick="location.href='req.php';" value="Cancel Search">
            </form>
        </section>

        <section id="aim">
            <table id='feedTable'>
                <thead>
                    <tr>
                        <td>Sr. No.</td>
                        <td>User</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody class='here'></tbody>
            </table>

            <div class='pages'>
                <form id="page" method="post">
                    <label for="options">Page:</label>
                    <select id="options" name="options">
                        <?php include('../../../databaseinfo/page_setup/paging.php'); ?>
                    </select>
                </form>
            </div>
        </section>

        <a href="#aim" id="scroll" style="display:none"></a>
    </main>

    <script src="../../../formula/Aryan.js"></script>
    <script>
        const option = document.getElementById('options');
        option.value = <?php echo intval($_SESSION['page'])?>;
        option.addEventListener('change', () => {
            document.getElementById('page').submit();
        });

        var data = <?php arrayJS($_SESSION['data']) ?>;
        var userfeed = document.querySelector('.here');

        for (let i = 0; i < data.length; i++) {
            app_join(i, data[i].Username, data[i].email, userfeed);
        }

        <?php 
            if(isset($_SESSION['note']) && !$_SESSION['note']) {
                echo "alert('Record was not found');";
                echo "location.href='req.php';";
                unset($_SESSION['note']);
            }
        ?>

        <?php if(isset($_GET['note'])) {
            $note = $_GET['note'];
            echo "alert('$note');";
            if (!isset($_GET['found'])) {
                echo "location.href='req.php';";
            }
        } ?>

        <?php 
            if(!((isset($_GET['found']) || isset($_GET['email'])))){
            }
            else{
                echo "document.getElementById(scroll).click()";
            }
        
        ?>
    </script>
</body>
</html>
