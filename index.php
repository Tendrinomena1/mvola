
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTHENTIFICATION</title>
    <link rel="stylesheet" href="index.css">
</head>
<body style=" 
    
   
    position: absolute;
  
    display: flex;
    justify-content: center;
    background-color:black;
  
    height:100%;
    width:100% ;
   
    align-items: center;
    justify-content: center;">

    <form action="" method="post" style=" display:flex;flex-direction:column;position:relative;align-items:center;height:50%;width:15%;" >
      <h1>AUTHENTIFICATION</h1>

      <input 
    type="text" 
    name="name" 
    id="name" 
    style="
        background-image: url('name.jpg'); 
        background-size: 100% 100%; /* Taille de l'image adaptée à l'input */
        background-repeat: no-repeat; /* Empêche la répétition de l'image */
        background-position: left center; /* Positionne l'image à gauche */
        height: 50px; /* Hauteur fixe */
        width: 80%; /* Largeur quasi totale */
        font-size: 20px; /* Taille du texte */
        color: white; /* Couleur du texte */
        padding-left: 50px; /* Décale le texte pour éviter de chevaucher l'image */
        border: 1px solid #ccc; /* Bordure optionnelle */
        border-radius: 5px; /* Coins arrondis */
        font-weight: bold; "
    placeholder="USER NAME">
       <br>
       <input 
    type="text" 
    name="mdp" 
    id="mdp" 
    style="
        background-image: url('mdp.jpg'); 
        background-size: 100% 100%; /* Taille de l'image adaptée à l'input */
        background-repeat: no-repeat; /* Empêche la répétition de l'image */
        background-position: left center; /* Positionne l'image à gauche */
        height: 50px; /* Hauteur fixe */
        width: 80%; /* Largeur quasi totale */
        font-size: 20px; /* Taille du texte */
        color: white; /* Couleur du texte */
        padding-left: 50px; /* Décale le texte pour éviter de chevaucher l'image */
        border: 1px solid #ccc; /* Bordure optionnelle */
        border-radius: 5px; /* Coins arrondis */
        font-weight: bold;
    "
    placeholder="PASS WORD">

       <br><br>
       <button type="submit" name="submit" style="background-image: url('login.jpg');height:8%;width:78%; background-size: 100% 100%;background-repeat: no-repeat; "></button>
    </form>
    
</body>
<script>
    
</script>
</html>
<?php
$vocalcom=file("vocalcom.txt",FILE_IGNORE_NEW_LINES);
$affectation=file("affectation.txt",FILE_IGNORE_NEW_LINES);
$cookie=fopen("cookie.txt","a");
date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
$datefin = date("H:i:s");
echo $datefin;

if(isset($_POST["submit"])){
   

    
    $demandeavecattente=fopen("demandeavecattente.txt","a");
    
       $combinaison=$_POST["name"].";".$_POST["mdp"];
       
       $uniq=uniqid();
  foreach($vocalcom as $aut){
    $expla=explode(";",$aut);
    $recomb=$expla[0].";".$expla[1];
    if($recomb == $combinaison){
       
        setcookie($_POST["name"],$uniq,time()+9000);
        fwrite($cookie,$_POST["name"].";".$uniq."\n");
        fwrite($demandeavecattente,"".";"."".";".$_POST["name"].";".$datefin.";"."attente"."\n");

        foreach($affectation as $affect){
            $aff=explode(";",$affect);
            
            if( $_POST["name"]==$aff[0]  && $aff[1]=="AS"){
                header("location:AS.php");
            }
            elseif($_POST["name"]==$aff[0]  && $aff[1]!=="AS"){
                header("location:agent.php");
            } 
            
            
        }
      
   
  }

  

 

         
           
       
}

}

?>