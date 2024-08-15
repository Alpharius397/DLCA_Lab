<?php 
   session_start();
   
   function reroading($level){
      $path = '';

      for($i=0;$i<$level;$i++){
          $path .= '../';

      }

      return $path;
   }

   $level = 2;
   $path = reroading($level);

   include($path."databaseinfo/security/secure.php");
   include($path."databaseinfo/main/database.php");
   include($path.'databaseinfo/page_setup/eachcount.php');
   include($path.'databaseinfo/page_setup/pagedec.php');

   mysqli_close($conn);
?> 
<html>

<head>
 <style>
 .style-0 {
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
 background-image: linear-gradient(rgba(153, 4, 4, 0), rgba(153, 4, 4, 0)), url('../../images/background/back.jpg');
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
 .style-38 {
 display: block;
 position: relative;
 }

 .style-39 {
 display: flex;
 align-items: center;
 position: relative;
 }

 

 .style-41 {
 display: flex;
 padding: 10px 0px;
 }

 .style-42 {
 display: flex;
 box-sizing: border-box;
 }

 .style-43 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-44 {
 color: rgb(0, 0, 0);
 text-decoration: none solid rgb(0, 0, 0);
 width: 22px;
 height: 36px;
 display: flex;
 -webkit-box-pack: center;
 justify-content: center;
 -webkit-box-align: center;
 align-items: center;
 margin: 5px;
 fill: rgb(255, 255, 255);
 }

 .style-45 {
 display: flex;
 width: 1.2rem;
 height: 19.1875px;
 }

 .style-46 {
 pointer-events: none;
 width: 100%;
 height: 19.1875px;
 max-width: 19.2px;
 max-height: 19.2px;
 }

 .style-47 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-48 {
 color: rgb(0, 0, 0);
 text-decoration: none solid rgb(0, 0, 0);
 width: 22px;
 height: 36px;
 display: flex;
 -webkit-box-pack: center;
 justify-content: center;
 -webkit-box-align: center;
 align-items: center;
 margin: 5px;
 fill: rgb(255, 255, 255);
 }

 .style-49 {
 display: flex;
 width: 1.2rem;
 height: 19.1875px;
 }

 .style-50 {
 pointer-events: none;
 width: 100%;
 height: 19.1875px;
 max-width: 19.2px;
 max-height: 19.2px;
 }

 .style-51 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-52 {
 color: rgb(0, 0, 0);
 text-decoration: none solid rgb(0, 0, 0);
 width: 22px;
 height: 36px;
 display: flex;
 -webkit-box-pack: center;
 justify-content: center;
 -webkit-box-align: center;
 align-items: center;
 margin: 5px;
 fill: rgb(255, 255, 255);
 }

 .style-53 {
 display: flex;
 width: 1.2rem;
 height: 19.1875px;
 }

 .style-54 {
 pointer-events: none;
 width: 100%;
 height: 19.1875px;
 max-width: 19.2px;
 max-height: 19.2px;
 }

 .style-55 {
 display: none;
 }

 .style-56 {
 margin: 10px 0px 10px auto;
 z-index: 2;
 display: block;
 color: rgb(255, 255, 255);
 }

 .style-57 {
 display: flex;
 width: 1.5rem;
 height: 24px;
 }

 .style-58 {
 pointer-events: none;
 width: 100%;
 height: 100%;
 max-width: 24px;
 max-height: 24px;
 fill: rgb(255, 255, 255);
 }

 .style-59 {
 min-width: 100%;
 position: relative;
 padding-left: 0px;
 padding-right: 0px;
 padding-top: 621px;
 width: 95%;
 max-width: 1400px;
 margin: 0px auto;
 box-sizing: border-box;
 }

 .style-60 {
 position: relative;
 margin-right: auto;
 margin-left: auto;
 }

 .style-61 {
 position: absolute;
 z-index: 1;
 top: -185px;
 left: 0px;
 right: 0px;
 }

 .style-62 {
 width: 100%;
 filter: drop-shadow(rgba(255, 255, 255, 0.3) 1px 1px 2px);
 }

 .style-63 {
 fill: rgb(153, 4, 4);
 }

 .style-64 {
 width: 100%;
 position: relative;
 z-index: 2;
 padding-bottom: 80px;
 background-color: rgb(153, 4, 4);
 }

 .style-65 {
 display: flex;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: justify;
 justify-content: space-between;
 width: 95%;
 max-width: 1400px;
 position: relative;
 margin: 0px auto;
 box-sizing: border-box;
 }

 .style-66 {
 margin-right: 40px;
 width: 50%;
 max-width: 600px;
 }

 .style-67 {
 margin: 0px;
 padding: 0px;
 position: relative;
 white-space: pre-line;
 color: rgb(255, 255, 255);
 width: 100%;
 max-width: 1300px;
 text-align: left;
 margin-bottom: 0px;
 padding-top: 0px;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-68 {
 margin: 0px;
 padding: 20px 0px 0px;
 position: relative;
 white-space: pre-line;
 color: rgb(255, 255, 255);
 line-height: 29.76px;
 padding-top: 20px;
 width: 100%;
 max-width: 1300px;
 text-align: left;
 font-family: Poppins;
 font-weight: 300;
 font-size: 19.84px;
 }

 .style-69 {
 margin-top: 20px;
 }

 .style-70 {
 display: flex;
 align-items: center;
 position: relative;
 }

 .style-71 {
 color: rgb(249, 249, 249);
 text-decoration: none solid rgb(249, 249, 249);
 font-family: Poppins;
 font-weight: 500;
 -webkit-box-align: center;
 align-items: center;
 display: flex;
 font-size: 16px;
 }

 .style-72 {
 margin-left: 0px;
 padding-left: 5px;
 min-width: 24px;
 transition: transform 0.15s linear 0s;
 display: flex;
 width: 1.5rem;
 height: 24px;
 }

 .style-73 {
 fill: rgb(249, 249, 249);
 pointer-events: none;
 width: 100%;
 height: 24px;
 max-width: 24px;
 max-height: 24px;
 }

 .style-74 {
 display: flex;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 -webkit-box-pack: center;
 justify-content: center;
 width: 60%;
 max-width: 660px;
 }

 .style-75 {
 margin-right: -20px;
 display: flex;
 flex-wrap: wrap;
 width: 100%;
 max-width: 810px;
 -webkit-box-pack: center;
 justify-content: center;
 }

 .style-76 {
 margin-top: 20px;
 margin-right: 20px;
 margin-left: 20px;
 width: 180px;
 min-width: 180px;
 display: flex;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 outline: rgb(0, 0, 0) none 0px;
 box-sizing: border-box;
 }

 .style-77 {
 position: relative;
 width: 100%;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 box-sizing: border-box;
 display: flex;
 }

 .style-78 {
 min-width: 100%;
 display: flex;
 margin-top: 0px;
 }

 .style-79 {
 margin: 0px;
 padding: 0px;
 position: relative;
 white-space: pre-line;
 min-width: 100%;
 width: 100%;
 color: rgb(255, 255, 255);
 margin-bottom: 0px;
 text-align: center;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-80 {
 min-width: 100%;
 visibility: hidden;
 margin-bottom: 0px;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-81 {
 margin: 10px 0px 0px;
 padding: 0px;
 word-break: break-word;
 position: relative;
 white-space: pre-line;
 width: 100%;
 color: rgb(255, 255, 255);
 text-align: center;
 margin-top: 10px;
 font-family: Poppins;
 font-weight: 300;
 font-size: 19.84px;
 line-height: 27.776px;
 }

 .style-82 {
 margin-top: 20px;
 margin-right: 20px;
 margin-left: 20px;
 width: 180px;
 min-width: 180px;
 display: flex;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 outline: rgb(0, 0, 0) none 0px;
 box-sizing: border-box;
 }

 .style-83 {
 position: relative;
 width: 100%;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 box-sizing: border-box;
 display: flex;
 }

 .style-84 {
 min-width: 100%;
 display: flex;
 margin-top: 0px;
 }

 .style-85 {
 margin: 0px;
 padding: 0px;
 position: relative;
 white-space: pre-line;
 min-width: 100%;
 width: 100%;
 color: rgb(255, 255, 255);
 margin-bottom: 0px;
 text-align: center;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-86 {
 min-width: 100%;
 visibility: hidden;
 margin-bottom: 0px;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-87 {
 margin: 10px 0px 0px;
 padding: 0px;
 word-break: break-word;
 position: relative;
 white-space: pre-line;
 width: 100%;
 color: rgb(255, 255, 255);
 text-align: center;
 margin-top: 10px;
 font-family: Poppins;
 font-weight: 300;
 font-size: 19.84px;
 line-height: 27.776px;
 }

 .style-88 {
 margin-top: 20px;
 margin-right: 20px;
 margin-left: 20px;
 width: 180px;
 min-width: 180px;
 display: flex;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 outline: rgb(0, 0, 0) none 0px;
 box-sizing: border-box;
 }

 .style-89 {
 position: relative;
 width: 100%;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 box-sizing: border-box;
 display: flex;
 }

 .style-90 {
 min-width: 100%;
 display: flex;
 margin-top: 0px;
 }

 .style-91 {
 margin: 0px;
 padding: 0px;
 position: relative;
 white-space: pre-line;
 min-width: 100%;
 width: 100%;
 color: rgb(255, 255, 255);
 margin-bottom: 0px;
 text-align: center;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-92 {
 min-width: 100%;
 visibility: hidden;
 margin-bottom: 0px;
 font-family: Poppins;
 font-weight: 700;
 font-size: 46.6px;
 }

 .style-93 {
 margin: 10px 0px 0px;
 padding: 0px;
 word-break: break-word;
 position: relative;
 white-space: pre-line;
 width: 100%;
 color: rgb(255, 255, 255);
 text-align: center;
 margin-top: 10px;
 font-family: Poppins;
 font-weight: 300;
 font-size: 19.84px;
 line-height: 27.776px;
 }

 .style-94 {
 width: 100%;
 bottom: 0px;
 display: flex;
 flex-direction: column;
 z-index: 20;
 }

 .style-95 {
 opacity: 0;
 visibility: hidden;
 background: rgba(0, 0, 0, 0.6) none repeat scroll 0% 0% / auto padding-box border-box;
 height: 100%;
 left: 0px;
 position: fixed;
 top: 0px;
 width: 100%;
 z-index: 104;
 display: none;
 }

 .style-96 {
 background-color: rgb(255, 255, 255);
 border-radius: 20px;
 display: flex;
 left: 50%;
 min-height: 526px;
 position: absolute;
 top: 50%;
 width: 880px;
 z-index: 10;
 box-shadow: rgba(56, 125, 255, 0.3) 0px 6px 12px 0px;
 max-width: 90%;
 transform: none;
 box-sizing: border-box;
 }

 .style-97 {
 border-radius: 20px 0px 0px 20px;
 box-sizing: border-box;
 flex: 1 1 0%;
 max-width: 490px;
 padding: 44px 36px 32px;
 }

 .style-98 {
 display: flex;
 flex-direction: column;
 height: 100%;
 max-width: 100%;
 position: relative;
 z-index: 1;
 }

 .style-99 {
 color: rgb(37, 46, 72);
 font-size: 20px;
 font-weight: 700;
 line-height: 28px;
 margin-bottom: 45px;
 text-align: center;
 margin: 0px 0px 45px;
 padding: 0px;
 word-break: break-word;
 }

 .style-100 {
 background: rgba(0, 0, 0, 0) -webkit-linear-gradient(0deg, rgb(118, 109, 232) 0px, rgb(255, 0, 137) 80%, rgb(255, 0, 107) 100%) repeat scroll 0% 0% / auto padding-box;
 -webkit-background-clip: text;
 -webkit-text-fill-color: rgba(0, 0, 0, 0);
 -webkit-box-decoration-break: clone;
 }

 .style-101 {
 display: flex;
 flex-direction: column;
 flex-grow: 1;
 }

 .style-102 {
 text-align: center;
 width: 100%;
 }

 .style-103 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-104 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-105 {
 color: rgb(118, 131, 168);
 font-size: 12px;
 font-weight: 400;
 text-decoration: line-through solid rgb(118, 131, 168);
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-106 {
 text-align: center;
 width: 100%;
 }

 .style-107 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-108 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-109 {
 color: rgb(118, 131, 168);
 font-size: 12px;
 font-weight: 400;
 text-decoration: line-through solid rgb(118, 131, 168);
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-110 {
 text-align: center;
 width: 100%;
 }

 .style-111 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-112 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-113 {
 text-align: center;
 width: 100%;
 }

 .style-114 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-115 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-116 {
 color: rgb(118, 131, 168);
 font-size: 12px;
 font-weight: 400;
 text-decoration: line-through solid rgb(118, 131, 168);
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-117 {
 text-align: center;
 width: 100%;
 }

 .style-118 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-119 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-120 {
 color: rgb(118, 131, 168);
 font-size: 12px;
 font-weight: 400;
 text-decoration: line-through solid rgb(118, 131, 168);
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-121 {
 text-align: center;
 width: 100%;
 }

 .style-122 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-123 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-124 {
 color: rgb(37, 46, 72);
 font-size: 12px;
 font-weight: 400;
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-125 {
 text-align: center;
 width: 100%;
 }

 .style-126 {
 object-fit: contain;
 user-select: none;
 display: inline-block;
 width: auto !important;
 }

 .style-127 {
 color: rgb(37, 46, 72);
 font-size: 18px;
 font-weight: 600;
 margin: 0px auto 8px;
 max-width: 290px;
 padding: 0px;
 word-break: break-word;
 }

 .style-128 {
 color: rgb(37, 46, 72);
 font-size: 12px;
 font-weight: 400;
 margin: 0px;
 padding: 0px;
 word-break: break-word;
 }

 .style-129 {
 bottom: 0px;
 display: none;
 left: 0px;
 margin: 0px auto;
 max-width: fit-content;
 min-width: 200px;
 position: absolute;
 right: 0px;
 text-transform: uppercase;
 z-index: 1;
 border: 0px none rgb(255, 255, 255);
 border-radius: 5px;
 color: rgb(255, 255, 255);
 font-size: 18px;
 height: 50px;
 line-height: 50px;
 box-sizing: border-box;
 padding: 0px 30px;
 font-weight: 500;
 text-align: center;
 transition: all 0.2s ease 0s;
 white-space: nowrap;
 background: rgba(0, 0, 0, 0) linear-gradient(rgb(140, 131, 247) 0px, rgb(101, 91, 226) 100%) repeat scroll 0% 0% / auto padding-box border-box;
 box-shadow: rgba(118, 109, 232, 0.5) 0px 6px 12px 0px;
 font-family: Montserrat, sans-serif;
 }

 .style-130 {

 background-position: 0% 50%;
 background-repeat: no-repeat;
 background-size: cover;
 border-radius: 0px 20px 20px 0px;
 flex: 0 1 390px;
 position: relative;
 }

 .style-131 {
 bottom: 30px;
 height: 230px;
 position: absolute;
 right: -80px;
 transform: none;
 width: 208px;
 will-change: transform;
 }

 .style-132 {
 animation: 20s linear 0.4s infinite normal none running astronautAnim;
 height: 100%;
 object-fit: contain;
 user-select: none;
 width: 100%;
 will-change: transform;
 }

 .style-133 {
 background: rgba(0, 0, 0, 0.6) none repeat scroll 0% 0% / auto padding-box border-box;
 height: 100%;
 left: 0px;
 position: fixed;
 top: 0px;
 width: 100%;
 z-index: 104;
 display: none;
 }

 .style-134 {
 background-color: rgb(255, 255, 255);
 border-radius: 20px;
 left: 50%;
 min-height: 200px;
 padding: 44px;
 position: absolute;
 top: 50%;
 width: 360px;
 z-index: 11;
 box-shadow: rgba(56, 125, 255, 0.3) 0px 6px 12px 0px;
 max-width: 90%;
 transform: none;
 box-sizing: border-box;
 }

 .style-135 {
 color: rgb(37, 46, 72);
 font-size: 16px;
 font-weight: 400;
 line-height: 24px;
 margin-bottom: 32px;
 text-align: center;
 }

 .style-136 {
 border-radius: 5px;
 width: 100%;
 height: 50px;
 line-height: 50px;
 padding: 0px 30px;
 font-size: 18px;
 color: rgb(255, 255, 255);
 cursor: pointer;
 transition: all 0.1s linear 0s;
 text-transform: uppercase;
 font-weight: 400;
 user-select: none;
 text-decoration: none solid rgb(255, 255, 255);
 background-repeat: no-repeat;
 display: inline-block;
 font-family: Montserrat, sans-serif;
 }

 .style-137 {
 display: none;
 position: absolute;
 top: 64px;
 right: 0px;
 z-index: 1001;
 }

 </style>
</head>

<body class="style-0">
 <div class="">
 <div class="style-1"><button class="style-2">
 <div data-name="arrow_small_top" class="style-3"><svg width="32" height="32" viewBox="0 0 32 32" class="style-4">
 <path d="M24.567 20.862a1.619 1.619 0 000-2.283l-7.417-7.433a1.618 1.618 0 00-2.3 0l-7.417 7.433a1.619 1.619 0 000 2.283 1.619 1.619 0 002.283 0l6.283-6.283 6.283 6.283a1.619 1.619 0 002.283 0z" class=""></path>
 </svg></div>
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
 <figure class="style-17"><a href="VLab.php"><img color="default" width="150" class="style-18" alt="Navbar logo" sizes="[object Object]" src="../../images/background/kjsieit-logo.svg" /></a></figure>
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
 <div class="style-27"><a class="style-28" href="../app/prerequisites/pre.php">Prerequisites</a></div>
 </div>
 <div class="style-26">
 <div class="style-27"><a class="style-28" href="../app/experiments/List.php">Experiments</a></div>
 </div>
 <div class="style-29">
 <div class="style-30"><a class="style-31" href="../app/feedback/feedpage.php">Feedback</a></div>
 </div>
 <div class="style-32">
 <div class="style-33"><a class="style-34" href="../app/about/about.php">About Us</a></div>
 </div>
 <div class="style-35">
 <div class="style-36"><form action='../logout/logout.php' onsubmit="return deleteAlert();"><input type='submit' class="style-37" value="Logout"></form></div>
 </div>
 
 
 </nav>
 <div class="style-41">
 <div class="style-42">

 </div>
 </div>
 </div>
 <div class="style-55">
 <div class="style-56">
 <div class="style-57" data-name=""><svg  width="32" height="32" viewBox="0 0 32 32" class="style-58">
 <path d="M4 8h24v2.688H4V8zm0 9.313v-2.625h24v2.625H4zM4 24v-2.688h24V24H4z" class=""></path>
 </svg></div>
 </div>
 </div>
 </div>
 </div>
 <div class="style-59">
 <div class="style-60">
 <div class="style-61"><svg width="3000" height="335" viewBox="0 0 3000 335" class="style-62">
 <defs class="">
 <clipPath class="">
 <rect data-name="Rectangle 15723" width="3000" height="335" transform="translate(2163 138)" class=""></rect>
 </clipPath>
 </defs>
 <g dataName="Mask Group 2" transform="translate(-2163 -138)" clip-path="url(#clip-path)" class="">
 <path dataName="Path 9160" d="M5970,1981.4s571.03-143.687,1428.011,52.553,1571.989,0,1571.989,0v478.638H5970Z" transform="translate(-3807 -1792.662)" class="style-63"></path>
 </g>
 </svg></div>
 <div class="style-64">
 <div class="style-65">
 <div class="style-66">
 <h1 data-text="Virtual Lab<br>" class="style-67">Welcome <?php echo $_SESSION['name']?>!<br class="" /></h1>
 <h2 class="style-68">Virtual Lab on Digital Logic and Computer Organization and Architecture<br class="" /></h2>
 <div class="style-69">
 <div class="style-70"><a class="style-71" target="_blank" rel="noopener noreferrer" ><div class="style-72" class="style-73">
 <path d="M11.438 21.813l6.125-6.125-6.125-6.125 1.875-1.875 8 8-8 8z" class=""></path>
 </svg></div></a></div>
 </div>
 </div>
 <div class="style-74">
 <div class="style-75">
 <div class="style-76">
 <div class="style-77">
 <div class="style-78">
 <h5 data-target="100<br>" class="style-79"><?php if(isset($_SESSION['count'])){ echo $_SESSION['count']; } ?> </h5>
 <div class="style-80">100<br></div>
 </div>
 <p class="style-81">Users</p>
 </div>
 </div>
 <div class="style-82">
 <div class="style-83">
 <div class="style-84">
 <h5 data-target="4" class="style-85">6</h5>
 <div class="style-86">6</div>
 </div>
 <p class="style-87">Experiments</p>
 </div>
 </div>
 <div class="style-88">
 <div class="style-89">
 <div class="style-90">
 <h5 data-target="120%" class="style-91"><?php if(isset($_SESSION['sum'])){ echo $_SESSION['sum']; } ?> / 15</h5>
 <div class="style-92">120%</div>
 </div>
 <p class="style-93">Total Rating<br class="" /></p>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </header>
 </div>
 <div class="style-94"></div>
 </div>
 </div>
 <div class="style-95">
 <div class="style-96">
 <div class="style-97">
 <div class="style-98">
 <div class="style-101">
 <div class="style-102">

 <p class="style-104"></p>
 <p class="style-105"></p>
 </div>
 <div class="style-106">

 <p class="style-108"></p>
 <p class="style-109"></p>
 </div>
 <div class="style-110">


 </div>
 <div class="style-113">

 </div>
 <div class="style-117">

 </div>
 <div class="style-121">

 </div>
 <div class="style-125">


 </div>
 </div>
 </div>
 </div>
 <div class="style-130">
 <div class="style-131">
 <picture class="">

 
 </div>
 </div>
 </div>
 </div>
 <div class="style-133">
 <div class="style-134">
 <div class="style-135"></div>
 </div>
 </div>
<script src='../../formula/Aryan.js'></script>
</body>

</html>