<?php
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="suiviagent.css">
</head>
<body style="background-color:rgba(0, 0, 0, 0.2);display:flex;">
   

  
   

    <div class="traitement" style=" background-color:red ;color:black">
        <h1 style="color:black">WORKING</h1>
       <?php
       date_default_timezone_set('Indian/Antananarivo');
       $datechrono=strtotime(date("H:i:s"));
      echo "<table border='1'>";
      echo "<tr><th>Number</th><th>CSA</th><th>Duration</th></tr>"; // En-têtes du tableau
      
      $maxtosupervision = file("max.txt", FILE_IGNORE_NEW_LINES);
      
      foreach ($maxtosupervision as $content) {
          $separation = explode(";", $content);
          
          if (isset($separation[4]) && $separation[4] == "traitement") { // Vérifie si la 5e colonne existe et est "traitement"
              echo "<tr>";
              
                echo "<td>".$separation[1]."</td>";
                echo "<td>".$separation[2]."</td>";
                echo "<td>".gmdate("H:i:s",$datechrono-strtotime($separation[3]))."</td>";
  

           echo "</tr>";
          }
         
      }
      
      
      echo "</table>";
       ?>



    </div>

    <div class="deconnexion" style=" background-color:yellow;color:black">
        <h1 style="color:black">BREAKING</h1>
       <?php
           date_default_timezone_set('Indian/Antananarivo');
           $datechrono=strtotime(date("H:i:s"));
          echo "<table border='1'>";
          echo "<tr><th>CSA</th><th>statut</th><th>Duration</th></tr>"; // En-têtes du tabl
           
           $maxtosupervision = file("max.txt", FILE_IGNORE_NEW_LINES);
           
           foreach ($maxtosupervision as $content) {
               $separation = explode(";", $content);
               
               if (isset($separation[4]) && ($separation[4] == "PAUSE_BREAK" || $separation[4] == "PAUSE_DEJ" || $separation[4] == "PAUSE_OSTIE" || $separation[4] == "PAUSE_BRIEF" || $separation[4] == "PAUSE_COACHING" || $separation[4] == "PAUSE_FORMATION" || $separation[4] == "PAUSE_DO")) { // Vérifie si la 5e colonne existe et est "traitement"
              
              
                echo "<tr>";
                  
                   echo "<td>".$separation[2]."</td>";
                   echo "<td>".$separation[4]."</td>";
                   echo "<td>".gmdate("H:i:s",$datechrono-strtotime($separation[3]))."</td>";
                   echo "</tr>";
               }
           }
           
           echo "</table>";

       ?>



    </div>

    <div class="attente" style=" background-color:green;color:black">
        <h1 style="color:black">WAITING</h1>
       <?php
           date_default_timezone_set('Indian/Antananarivo');
           $datechrono=strtotime(date("H:i:s"));
          echo "<table border='1'>";
          echo "<tr><th>CSA</th><th>Duration</th></tr>"; // En-têtes du tabl
           
           $maxtosupervision = file("max.txt", FILE_IGNORE_NEW_LINES);
           
           foreach ($maxtosupervision as $content) {
               $separation = explode(";", $content);
               
               if (isset($separation[4]) && $separation[4] == "attente") { // Vérifie si la 5e colonne existe et est "traitement"
                echo "<tr>";
               
                echo "<td>".$separation[2]."</td>";
                echo "<td>".gmdate("H:i:s",$datechrono-strtotime($separation[3]))."</td>";
                echo "</tr>";
               }
           }
           
           echo "</table>";


       ?>



    </div>


    <div class="manuel" style=" background-color:white;color:black">
        <h1 style="color:black">MANUEL</h1>
       <?php
           date_default_timezone_set('Indian/Antananarivo');
           $datechrono=strtotime(date("H:i:s"));
          echo "<table border='1'>";
          echo "<tr><th>CSA</th><th>Duration</th></tr>"; // En-têtes du tabl
           
           $maxtosupervision = file("max.txt", FILE_IGNORE_NEW_LINES);
           
           foreach ($maxtosupervision as $content) {
               $separation = explode(";", $content);
               
               if (isset($separation[4]) && $separation[4] == "manuel") { // Vérifie si la 5e colonne existe et est "traitement"
                echo "<tr>";
                
                echo "<td>".$separation[2]."</td>";
                echo "<td>".gmdate("H:i:s",$datechrono-strtotime($separation[3]))."</td>";
                echo "</tr>";
               }
           }
           
           echo "</table>";

       ?>


    </div>

    <div class="" style=" background-color:orange;color:black">
        <h1 style="color:black">CALLING</h1>
       <?php
           date_default_timezone_set('Indian/Antananarivo');
           $datechrono=strtotime(date("H:i:s"));
          echo "<table border='1'>";
          echo "<tr><th>CSA</th><th>Duration</th></tr>"; // En-têtes du tabl
           
           $maxtosupervision = file("max.txt", FILE_IGNORE_NEW_LINES);
           
           foreach ($maxtosupervision as $content) {
               $separation = explode(";", $content);
               
               if (isset($separation[4]) && $separation[4] == "APPEL") { // Vérifie si la 5e colonne existe et est "traitement"
                echo "<tr>";
                
                echo "<td>".$separation[2]."</td>";
                echo "<td>".gmdate("H:i:s",$datechrono-strtotime($separation[3]))."</td>";
                echo "</tr>";
               }
           }
           
           echo "</table>";

       ?>



    </div>

   
   

