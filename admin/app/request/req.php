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
   


   if(!((isset($_GET['found']) || isset($_GET['email'])))){
    include($path.'databaseinfo/fetch/adminFetch.php');
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
    </header>
        
       

    <main>
        <div class="Dhruv">
            <div class="Aryan">
                <h1>Admin Induction</h1>
            </div> 
        <section>
        <form method="get" action='../../../databaseinfo/search/search.php'>
        <label for='found'>User: </label>
        <input type='search' id='found' name='found' value="<?php if(isset($_GET['found'])){ echo $_GET['found']; }?>" placeholder="Username">
        <label for='email'>Email: </label>
        <input type='email' id='email' name='email' value="<?php if(isset($_GET['email'])){ echo $_GET['email']; }?>" placeholder="Email ID">
        <input type='text' name='path' value='req' id='path' style='display: none;'>
        <input type='submit' name='submit' id='submit'>
        <input type='button' id='cancel' name='cancel' onclick="location.href='req.php';" value="Cancel Search">
            </form>

        </section>
        <section id="aim">
            <table id='feedTable'>
                <thead>
                    <tr>
                        <td> Sr. No. </td>
                        <td> User </td>
                        <td> Email </td>
                        <td> Action </td>
                    </tr>
                </thead>
                <tbody class='here'></tbody>

            </table>

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

        </section>
        
</div>
<div>
    <script src="../../../formula/Aryan.js"></script>
    <script>

            const option = document.getElementById('options');

            option.value = <?php echo intval($_SESSION['page'])?>;
                option.addEventListener('change', () => {
                    document.getElementById('page').submit();
            });
            var data =<?php arrayJS($_SESSION['data']);?>;

                    var userfeed = document.querySelector('.here');

                    for(let i=0; i<data.length; i++){
                            app_join(i,data[i].Username,data[i].email,userfeed);
                    }

                    <?php 
                        if(isset($_SESSION['note'])){ if(!($_SESSION['note'])){
                            echo " alert('Record was not found');";
                            echo "location.href='req.php';";
                        }

                        unset($_SESSION['note']);
                    }
                    ?>
                
                    <?php if(isset($_GET['note'])){
                        
                            $note = $_GET['note'];
                            echo "alert('$note');";

                        if(!(isset($_GET['found']))){

                            echo "location.href='req.php';";
                        }
                        
                    }?>

    </script>

</div>
    </main>
</body>
</html>