<?php 

    session_start(); 

    if(isset($_GET['type'])){
        if(!($_GET['type']=='admin' || $_GET['type']=='student')){
            header("Location: ../entry/entry.php?error=Some error occured! Please try again");
        }
    }
    else{
        header("Location: ../entry/entry.php?error=Some error occured! Please try again");

    }

    if(!(isset($_SESSION['OTP']) && isset($_SESSION['email']))){
        header("Location: ../../home.php?error1=No OTP, No Change");
    }
        
        
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

.right{
    background-color:  #A12B3B ;    
    width: 35.5%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.container2 {
            width: 350px;
            height: 400px;
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
            margin-bottom: 15px;
            margin-top: 35px;
        }

        .container2 input {
            width: 80%;
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
            margin-bottom: 10px;
            margin-top: 20px;
        }
        .container2 button {
            height: 55px;
            width: 80%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin-top:30px;
            margin-left: 35px;
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
    
    <div class="container2">
        <h2>Change Password</h2>
        <form id="changePasswordForm" action="pass_change.php" method="post" onsubmit="return checkValue();">
            <input type="number" id="otp" name="otp"  minlength="6" maxlength="6" placeholder="Enter OTP" required>
            <input type="text" id="newPassword" name="newPassword" placeholder="Enter New Password" autocomplete="new-password" minlength="8" maxlength="20" required>
            <input type="text" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password" autocomplete="current-password" minlength="8" maxlength="20" required>
            <input type='text' id='who' name='who' value=<?php echo $_GET['type']?> readonly style='display:none'>
            <span id="password-match-error" class="error-message"> <?php if (isset($_GET['error'])){ echo $_GET['error']; }?> </span>
            <button type="submit" name="submit">Change Password</button>
        </form>
    </div>
</div>  
</main>

</body>
<script>

    window.alert(' OTP has been sent to you. Please check your email.');
    var confirm_ = document.getElementById("confirmPassword");
    var error_log = document.getElementById("password-match-error");
    var create = document.getElementById("newPassword");
    var home =document.getElementById('route');

    function checkValue() {
        if (confirm_.value !== create.value) {
            error_log.textContent = "Passwords do not match!";
            return false;
        } else {
            error_log.textContent = "";
            return true;
        }
    }

    confirm_.addEventListener("keyup", checkValue); 


    home.addEventListener('click', ()=>{
        let text="Are you sure about returning to home page?";

        if(confirm(text)){
            location.href = '../../home.php';
        }
    });

</script>
</html>