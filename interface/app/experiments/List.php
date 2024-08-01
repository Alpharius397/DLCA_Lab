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

   include($path."databaseinfo/security/secure.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../formula/bootstrap.css">  
    <style>

header{
   z-index: 100;
}

body {
 cursor: auto;
 margin: 0px;
 padding: 0px;
 min-width: 320px;
 font-family: Montserrat, sans-serif;
 font-weight: 400;
 }

 .style-1 {
 position: fixed;
 z-index: 19;
 right: 20px;
 top: auto;
 bottom: 0px;
 transform: none;
 margin-bottom: 20px;
 }

 .style-2 {
 font-family: Montserrat, sans-serif;
 width: 50px;
 height: 50px;
 display: flex;
 -webkit-box-pack: center;
 justify-content: center;
 -webkit-box-align: center;
 align-items: center;
 cursor: pointer;
 outline: rgb(0, 0, 0) none 0px;
 visibility: hidden;
 opacity: 0;
 transition: opacity 0.2s ease 0s, visibility 0.2s ease 0s;
 background: rgba(0, 0, 0, 0) linear-gradient(rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%) no-repeat scroll 0% 0% / auto padding-box border-box;
 border: 1px solid rgb(255, 255, 255);
 border-radius: 10px;
 box-shadow: rgba(153, 4, 4, 0.15) 0px 4px 8px 0px;
 }

 .style-3 {
 display: flex;
 width: 2rem;
 height: 32px;
 }

 .style-4 {
 flex-shrink: 0;
 fill: rgb(241, 37, 37);
 pointer-events: none;
 width: 100%;
 height: 32px;
 max-width: 32px;
 max-height: 32px;
 }

 .style-5 {
 position: relative;
 }

 .style-6 {
 position: relative;
 }

 .style-7 {
 position: absolute;
 visibility: hidden;
 width: 0px;
 height: 0px;
 top: -121px;
 left: 756.5px;
 }

 .style-8 {
 position: absolute;
 visibility: hidden;
 width: 0px;
 height: 0px;
 top: -121px;
 left: 756.5px;
 }

 .style-9 {
 flex-direction: column;
 padding: 0px;
 position: relative;
 overflow: hidden;
 word-break: break-word;
 display: flex;
 }

 .style-10 {
 position: absolute;
 top: 0px;
 width: 100%;
 height: 796px;
 background-size: auto, cover;
 background-repeat: repeat, no-repeat;
 background-origin: padding-box, padding-box;
 -webkit-background-clip: border-box, border-box;
 background-color: rgba(0, 0, 0, 0);
 background-position: 50% 50%, 50% 50%;
 background-attachment: fixed, fixed;
 }

 .style-11 {
 width: 100%;
 background: white none repeat scroll 0% 0% / auto padding-box border-box;
 padding-top: 0px;
 box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px 0px;
 z-index: 9;
 top: 0px;
 left: 0px;
 right: 0px;
 position: fixed;
 border-bottom: 4px solid #971426;
 }

 .style-12 {
 font-family: Poppins;
 font-weight: 300;
 width: 100%;
 position: relative;
 padding: 0px 20px;
 margin: 0px auto;
 z-index: 19;
 display: flex;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: justify;
 justify-content: space-between;
 box-sizing: border-box;
 
 }

 .style-13 {
 transition: padding 0.3s linear 0s;
 padding: 10px 0px;
 }

 .style-14 {
 margin: 0px;
 padding: 0px;
 }

 .style-15 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-16 {
 color: rgb(0, 0, 0);
 text-decoration: none solid rgb(0, 0, 0);
 }

 .style-17 {
 margin: 0px;
 padding: 0px;
 font-size: 0px;
 height: 49.9844px;
 width: 100%;
 overflow: hidden;
 position: relative;
 }

 .style-18 {
 height: auto;
 object-fit: contain;
 border-right: 2px solid #971426;
 padding: 3px;
 position: relative;
 opacity: 1;
 }

 .style-19 {
 display: flex;
 visibility: hidden;
 opacity: 1;
 position: absolute;
 top: 0px;
 left: 0px;
 width: 100%;
 height: 49.9844px;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: center;
 justify-content: center;
 background: rgba(255, 255, 255, 0.6) none repeat scroll 0% 0% / auto padding-box border-box;
 box-sizing: border-box;
 }

 .style-20 {
 display: flex;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: center;
 justify-content: center;
 }

 .style-21 {
   display: flex;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: end;
 justify-content: flex-end;
 width: 100%;
 margin: 0px 20px;
 }

 .style-22 {
 display: flex;
 -webkit-box-align: center;
 align-items: center;
 padding: 10px 0px;
 }

 .style-23 {
 display: block;
 position: relative;
 }

 .style-24 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-25 {
 color: #971426;
 text-decoration: none solid #971426;
 
 text-overflow: ellipsis;
 max-width: 250px;
 display: block;
 overflow: hidden;
 width: 100%;
 padding: 10px;
 white-space: nowrap;
 transition: all ease 0.3s;
 font-size: 23px;
 }

 .style-25:hover{
    font-size:25px;
    border-radius: 6px;
    background-color: rgba(162, 161, 161, 0.484);
 }

 .style-26 {
 display: block;
 position: relative;
 }

 .style-27 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-28 {
 color: #971426;
 text-decoration: none solid #971426;
 cursor: pointer;
 text-overflow: ellipsis;
 max-width: 250px;
 display: block;
 overflow: hidden;
 width: 100%;
 padding: 10px;
 white-space: nowrap;
 transition: all ease 0.3s;
 font-size: 23px;
 }

 .style-28:hover{
    font-size: 25px;
    border-radius: 6px;
    background-color: rgba(162, 161, 161, 0.484);
 }
 .style-29 {
 display: block;
 position: relative;
 }

 .style-30 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-31 {
 color: #971426;
 text-decoration: none solid #971426;
 cursor: pointer;
 text-overflow: ellipsis;
 max-width: 250px;
 display: block;
 overflow: hidden;
 width: 100%;
 padding: 10px;
 white-space: nowrap;
 transition: all ease 0.3s;
 font-size: 23px;
 }

 .style-31:hover{
    font-size: 25px;
    border-radius: 6px;
    background-color: rgba(162, 161, 161, 0.484);
 }
 .style-32 {
 display: block;
 position: relative;
 }

 .style-33 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-34 {
 color: #971426;
 text-decoration: none solid #971426;
 cursor: pointer;
 text-overflow: ellipsis;
 max-width: 250px;
 display: block;
 overflow: hidden;
 width: 100%;
 padding: 10px;
 white-space: nowrap;
 transition: all ease 0.3s;
 font-size: 23px;
 }

 .style-34:hover{
    font-size: 25px;
    border-radius: 6px;
    background-color: rgba(162, 161, 161, 0.484);
 }

 .style-35 {
 display: block;
 position: relative;
 }

 .style-36 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-37 {
 font-family: Poppins;
 color: #971426;
 background-color: white;
 text-decoration: none solid #971426;
 cursor: pointer;
 text-overflow: ellipsis;
 max-width: 250px;
 display: block;
 overflow: hidden;
 width: 100%;
 padding: 10px;
 padding-top: 10px;
 border:0px;
 white-space: nowrap;
 transition: all ease 0.3s;
 font-size: 23px;
 }

 form{
   padding: 0px;
   margin: 0px;
 }
 .style-37:hover{
    font-size: 25px;
    border-radius: 6px;
    background-color: rgba(162, 161, 161, 0.484);
 }

 main{
      height: 621px;
      width: 100%;
      background-color: #f2f2f2;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
   overflow-x: scroll;
   }

   

   .img1{
      height:290px ;
      background-size:contain;
      background-repeat: no-repeat;
      margin-left: 70px;
      margin-top: 20px ;
      margin-bottom: 20px;
   }

   .box{
      height: 500px;
      width: max-content;
      background-color: white;
      padding-left: 20px;
      padding-right: 20px;
      padding-top: 20px;
      border-radius: 30px;
      margin: 5px;
      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
      transition: transform 0.3s, box-shadow 0.3s;
   }

   .box:hover{
      box-shadow: 0 3px 6px rgba(0,0,0,0.16) , 0 3px 6px rgba(0,0,0,0.23);
      transform: translate(0px, -8px);
   }

   .imgcon{
      width: 295px;
      height: 330px;
      border: 2px solid black;
      border-radius: 15px;
      margin-bottom: 25px;
      margin-top: 10px;
      overflow: hidden;
   }

   .box p{
      font-size: 1.23rem;
      font-weight: 450;
      color: #971426;
      border-bottom: 3px solid black;
      padding-bottom: 4px;
   }

.start{
     text-align: center;
     height: 57px;
      width: 100%;
      background: linear-gradient(to bottom right, #EF4765, #971426);
      border-radius: 15px ;
      color: white;
      border: 0;
}

.start:hover{
   box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
}

.list{
   padding-top: 30px;
   margin-top: 78px;
   background-color: #f2f2f2 ;
   display: flex;
   justify-content: center;
   color: #971426;
   width: 100%;
}

#b1{
   z-index: 20;
}


#b2{
   z-index: 40;
}


