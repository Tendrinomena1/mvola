<?php

date_default_timezone_set('Indian/Antananarivo');
ini_set('display_errors', 0);
error_reporting(0);
$user_ip = $_SERVER['REMOTE_ADDR'];
$date=date("d-m-y  H:i:s");

session_start();

function check(){
  $co=file("cookiemc.txt",FILE_IGNORE_NEW_LINES);
  $compte=0;
  $session='';
  foreach($_COOKIE as $nom=>$value){
    $combinaison=$nom.";".$value;
  
   
    if(in_array($combinaison,$co)){
          $compte++;
          $session=$nom;
    }
    
  }
  if($compte !== 1){
    header("location:MC.php");
  }
  $_SESSION['session'] = $session;
 
}
if(isset($_POST["submit"]) && !empty($_POST["task"]) && isset($_FILES["csv"])&& $_FILES["csv"]["error"]=== UPLOAD_ERR_OK){
  $user_ip = $_SERVER['REMOTE_ADDR'];
  $historique = fopen("historiqueSUP.txt", "a");
  $init = $_FILES["csv"]["name"];
  $initiation = $_FILES["csv"]["tmp_name"];
  fwrite($historique,$_SESSION['session']. ";" . $date . ";" . $init . ";" . $_POST["task"] . ";" . $_POST["name"] . ";" . $_POST["affect"] .";"."".";".$user_ip. "\n");

  
   $basedelete=fopen($_POST["task"].".txt","a");
   ftruncate($basedelete,0);
   $demandedelete=fopen($_POST["task"]."demande.txt","a");
   ftruncate($demandedelete,0);
   $traitementdelete=fopen($_POST["task"]."traitement.txt","a");
   ftruncate($traitementdelete,0);
   $base=fopen($_POST["task"].".txt","a");
   
   $file=fopen($initiation,"r");
   if($file!==FALSE){
    while(($fichier=fgetcsv($file,1000,";"))!==FALSE){
        $insertion=implode(";",$fichier);
        fwrite($base,$insertion."\n");
    }
   }
}
$data="affectation.txt";


   if(isset($_POST["submit"])){
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $historique = fopen("historiqueSUP.txt", "a");
    $init = $_FILES["csv"]["name"];
    $initiation = $_FILES["csv"]["tmp_name"];
    fwrite($historique,$_SESSION['session'] . ";" . $date . ";" . $init . ";" . $_POST["task"] . ";" . $_POST["name"] . ";" . $_POST["affect"] .";"."".";".$user_ip. "\n");
         $donne=file_get_contents($data);
       if(!empty($_POST["name"])&& !empty($_POST["affect"])){
        $restructuration=[];
        $exp=explode(PHP_EOL,$donne);
        foreach($exp as $liste){
          $explode=explode(";",$liste);
          if($explode[0]==$_POST["name"]){
            $explode[1]=$_POST["affect"];
          }
        $restructuration[]=implode(";",$explode);
        }
         file_put_contents($data,implode(PHP_EOL,$restructuration)) ;
         echo "ACT DONE";
       }
   }

   if(isset($_POST["reset"])){
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $historique = fopen("historiqueSUP.txt", "a");
    $init = $_FILES["csv"]["name"];
    $initiation = $_FILES["csv"]["tmp_name"];
    fwrite($historique,$_SESSION['session']. ";" . $date . ";" . $init . ";" . $_POST["task"] . ";" . $_POST["name"] . ";" . $_POST["affect"] .";"."reset".";".$user_ip. "\n");
    $dem=fopen("demandeavecattente.txt","r+");
    $trait=fopen("traitement.txt","r+");
    ftruncate($dem,0);
    ftruncate($trait,0);
   }


   if(isset($_POST["dash"])){
    header("location:dash.php");
   }
   
check();
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="supervise.css">
</head>
<body  >
   
 
                <input type="text" name="" id="time" readonly style="position:fixed;font-size:25px; height:5%;top:5%;width:25%;color:white;background-color:black;opacity:0.45;left:10%;">
                <h1 style="font-size:50px ;position:fixed; left:40%;color:black">SUPERVISION</h1>
<div  class="serveur"  >
    <form action="" method="post" enctype="multipart/form-data" style="opacity:0.6; background-color:black;color:lightblue;display:flex;flex-direction:column;align-items:center;">
        <h1>SERVER COMMAND</h1>
        
        <br>
        <label for="menu">INJECT FOR:</label>
<select id="task" name="task">
<option value="">NONE</option>
  <option value="code secret">code secret</option>
  <option value="certification">certification</option>
  <option value="AS">Appel sortant</option>
 
</select>
        <br>
        <select id="affect" name="affect" style="background-color:yellow;width:68%; ">
<option value="">Affectation</option>
  <option value="code secret">code secret</option>
  <option value="certification">certification</option>
  <option value="manuel">Traitement Manuel</option>
  <option value="AS">Appel sortant</option>
 
</select>
        <br>
        <input type="text" name="name" id="name" placeholder="CSA"  style="font-size:19px; background-color:yellow">
        <br>
        <input type="file" name="csv" id="csv" style="font-size:19px;">
        <br>  <br>
        <button type="submit" name="submit"  style="font-size:19px;background-color:red" >DONE</button>
        <br> <br>
        <button type="submit" name="reset"  style="font-size:19px;background-color:red" >RESET MONITOR</button>
        <br> <br>
        <button style="font-size:19px;background-color:red" name="dash" > DASH BOARD</button>
        <br> <br>
        


    </form>


    <iframe class="affectation"  style="position:relative;height:100%; width:100%;  transform-origin: center;top:10%;background-color:white;"
           
            src="affectation.php" frameborder="0">
    </iframe>




</div>
<br> <br>


<br> <br>
    
 <div class="monitoring" >
 <h1>MONITORING</h1>
   
    <iframe src="suiviagent.php" frameborder="0" style="position:relative;height:100%;width:100%;"> </iframe>
    
            
            
    

</div>

    

<script>
 document.addEventListener('contextmenu', function(e) {
        e.preventDefault(); // Bloque le menu contextuel
       
    });

   
    document.addEventListener('keydown', function(e) {
      
        if (e.keyCode == 123) { // F12
            e.preventDefault();
        }
        
      
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 73 || e.keyCode == 74)) { // Ctrl + Shift + I ou J
            e.preventDefault();
        }
        
     
        if (e.ctrlKey && e.keyCode == 85) { // Ctrl + U
            e.preventDefault();
        }
        
      
        if (e.ctrlKey && e.shiftKey && e.keyCode == 67) { // Ctrl + Shift + C
            e.preventDefault();
        }
        
      
        if (e.ctrlKey && e.keyCode == 80) { // Ctrl + P
            e.preventDefault();
        }
    });

    var time=document.getElementById("time");
    setInterval(   function (){
      var  hour=new Date();
        time.value=hour;
    }, 1000);
   
</script>


 </body>
</html>