<script>
    var time=document.getElementById("time");
    setInterval(   function (){
      var  hour=new Date();
        time.value=hour;
    }, 1000);
   
</script>

<?php
 date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
//   $traitement=file("traitement.txt",FILE_IGNORE_NEW_LINES);
//   $historique=file("historique.txt",FILE_IGNORE_NEW_LINES);
  $date=strtotime(date("H:i:s"));
 
  
//     foreach($traitement as $comparaison){
//         $explode=explode(";",$comparaison."\n");
//         if(!in_array($explode[0],$historique)){
//             $now=strtotime($explode[3]);
//            echo $explode[0].";".$explode[1]. ";".$explode[2].";".$date-$now."<br>";
         
//         }
//       }

// //   POUR LE SUPERVISION ATTENTE    
// $resultat = file("demandeavecattente.txt", FILE_IGNORE_NEW_LINES);
// $data = [];



// foreach($resultat as $line){
//     $lines=explode(";",$line);
//     $clé=$lines[0];
//     $valeur=strtotime($lines[1]);
//     if(!isset($data[$clé])||$valeur>$data[$clé]){
//         $data[$clé]=$valeur;
//     }
// }




// foreach ($data as $clé => $valeur) {
//     echo $clé.";".$date-$valeur."<br>";
// }





  header("refresh:1");
  

  $traitement = fopen("traitement.txt", "r");
  $demandeavecattente = fopen("demandeavecattente.txt", "r");
  $supervisiondelete=fopen("supervisiontraitement.txt","r+");
  ftruncate($supervisiondelete,0);
  $maxdelete=fopen("max.txt","r+");
  ftruncate($maxdelete,0);

  $supervison=fopen("supervisiontraitement.txt","a");
  while(($dem=fgets($demandeavecattente))!==FALSE){
    
    $demande=trim($dem);
    fwrite($supervison,$demande."\n");
  }

  while(($trait=fgets($traitement))!==FALSE){
    
    $traite=trim($trait);
    fwrite($supervison,$traite."\n");
  }


  $lecturesupervision=file("supervisiontraitement.txt",FILE_IGNORE_NEW_LINES);
  $data=[];

  foreach($lecturesupervision as $u){
    $exp=explode(";",$u);
    $a=$exp[0];
    $b=$exp[1];
    $c=$exp[2];
    $d=(int)strtotime($exp[3]);
    $e=$exp[4];
    $f=$exp[5];
    if(!isset($data[$c])|| $d>$data[$c]['d']){
        $data[$c]=[
            'a'=>$a,
            'b'=>$b,
            'c'=>$c,
            'd'=>$d,
            'e'=>$e,
            'f'=>$f,
        ];
    }
  
  }

  $maxopen=fopen("max.txt","a");

  foreach($data as $contenu){
    // echo $contenu['a'] . ", ";
    // echo  $contenu['b'] . ", ";
    // echo  $contenu['c'] . ", ";
    // echo  date("Y-m-d // H:i:s", $contenu['d']) . ", ";
    // echo  $contenu['e'] . "<br>";

   fwrite($maxopen,$contenu['a'].";".$contenu['b'].";".$contenu['c'].";".date("H:i:s", $contenu['d']).";".$contenu['e'].";".$contenu['f']."\n");

    }
 
    
    


  








?>

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
    </script>

 </body>
</html>