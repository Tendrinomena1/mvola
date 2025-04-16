<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WFM AREA</title>
</head>
<body style="position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('wfmbo.jpg');
    background-size: cover; /* Adapte l'image pour couvrir tout le body */
    background-repeat: no-repeat; /* Évite les répétitions de l'image */
    background-position: center; /* Centre l'image */
    height: 100vh; /* Utilisation de la hauteur de la fenêtre */
    width: 100vw; /* Utilisation de la largeur de la fenêtre */
    margin: 0;"> <!-- On enlève les marges par défaut du body -->

   
    
    <form action="" method="post" style="overflow:hidden;opacity:0.7;position:relative;height:35%;width:30%;display:flex; flex-direction:column;background-color:black;align-items: center;text: center;justify-content: center">
    <br>
    <h1 style="color:white" >EXTRACTION DATA</h1>
    <br>
    <br>
    <input type="text" name="date" id="" placeholder="DATE">
    <br>
    <input type="text" name="task" id="" placeholder="Affectation">
    <br>
    <input type="text" name="etat" id="" placeholder="Statut">
    <br>
    <button type="submit" name="extract" >extract</button>
    <br>
    <button type="submit" name="all">DOWN LOAD DB</button>
    <br>
    <br>
    </form>


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
<?php
  if(isset($_POST["extract"])&& !empty($_POST["date"]) && !empty($_POST["task"]) && !empty($_POST["etat"])){
    $data=file("resultat.txt",FILE_IGNORE_NEW_LINES);
    $fileName = "temp_data.csv";
    $fileHandle = fopen($fileName, "w");
    foreach($data as $value){
        $col=explode(";",$value);
        if($_POST["date"]==$col[7] && $_POST["task"]==$col[6] && $_POST["etat"]==$col[5]){
           fwrite($fileHandle,$value."\n");
        }
    }
    
   

    // Écrire les données de base.txt dans le fichier temporaire
  

 

    // Créer un lien pour télécharger le fichier généré
    echo "<script>
        function downloadFile() {
            // Créer un lien temporaire pour le téléchargement du fichier
            const link = document.createElement('a');
            link.href = '$fileName'; // Lien vers le fichier généré par PHP
            link.download = '$fileName'; // Nom du fichier pour le téléchargement
            link.click(); // Cliquer sur le lien pour démarrer le téléchargement
        }

        // Appeler la fonction de téléchargement
        downloadFile();
    </script>";

    echo "DOWNLOADED";
}

if(isset($_POST["all"])){
    $all = file("resultat.txt", FILE_IGNORE_NEW_LINES);  // Lire le fichier "resultat.txt"
    $base = "resultat.csv";  // Nom du fichier de sortie CSV
    $resultat = fopen($base, "w");  // Ouvrir le fichier CSV en mode écriture ("w" écrase le contenu existant)

    // Ajouter les entêtes au fichier CSV
    $entetes = ["CSA", "MISSDN", "SOUSCRIPTEUR","TICKET","TYPO","QUALIFICATION","MOTIF REJET","TPE DE TRAITEMENT","AFFECTATION","STATUT","DEBUT","FIN","DATE",];  // Remplace ces valeurs par les entêtes que tu souhaites
    fputcsv($resultat, $entetes);  // Écrire les entêtes dans le fichier CSV

    // Ajouter les lignes de données à partir du fichier "resultat.txt"
    foreach($all as $put){
        fwrite($resultat, $put."\n");  // Écrire chaque ligne dans le fichier CSV
    }

  


    echo "<script>
        function downloadFile() {
            // Créer un lien temporaire pour le téléchargement du fichier
            const link = document.createElement('a');
            link.href = '$base'; // Lien vers le fichier généré par PHP
            link.download = '$resultat'; // Nom du fichier pour le téléchargement
            link.click(); // Cliquer sur le lien pour démarrer le téléchargement
        }

        // Appeler la fonction de téléchargement
        downloadFile();
    </script>";

    
}

  


?>