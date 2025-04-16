<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="position: absolute;
    display: flex;
    flex-direction:column;
    align-items: center;
    justify-content: center; 
    /* justify-content: center; */
    background-image: url('customers.jpg');
    background-size: cover; /* Adapte l'image pour couvrir tout le body */
    background-repeat: no-repeat; /* Évite les répétitions de l'image */
    /* background-position: center; Centre l'image */
    height:98%;
    width:98% ;
    overflow:hidden;
    background-color: white;">
   
    <form action="" method="post" style="position:relative;top:4%;background-color:grey;opacity:0.85;color:white;text-align:center;" >
    <H1>FRONT OFFICE AS</H1>
    <br><br>
    <input type="hidden" placeholder="session" name="session" id="session" readonly>
    <input type="hidden" placeholder="name" name="name" id="name" readonly >
    <br><br>
           <input type="text" name="id" id="id" readonly>
           <br><br>
           <input type="text"  name="numero" id="numero" readonly>
           <br><br>
           <input type="text" name="nomprenom" id="nomprenom" readonly>
           <br><br>
           <input type="text" name="chrono" id="chrono" readonly>
           <br><br>
           <input type="hidden" name="datedebut" id="datedebut" value=" <?php  date_default_timezone_set('Indian/Antananarivo'); echo date("H:i:s") ;?>"readonly>
          
           <br><br>
           
          <textarea name="info" id="info"  readonly></textarea>
          <br><br>
          <textarea name="commentaire" id="" placeholder="Commentaire" style="background-color:black;color:white" ></textarea>
          <br>
          <input type="datetime-local" name="callback" id="rappel" style="display:none;">
          <br>
          <select name="qualification" id="qualification" >
        
            <option value="qualifie">Qualifié</option>
            <option value="rappel">Rappel</option>       
            <option value="repondeur">Repondeur</option>
            <option value="coupe">Communication coupé</option>
            <option value="hors-cible">Hors-cible</option>
          </select>
          <br><br>
          <input type="text" name="statut" id="statut" style="text-align: center;" placeholder="statut" readonly>
          <br>
          <br>
         <button type="submit" name="work">Traitement</button>

         <select name="pause" id="pause">
            <option value="PAUSE_BREAK">Pause15</option>
            <option value="PAUSE_DEJ">DEJEUNER</option>
            <option value="PAUSE_OSTIE">OSTIE</option>
            <option value="PAUSE_BRIEF">BRIEF</option>
            <option value="PAUSE_COACHING">COACHING</option>
            <option value="PAUSE_FORMATION">FORMATION</option>
            <option value="PAUSE_DO">POINT-DO</option>
        </select>

         <button type="submit" name="break">Pause</button>

         <button type="submit" name="quit">Deconnexion</button>
         <br>
     
         <div>


         </div>
         <br><br>
    </form>
   

</body>
<?php
 
 
function charger($p){
    include($p.".class.php");
}

spl_autoload_register("charger");

$requete= new assql();
$requete->check();
$requete->traitement();




?>
<script>
    var chrono=document.getElementById("chrono");
    var compte=0;
     function time(){
        var heure=Math.floor(compte/3600);
        var minute=Math.floor((compte%3600)/60);
        var seconde=Math.floor(compte%60);
        var affichage=heure+":"+minute+":"+seconde;
        chrono.value=affichage;
     }

     setInterval(function (){
        compte++;
        time();
     }, 1000);

     var rappel = document.getElementById("rappel");
     var qualification = document.getElementById("qualification");
     qualification.addEventListener("change",function (){
        if(qualification.value =="rappel"){
            rappel.style.display="block";
        }else{
            rappel.style.display="none";
        }
     });

     
</script>
</html>