#b3{
   z-index: 60;
}

#b3{
   z-index: 80;
}

.img2{
      margin: auto;
      margin-left:5px;
      margin-right:5px;
   margin-top: 80px;
   margin-bottom: 20px;
   padding: auto;
   overflow-y: hidden;
}

.asd{
   margin: auto;
   padding: auto;
   width: 100%;
}
  
    </style>
  <link rel="stylesheet" href="../../../formula/bootstrap.css">
</head>
<body>
<header>
 <div class="">
 <div class="style-1"><button class="style-2">
 <div data-name="arrow_small_top" class="style-3"></div>
 </button></div>
 <div class="style-5">
 <div class="">
 <header class="">
 <div class="style-6">
 <div class="style-7"></div>
 <div class="style-8"></div>
 <div class="style-9">
 <div class="style-10"></div>
 <div class="style-11">
 <div type="header" class="style-12">
 <div class="style-13">
 <figure class="style-14">
 <div class="style-15"><a class="style-16" href="/website-maker/preview/lang/site/1145181/">
 <figure class="style-17"><a href="../../main/VLab.php"><img color="default" width="150" class="style-18" alt="Navbar logo" sizes="[object Object]" src="../../../images/background/kjsieit-logo.svg" /></a></figure>
 <div class="style-19">
 <div class="style-20"></div>
 </div>
 </a></div>
 </figure>
 </div>
 <div class="style-21">
 <nav class="style-22">
 <div class="style-23">
 <div class="style-24"></div>
 </div>
 <div class="style-26">
 <div class="style-27"><a class="style-31"  href="../../main/VLab.php">Home</a></div>
 </div>
 <div class="style-26">
 <div class="style-27"><a class="style-31" href="../prerequisites/pre.php">Prerequisites</a></div>
 </div>
 <div class="style-26">
 <div class="style-27"><a class="style-31" href="List.php">Experiments</a></div>
 </div>
 <div class="style-29">
 <div class="style-30"><a class="style-31" href="../feedback/feedpage.php">Feedback</a></div>
 </div>
 <div class="style-32">
 <div class="style-33"><a class="style-34" href="../about/about.php">About Us</a></div>
 </div>
 <div class="style-35">
 <div class="style-36"><form action="../../logout/logout.php" onsubmit="return deleteAlert();"><input type='submit' class="style-37" value="Logout"></form></div>
 </div>
 </nav>
 <div class="style-41">
 <div class="style-42">

 </div>
 </div>
