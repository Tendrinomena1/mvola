<?php
ini_set('display_errors', 0);
error_reporting(0);
header("refresh:8");
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

}

check();
// echo "<h1> TABLEAU DE BORD</h1>";
echo "<div style='posion:relative;display:flex;flex-direction:column;gap:30px;height:100%;width:20%;background-color:'';'>";

echo "<div style='posion:relative;top:10%;display:flex;flex-direction:row;gap:40px;height:40%;width:100%;background-color:'';'>";

$file=file("resultat.txt",FILE_IGNORE_NEW_LINES);

$plagesHoraires = [
    [7, 8],  // 7h-8h
    [8, 9],  // 8h-9h
    [9, 10], // 9h-10h
    [10, 11],// 10h-11h
    [11, 12],// 11h-12h
    [12, 13],// 12h-13h
    [13, 14],// 13h-14h
    [14, 15],// 14h-15h
    [15, 16],// 15h-16h
    [16, 17],// 16h-17h
    [17, 18],// 17h-18h
    [18, 19],// 18h-19h
    [19, 20],// 18h-19h
    [20, 21] // 20h-21h
];

$reference=[
  
        '7h-8h'=>0, 
        '8h-9h'=>0, // 7h-8h
        '9h-10h'=>0,
        '10h-11h'=>0, // 9h-10h
        '11h-12h'=>0,
        '12h-13h'=>0,// 11h-12h
        '13h-14h'=>0,
        '14h-15h'=>0,// 13h-14h
        '15h-16h'=>0,// 15h-16h
        '16h-17h'=>0,// 15h-16h
        '17h-18h'=>0,// 17h-18h
        '18h-19h'=>0,
        '19h-20h'=>0,// 19h-20h
        '20h-21h'=>0 // 21h-22h
    
    
];
foreach($file as $contenu){
    $exp=explode(";",$contenu);
    if($exp[9] === "traitement"){

    $horaire = $exp[10];
    $heure=(int) explode(":",$horaire)[0];
    foreach($plagesHoraires as $ref){
        $refere=$ref[0]."h-".$ref[1]."h";
        if($heure >= $ref[0] && $heure < $ref[1])
        $reference[$refere]++;
    }
    }
}


echo "<table border='1'style='text-align:center;position:relative;width:45%;top:10%;background-color:white;color:black'>";
echo "<tr><th colspan='2'>FLASH HORAIRE</th></tr>";
echo "<tr><th >TRANCHE</th><th >PROD</th></tr>";
foreach($reference as $key=>$value){
    
   echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
}
echo "</table >";
$data=array_values($reference);



// 2 campgane
$tasckres=file("resultat.txt",FILE_IGNORE_NEW_LINES);
$comptage=0;

$campagne = [
   'certification',
   'code secret'
   
];

$assignation = [
    'certification'=>0,
    'code secret'=>0
    
 ];
foreach($tasckres as $content){
    $explode = explode(";",$content);
    $tack=$explode[8];
    $trait=$explode[9];
    foreach($campagne as $camp){
        if($tack == $camp && $trait=="traitement" ){
            $assignation[$tack]++;
            $comptage++;
        }
    }

}

echo "<table border='1'style='text-align:center;position:relative;width:45%;top:10%;background-color:white;color:black'>";

echo "<tr><th >CAMPAGNE</th><th >PROD</th></tr>";
foreach($assignation as $cle=>$val){
    
   echo "<tr><td>".$cle."</td><td>".$val."</td></tr>";
}
echo "<tr><td>"."TOTAL"."</td><td>".$comptage."</td></tr>";

echo "</table >";
$dispatch=array_values($assignation);

echo "</div>";





// certif
echo "<div style='posion:relative;top:10%;display:flex;flex-direction:row;gap:40px;height:40%;width:100%;background-color:'';'>";

$certif=file("resultat.txt",FILE_IGNORE_NEW_LINES);

