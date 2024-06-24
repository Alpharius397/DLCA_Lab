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
   $_SESSION['exp'] = 'booth';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
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

        form {
            width: 70%;
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: 0.6s ease-out;
            
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        #username, #email {
            text-align:left;
            margin: 10px;
            display: inline-block;
        }
        
        textarea{
            width: 97%;
            padding: 8px;
            font-family: Arial, sans-serif;
            margin: 8px 0px 15px;
            border: 3px solid  #454242a9;
            border-radius: 5px;
            height: 20px;
            text-align:left;
        }

        .sub{
            margin: auto;
            display: flex;
            width: 80%;
            padding-top: 10px;
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

        }

        header a {
            margin: 15px;
            color: #ffffff;
            text-decoration: none;
            padding: 5px;
            transition: all 0.4s;
        }
        
        input[type="submit"] {
            background-color: #971426;
            color: #ffffff;
            padding: 10px 20px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            margin: auto;
        }

        #error{
            margin: auto;
            text-align: center;
            width: 100%;
            padding: 8px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .rating {
            width: 80%;
            margin: 5px;
            text-align:justify;
            display: flex;
            border: 3px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 0 auto;
            margin-bottom: 15px;
        }

        .star{
            margin: 5px;
            text-align: center;
        }



        .star input[type="radio"] {
            display: none;
        }

        .star input[type="radio"] {
            display: none;
        }

        .star label {
            font-size: 35px;
            color: #ccc;
            cursor: pointer;
            display: inline-block; 
            text-align: center;
            margin: 5px;
            -ms-user-select: none;
            user-select: none;
        }

        .star label:before {
            content: '\2605'; 
            display: block;
        }
        
        h2{
            width: 80%;
        }
    </style>
</head>
<body>
<header>
        <a href="../../../main/VLab.php" class="back-button">Back</a>
        <h2 style="text-align:center;">Booth's Algorithm</h2> 
        <a style="-ms-user-select: none;user-select: none;color: #971426;" class="white" >Back</a>
    </header>
    
    <main><br><br><br>

    <form action="../../../../databaseinfo/feedback/feedback.php" method="post" id="feedbackForm" onsubmit="return validate();">
        <label for="name">Username:<p id= "username"> <?php echo $_SESSION['user']?></p></label>
        

        <label for="name">Email:<p id = "email"><?php echo $_SESSION['email'] ?></p></label>
        
        <label for="feed">Feedback</label>
        <div class="rating">
            <ol>
                <li>
                    <p>How would you rate your overall experience with this virtual lab experiment?</p>
                    <div class="star">
              
                           <input type="radio" name="q1" value="1" id="s1"> <label for="s1" id="l1"></label>
                        <input type="radio" name="q1" value="2" id="s2"> <label for="s2" id="l2"></label>
                        <input type="radio" name="q1" value="3" id="s3"> <label for="s3" id="l3"></label>
                        <input type="radio" name="q1" value="4" id="s4"> <label for="s4" id="l4"></label>
                        <input type="radio" name="q1" value="5" id="s5"> <label for="s5" id="l5"></label>
                    </div>
                </li><br>
                <li>
                    <p>Were you able to understand each steps of the given algorithm?</p>
                    <input type="radio" name="q2" value="5" > Yes, I understood each step clearly.<br>
                    <input type="radio" name="q2" value="4"> I understood the steps, but some parts were unclear.<br>
                    <input type="radio" name="q2" value="3"> I found it somewhat challenging to understand the steps.<br>
                    <input type="radio" name="q2" value="2"> No, I had difficulty understanding most of the steps.<br>
                    <input type="radio" name="q2" value="1"> I did not understand any of the steps.<br>
                </li><br>
                <li>
                    <p>Were you able to solve the excerise provided with the experiment?</p>
                    <input type="radio" name="q3" value="5"> Yes, was able to solve the excerise without any diffculty.<br>
                    <input type="radio" name="q3" value="4"> Yes, was able to solve the excerise some diffculty.<br>
                    <input type="radio" name="q3" value="3"> Yes, was able to solve the excerise  with some aid .<br>
                    <input type="radio" name="q3" value="2"> No, was not able to solve the excerise.<br>
                    <input type="radio" name="q3" value="1"> Didn't attempted the excerise.<br>
                </li><br>
            </ol>
    </div><br>

        <label for="feedback">Additional Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" maxlength="250"></textarea>
        <div class = "sub">
        <input type="submit" value="Submit" id="submit"></div><br>
        <?php if(isset($_GET['error'])) 
            {
           ?> <p id="error"> <?php echo $_GET['error'];} ?></p>

    </form>
</main>

<script>
        
        function validate() {
            var radios1 = document.getElementsByName("q1");
            var radios2 = document.getElementsByName("q2");
            var radios3 = document.getElementsByName("q3");
            var formValid1 = false;
            var formValid2 = false;
            var formValid3 = false;

            for (var i = 0; i < radios1.length; i++) {
                if (radios1[i].checked) {
                    formValid1 = true;
                    break;
                }
            }

            for (var i = 0; i < radios2.length; i++) {
                if (radios2[i].checked) {
                    formValid2 = true;
                    break;
                }
            }

            for (var i = 0; i < radios3.length; i++) {
                if (radios3[i].checked) {
                    formValid3 = true;
                    break;
                }
            }

            if (!(formValid1)) {
                alert("Please select a option in 1st question!");
            }

            if (!(formValid2)) {
                alert("Please select a option in 2nd question!");
            }

            if (!(formValid3)) {
                alert("Please select a option in 3rd question!");
            }

            return formValid1 && formValid2 && formValid3;
        }

        var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');

        s1.addEventListener('click', ()=>{
            var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');
            k = 1;
            kk = [s1,s2,s3,s4,s5];

            for(let i=k;i<5;i++){
                kk[i].style.color = 'grey';
            }

            for(let i=0;i<k;i++){
                kk[i].style.color = 'gold';
            }

        });

        s2.addEventListener('click', ()=>{
            var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');
            k = 2;
            kk = [s1,s2,s3,s4,s5];

            for(let i=k;i<5;i++){
                kk[i].style.color = 'grey';
            }

            for(let i=0;i<k;i++){
                kk[i].style.color = 'gold';
            }

        });

        s3.addEventListener('click', ()=>{
            var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');

            k = 3;
            kk = [s1,s2,s3,s4,s5];

            for(let i=k;i<5;i++){
                kk[i].style.color = 'grey';
            }

            for(let i=0;i<k;i++){
                kk[i].style.color = 'gold';
            }

        });

        s4.addEventListener('click', ()=>{
            var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');

            k = 4;
            kk = [s1,s2,s3,s4,s5];
            for(let i=k;i<5;i++){
                kk[i].style.color = 'grey';
            }

            for(let i=0;i<k;i++){
                kk[i].style.color = 'gold';
            }

        });

        s5.addEventListener('click', ()=>{
            var s1 = document.getElementById('l1');
        var s2 = document.getElementById('l2');
        var s3 = document.getElementById('l3');
        var s4 = document.getElementById('l4');
        var s5 = document.getElementById('l5');

            k = 5;
            kk = [s1,s2,s3,s4,s5];

            for(let i=k;i<5;i++){
                kk[i].style.color = 'grey';
            }

            for(let i=0;i<k;i++){
                kk[i].style.color = 'gold';
            }

        });







    </script>
</body>
</html>

       