</header>


<div class="list">
   <h1>List of Experiments</h1>
</div>   
<main>
  

   <div class="box" id="b1" style="margin-left:50px">
      <p>Logic Gates</p>
     <div class="imgcon">
         <div class="img1" style="background-image: url('../../../images/exp/logicgate.jpg');"></div>
      </div> 
      <div class="b"><a href='logictable/LogicTheo.php'><button class="start">START</button></a></div>
   </div>

    <div class="box" id="b2">
      <p>Booths Algorithm</p>
      <div class="imgcon">
         <div class="img1" style="background-image: url('../../../images/exp/booth.jpeg');"></div>
      </div>
      <div class="b"><a href='booth/BoothTheo.php'><button class="start">START</button></a></div>
   </div>

  <div class="box" id="b3">
      <p>Restoring Division Algorithm</p>
      <div class="imgcon">
         <div class="img1" style="background-image: url('../../../images/exp/restoring.png');"></div>
      </div>
      <div class="b"><a href='restoring/RestTheo.php'><button class="start">START</button></a></div>
   </div>

   <div class="box" id="b4">
      <p>Non-Restoring Division Algorithm</p>
      <div class="imgcon">
         <div class="img1" style="background-image: url('../../../images/exp/nonrestoring.jpeg');"></div>
      </div>
      <div class="b"><a href='nonrestoring/NonRestoTheo.php'><button class="start">START</button></a></div>
   </div>

   <div class="box" id="b5">
      <p>Encoder and Decoder</p>
      <div class="imgcon">
         <div class="img2"><img class='asd' src='../../../images/exp/encode.png' width="280px"></div>
      </div>
      <div class="b"><a href='encode/encodeTheo.php'><button class="start">START</button></a></div>
   </div>

   <div class="box" id="b6" style="margin-right:50px">
      <p>MUX and DeMUX</p>
      <div class="imgcon">
         <div class="img2"><img class='asd' src='../../../images/exp/mux.jpg' width="280px"></div>
      </div>
      <div class="b"><a href='mux/muxTheo.php'><button class="start">START</button></a></div>
   </div>
</main>

</body>
</html>