$horairecertif = [
    [7, 8],  // 7h-8h
    [8, 9],  // 8h-9h
    [9, 10], // 9h-10h
    [10, 11],// 10h-11h
    [11, 12],// 11h-12h
    [12, 13],// 12h-13h
    [13, 14],// 13h-14h
    [14, 15],// 14h-15h
    [15, 16],// 15h-16h
    [16, 17],// 16h-17h
    [17, 18],// 17h-18h
    [18, 19],// 18h-19h
    [19, 20],// 18h-19h
    [20, 21] // 20h-21h
];

$referencecertif=[
  
        '7h-8h'=>0, 
        '8h-9h'=>0, // 7h-8h
        '9h-10h'=>0,
        '10h-11h'=>0, // 9h-10h
        '11h-12h'=>0,
        '12h-13h'=>0,// 11h-12h
        '13h-14h'=>0,
        '14h-15h'=>0,// 13h-14h
        '15h-16h'=>0,// 15h-16h
        '16h-17h'=>0,// 15h-16h
        '17h-18h'=>0,// 17h-18h
        '18h-19h'=>0,
        '19h-20h'=>0,// 19h-20h
        '20h-21h'=>0 // 21h-22h
    
    
];
foreach($certif as $contenu){
    $exp=explode(";",$contenu);
    if($exp[9] === "traitement" && $exp[8] === "certification"){

    $horaire = $exp[10];
    $heure=(int) explode(":",$horaire)[0];
    foreach($horairecertif as $ref){
        $refere=$ref[0]."h-".$ref[1]."h";
        if($heure >= $ref[0] && $heure < $ref[1])
        $referencecertif[$refere]++;
    }
    }
}


echo "<table border='1'style='text-align:center;position:relative;width:45%;top:20%;background-color:white;color:black'>";
echo "<tr><th colspan='2'>CERTIFICATION</th></tr>";
echo "<tr><th >TRANCHE</th><th >PROD</th></tr>";
foreach($referencecertif as $key=>$value){
    
   echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
}
echo "</table >";




// codesecret

$code=file("resultat.txt",FILE_IGNORE_NEW_LINES);

$horairecode = [
    [7, 8],  // 7h-8h
    [8, 9],  // 8h-9h
    [9, 10], // 9h-10h
    [10, 11],// 10h-11h
    [11, 12],// 11h-12h
    [12, 13],// 12h-13h
    [13, 14],// 13h-14h
    [14, 15],// 14h-15h
    [15, 16],// 15h-16h
    [16, 17],// 16h-17h
    [17, 18],// 17h-18h
    [18, 19],// 18h-19h
    [19, 20],// 18h-19h
    [20, 21] // 20h-21h
];

$referencecode=[
  
        '7h-8h'=>0, 
        '8h-9h'=>0, // 7h-8h
        '9h-10h'=>0,
        '10h-11h'=>0, // 9h-10h
        '11h-12h'=>0,
        '12h-13h'=>0,// 11h-12h
        '13h-14h'=>0,
        '14h-15h'=>0,// 13h-14h
        '15h-16h'=>0,// 15h-16h
        '16h-17h'=>0,// 15h-16h
        '17h-18h'=>0,// 17h-18h
        '18h-19h'=>0,
        '19h-20h'=>0,// 19h-20h
        '20h-21h'=>0 // 21h-22h
    
    
];
foreach($code as $contenu){
    $exp=explode(";",$contenu);
    if($exp[9] === "traitement" && $exp[8] === "code secret"){

    $horaire = $exp[10];
    $heure=(int) explode(":",$horaire)[0];
    foreach($horairecode as $ref){
        $refere=$ref[0]."h-".$ref[1]."h";
        if($heure >= $ref[0] && $heure < $ref[1])
        $referencecode[$refere]++;
    }
    }
}


echo "<table border='1'style='text-align:center;position:relative;width:45%;top:20%;background-color:white;color:black'>";
echo "<tr><th colspan='2'>CODE SECRET</th></tr>";
echo "<tr><th >TRANCHE</th><th >PROD</th></tr>";
foreach($referencecode as $key=>$value){
    
   echo "<tr><td>".$key."</td><td>".$value."</td></tr>";
}
echo "</table >";
echo "</div>";

