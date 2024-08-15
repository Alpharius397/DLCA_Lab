<?php
    session_start();

    unset($_SESSION['OTP']);
    unset($_SESSION['email']);

?>

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
    background-color: #EFE7DA;
    position: relative;
    animation: text 3s 1;
} 


  @keyframes text {
    0%{
        color: #EFE7DA;
        margin-bottom: -90px;
       
    }
    30%{
        letter-spacing: 25px;
        margin-bottom: -90px;
        color:black;
    } 
    
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

.right{
    background-color:  #A12B3B ;    
    width: 35.5%;
    padding-top: 30px;
    align-items: center;
    justify-content: center;
    text-align: center;
    display: flexbox;
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

.form-box{
    width: 350px;
    height: 400px;
    position:relative;
    margin: 6% auto;
    background: #ffffff;
    padding: 5px;
    overflow: hidden;
    border-radius: 30px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
    0 14px 28px rgba(0,0,0,0.22);
    transition: 0.6s ease-out;
} 
 
        .button-box{
            width: 220px;
            height:45px;
            margin-top: 35px;
            margin-bottom: 20px; 
            margin-left: 67px;
            box-shadow: 0 0 20px 9px #ff61241f;
            position: relative;
            border-radius: 30px;
            border: 2px solid #971426;
        }
    
        .toggle-btn{
            height: 45px;
            padding: 10px 20px ;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
            font-size: medium;
        }

        #log{
            left: -5px;
            color: #E7E4E4;
        }

        #reg{
            left:8px 
        }

        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background: linear-gradient(to bottom right, #EF4765, #971426);
            border-radius: 30px;
            transition: 0.5s;
        }

        .input-group{
            top: 120px;
            position: absolute;
            width: 280px;
            transition: 0.5s;

        }

        .input-field{
            width: 100%;
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
        }
        
        .lo{
            margin:13px 0;
        }

        .re{
            margin: 8px 0;
        }

        .submit-btn{
            height: 45px;
            width: 85%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin-top:15px;
            margin-left: 25px;
            background: linear-gradient(to bottom right, #EF4765 , #971426 );
            border: none;
            outline: none;
            border-radius: 30px;
            color: white;
            font-size: large;
        }

        .submit-btn:hover{
            border: 2px solid #971426;
        }

        #login{
            left: 40px;
        }

        #register{
            left:450px;
        }


      footer{
        background-color: rgb(193, 189, 189);
        border-top: 3px solid rgb(48, 45, 45);
        overflow: visible;
      }

      .font1{
        height:60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
      }

      .font1 h1{
        color: rgb(47, 46, 46);  
        font-size: 36px;
      }

      .font2{
        display: flex;
        justify-content: center;
        align-items: center;
        height:40px;
        margin-bottom: 20px;
      }

      .font2 h2{
        color: rgb(66, 65, 65);
        font-size: 26px;
      }

      .ab-container{
        display: flex;
        justify-content: space-evenly;
        width: 100%;
        height: 485px;
      }

      

    .box{
        height:400px;
        width:250px;
        margin: 10px;
    }

   .img{
    height: 300px;
    background-color: rgb(193, 189, 189);
    margin: 20px 0;
   }

   .box h1{
    margin-left: 70px;
    color: rgb(47, 46, 46);
   }

   .box h3{
    color:rgb(47, 46, 46) ;
   }

   .contri{
    background-color: #E7E4E4;
    border-radius: 8px;
    margin-bottom: 30px;
    
   }

   .box-con{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
    width: 100%;
   }

   .guide{
    background-color: #E7E4E4;
    width: 290px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 450px;
    border-radius: 8px;
    margin-left: 10px;
    margin-right: 10px;
   }

   .te-con{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 25px;
    margin-bottom: 3px;
    color:rgb(47, 46, 46) ;
   }

   .name{
    display: flex;
    justify-content: center;
   }

   .error-message, .error{
    margin-top: 5px;
    font-weight: bolder;
    color: #971426;
   }

   .forgot{
    margin-top: 15px;
    text-decoration: none;
    color: #971426;
    font-weight: bolder;
   }

   .forgot:hover{
    text-decoration: underline;
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
        <img class="logo"  src="../images/background/kjsieit-logo.svg">
 
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
    <div class='f'>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="log" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" id="reg" class="toggle-btn" onclick="register()">Register</button>
                
            </div>
            <form id="login" action="login/login.php" class="input-group" method="post">
                <input type="text" id="user" name="user" class="input-field lo" placeholder="Username" required>
                <input type="password" id="pass" name="pass" class="input-field lo" placeholder="Enter Password" required>
                <input type='text' id='who' name='who' value='student' style='display:none' readonly>
                <button type="submit" class="submit-btn">Log In</button>
                
                <?php if(isset($_GET['error1'])) { ?>
                <p class="error">
            <?php echo $_GET['error1']; ?><?php } ?><p>

            <p class = 'forgot'><a href='change/entry/entry.php?type=student' class='forgot'>Forgot Password?</a></p>
            </form>

    
            <form action="register/register.php" method="post" id="register" class="input-group" onsubmit="return check_value();">
                <input type="text" id="name" name="name" class="input-field re" placeholder="Name" required>
                <input type='text' id='who' name='who' value='student' style='display:none' readonly>
                <input type="text" id="username" name="username" class="input-field re" placeholder="Username" required>
                <input type="email" id="email" name="email" class="input-field re" placeholder="Email Id" required>
                <input type="text" class="input-field re" id="create" name="create" placeholder="Create Password" minlength="8" maxlength="20" required>
                <input type="text" class="input-field re" id="confirm" name="confirm" placeholder="Confirm Password" minlength="8" maxlength="20" required>
                <p id="password-match-error" class="error-message"></p>
                <button type="submit" class="submit-btn" id="reg">Register</button>
                <?php if(isset($_GET['error2'])) { ?>
            <p class="error">
            <?php echo $_GET['error2']; ?><?php } ?><p>
            </form>
    </div>

</div>  
 </div>
</main>


</body>
<script>

    var confirm_ = document.getElementById('confirm');
    var create = document.getElementById('create');    
    var error_log = document.getElementById('password-match-error');
    var stud = document.getElementById('stud');
    var ad = document.getElementById('admin');
    var form = document.querySelector('.form-box');
    var x=document.getElementById("login");
    var y=document.getElementById("register");
    var z=document.getElementById("btn");
    var log = document.getElementById('log');
    var reg =document.getElementById('reg');
    var who =document.querySelectorAll('#who');
    var forgor =document.querySelector('a.forgot');

    function register(){
        x.style.left = "-400px";
        y.style.left = "40px";
        z.style.left = "110px";
        form.style.height="510px";
        reg.style.color='white';
        log.style.color='black';
    }
    
    function login(){
        form.style.height="400px";
        x.style.left = "40px";
        y.style.left = "450px";
        z.style.left = "0px";
        log.style.color='white';
        reg.style.color='black';
    }

    function student(){
        stud.className = 'button-16';
        ad.className = 'button-17';
        who.forEach(wh => {wh.setAttribute('value','student')});
        forgor.href = 'change/entry/entry.php?type=student';
    }

    function admin(){
        ad.className = 'button-16';
        stud.className = 'button-17';
        who.forEach(wh => {wh.setAttribute('value','admin')});
        forgor.href = 'change/entry/entry.php?type=admin';


    }

    function check_value() {
        if (confirm_.value != create.value) {
            error_log.innerHTML  = "Passwords do not match!";
            return false;
        } else {
            error_log.innerHTML  = "";
            return true;
        }
    }

    confirm_.addEventListener("keyup",check_value);

    <?php 

        if(isset($_GET['where']) && isset($_GET['type'])){
            if($_GET['type']=='student'){
                echo "student();";

                if($_GET['where']=='reg'){
                    echo "register();";
                }
                else{
                    echo "login();";
                }
            }

            if($_GET['type']=='admin'){

                echo "admin();";
                
                if($_GET['where']=='reg'){
                    echo "register();";
                }
                else{
                    echo "login();";
                }
            }

        }

        else{
            echo "student();";
            echo "login();";

        }
    
    ?>

</script>
</html>