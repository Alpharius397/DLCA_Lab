<?php session_start();     unset($_SESSION['OTP']);
    unset($_SESSION['email']);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
  <style>
  *{
    margin: 0;
    padding: 0;
}

body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;

}

main{
    display: flex;
    width: 100vw;
    height: 100vh;
}


.mid{
    width: 0.5%;
    background-color: rgb(48, 45, 45);
    display: block;
   
}

img.logo{
    position: absolute;
    top: 0px;
    left: 0px;
    margin: 5px;
    border: 2px solid #971426;
    padding: 8px;
    border-radius: 20px;
}

    

.left{
    background-color: #EFE7DA;
    position: relative;
    
    width: 66%;
    display: flex;
    align-items: center;
    justify-content: center;
}

 .container{    
   position: relative;
    text-align: center;
    border-bottom: 3px solid black;
    
    
 }


.text1{
   
    display: block;
    font-size: 100px;
    font-weight: 700;
    letter-spacing: 7px;
    margin-bottom: 20px; 
    background: #EFE7DA;
    position: relative;
} 



.text2{
   margin-right: 20px;
    color:#971426;
    font-size: 90px;
    font-weight: 600;
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: black;
}

.text3{
   
    font-family: Georgia ;
    font-size: 55px;
    font-weight: 400;
   
    
}

#changePasswordForm{
    width: 350px;
    height: 400px;
    position:relative;
    margin: 6% auto;
    background: #ffffff;
    padding: 5px;
    overflow: hidden;
    border-radius: 30px;
    0 14px 28px rgba(0,0,0,0.22);
    transition: 0.6s ease-out;
} 

.right{
    background-color:  #A12B3B ;    
    width: 35.5%;
    padding-top: 30px;
    align-items: center;
    justify-content: center;
    text-align: center;
    display: flexbox;
}

.container2 {
            width: 350px;
            height: 310px;
            margin: 6% auto;
            background: #ffffff;
            padding: 5px;
            overflow: hidden;
            border-radius: 30px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
            0 14px 28px rgba(0,0,0,0.22);
            transition: 0.6s ease-out;
        }
        .container2 h2 {
            margin-bottom: 20px;
            margin-top: 40px;
            margin-left: 15px;  
        }
        .container2 input {
            width: 85%;
            padding-top: 10px ;
            padding-bottom: 10px ;
            padding-left: 10px ;
            border-top: 0;
            border-right: 0;
            border-left: 0;
            border-bottom: 2px solid #971426;
            outline: none;
            background: transparent;
            font-size: medium;
            margin-bottom: 20px;
            margin-left: 20px; 
            margin-top: 20px;
        }
        .container2 button {
            height: 50px;
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin-top:20px;
            margin-left: 25px;
            background: linear-gradient(to bottom right, #EF4765 , #971426 );
            border: none;
            outline: none;
            border-radius: 30px;
            color: white;
            font-size: large;
        }
        .container2 button:hover {
            border: 2px solid #971426;
        }


        .error-message{
            margin-top: 15px;
            font-weight: bolder;
            color: #971426;
            margin-bottom: 5px;
        }    

      footer{
        background-color: rgb(193, 189, 189);
        border-top: 3px solid rgb(48, 45, 45);
      }

      .font1{
        height:60px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .font1 h1{
        color: rgb(47, 46, 46);  
        font-size: 36px;
      }
      

      .button-16 {
  align-items: center;
  appearance: none;
  background-color: #fff;
  border-radius: 30px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
  box-sizing: border-box;
  color: #3c4043;
  cursor: default;
  display: inline-flex;
  fill: currentcolor;
  font-family: "Google Sans",Roboto,Arial,sans-serif;
  font-size: 22px;
  font-weight: 700;
  justify-content: center;
  letter-spacing: .25px;
  line-height: normal;
  max-width: 100%;
  overflow: visible;
  padding: 2px 24px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 180px;
  height: 60px;
  will-change: transform,opacity;
  z-index: 0;
  margin: 0 20px;
  margin:10px;
}

.button-17{
    align-items: center;
  appearance: none;
  background: #97142697;
  border-radius: 30px;
  border: 2px solid  rgba(225, 225, 225, 0.6);
 box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
 box-sizing: border-box;
  color: #F6F9FE;
  cursor: pointer;
  display: inline-flex;
  fill: currentcolor;
  font-family: "Google Sans",Roboto,Arial,sans-serif;
  font-size: 22px;
  font-weight: 700;
  justify-content: center;
  letter-spacing: .25px;
  line-height: normal;
  max-width: 100%;
  overflow: visible;
  padding: 2px 24px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 180px;
  height: 60px;
  will-change: transform,opacity;
  z-index: 0;
  margin: 0 20px;
  margin:10px;
}

.button-17:hover {
  background: #F6F9FE;
  color: #971426;
  font-weight: bold;
  border: 2px solid  rgba(48, 45, 45, 0.6);
}

.forgot{
    margin-top: 15px;
    text-decoration: none;
    color: #971426;
    font-weight: bolder;
    margin-bottom: 10px;
   }

   .forgot:hover{
    text-decoration: underline;
   }
   
#route{
    cursor:pointer;
}

@media  only screen and (max-width: 1104px) {
        footer{
            display: none;
        }

        .left{
            display: none;
        }

        .mid{
            display: none;
        }

        .right{
            width: 100vw;
            height: 100vh;
        }

        .button-16{
            width: 140px;
        }

        .button-17{
            width: 140px;
        }
    }

   

</style>
</head>
<body>
    <main>
    <div  class="left">
        <p id="route"> <img class="logo"  src="../../../images/background/kjsieit-logo.svg"> </p>
   <div class="container">
    <span class="text1">Welcome To..</span>
    <span class="text2">DLCOA</span>
    <span class="text3"> Virtual Lab </span>
   </div>


    </div>

   <div class="mid"> </div>
   
 <div  class="right">
 <button class="button-17" id='stud' role="button" onclick="student();">Student</button>
 <button class="button-17" id='admin' role="button" onclick="admin();">Admin</button>
        <div class="container2">
            <h2>Change Password</h2>


            <form id="changePasswordForm" action="../mailing/mail.php" method="post">
                <input type="email" id="mail" name="email" placeholder="Enter your Email" required>
                <input type='text' id='who' name='who' value='student' readonly style='display:none'>
                <span id="password-match-error" class="error-message">
                        <?php if (isset($_GET['error'])){ echo $_GET['error']; }?> </span>
                <button type="submit" name="submit">Change Password</button>
            <p class = 'forgot'><a href='../../home.php' class='forgot'>Remembered Password?</a></p>

            </form>

        </div>
</div>  
</main>

    <script>
            var stud = document.getElementById('stud');
            var ad = document.getElementById('admin');
            var form = document.getElementById('changePasswordForm');
            var who =document.querySelector('#who');
            var home =document.getElementById('route');

            function student(){
                stud.className = 'button-16';
                ad.className = 'button-17';
                who.setAttribute('value','student');
            }

            function admin(){
                ad.className = 'button-16';
                stud.className = 'button-17';
                who.setAttribute('value','admin');
            }

            home.addEventListener('click', ()=>{
                let text="Are you sure about returning to home page?";

                if(confirm(text)){
                    location.href = '../../home.php';
                }
            });

            <?php
                if(isset($_GET['type'])){
                    if($_GET['type']=='admin'){
                        echo "admin();";
                    }
                    else{
                        echo "student();";
                    }
                }

                else{
                    echo "student();";
                }
            ?>


    </script>

</body>
</html>