echo "</div>";
function redirection(){
    if(isset($_POST["redir"])){
        header("location:supervision.php");
    }
}

redirection();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASH BOARD</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
              canvas {
            background-color: white;
            margin: 20px;
            max-width: 900px;
            max-height: 400px;
        }
    </style>
</head>
<body style="opacity:0.9;position:relative;display:flex;flex-direction:row;justify-content:center;text-align:center;gap:80px;color:orange;font-weight: bold;
 background-image: url('dashmvolabo.jpg'); 
        background-size: 100% 100%; /* Taille de l'image adaptée à l'input */
        background-repeat: no-repeat; /* Empêche la répétition de l'image */
        background-position: left center; /* Positionne l'image à gauche */
       
     
        font-size: 20px; /* Taille du texte */">
   
    <div id="graphique" style=";position:relative;display:flex;flex-direction:column;height:90%;width:50%;background-color:'';">
   
    <canvas id="lineChart" width="300" height="200" style="background-color:white;color:black;font-weight:bold;opacity:3;"></canvas>
    <br>
    <canvas id="barChart" width="300" height="200"style="background-color:white;color:black;font-weight:bold"></canvas>

    </div>
    <form action="" method="POST">
    <button type="submit"  style='background-color:red;color:white'>REFRESH</button>
    <button type="submit" name="redir" style='background-color:red;color:white'>SUPERVISION</button>
    </form>
    <script>
                // Graphique en Courbe (Line Chart)
                var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',   
            data: {
                labels: ['7h-8h', '8h-9h', '9h-10h', '10h-11h', '11h-12h', '12h-13h',
    '13h-14h', '14h-15h', '15h-16h', '16h-17h', '17h-18h', '18h-19h', '20h-21h'] ,
        
                datasets: [{    
                    label: 'PRODUCTION',
                    data: <?php echo json_encode($data); ?> ,  // Valeurs pour chaque mois
                    borderColor: '#FF5733',  // Couleur de la ligne
                    backgroundColor: 'rgba(255, 87, 51, 0.2)',  // Couleur de fond sous la ligne
                    fill: true,  // Remplir sous la courbe
                    tension: 0  // Courbure de la ligne
                }]
            },
            options: {
                 responsive: true,
                 plugins: {
                      title: {
                    display: true,           // Afficher le titre
                      text: 'PRODUCTION GLOBALE PAR TRANCHE HORAIRE', // Titre du graphique
                      color:'black',
                      size:15
                   }
                },
           scales: {
            x: {
            ticks: {
                color: 'black',       // Couleur des ticks (valeurs des axes X)
                font: {
                    size: 10,         // Taille de la police des valeurs sur l'axe X
                    weight: 'bold'    // Poids de la police des valeurs (gras)
                }
            }
            },

              y: {
            beginAtZero: true, // Corrigé ici : il faut utiliser "beginAtZero"
            ticks: {
                stepSize: 1,  // Valeurs y par tranche de 1
                color: 'black'
               }
              
             }
         }
             } 
        });

    //   pour certif
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['certification','code secret'] ,
                datasets: [{
                    label: 'TACHE',
                    data: <?php echo json_encode($dispatch); ?> ,  // Valeurs pour chaque mois
                    backgroundColor: '#5cb85c',  // Couleur des barres
                    borderColor: '#4cae4c',  // Couleur des bordures des barres
                    borderWidth: 1
                }]
            },
            options: {
                 responsive: true,
                 plugins: {
                      title: {
                    display: true,           // Afficher le titre
                      text: 'PRODUCTION PAR FILE ', // Titre du graphique
                   }
                },
           scales: {
              y: {
            beginAtZero: true, // Corrigé ici : il faut utiliser "beginAtZero"
            ticks: {
                stepSize: 1  // Valeurs y par tranche de 1
               }
             }
         }
             } 
        });

    </script>
</body>
</html>