<?php ob_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORK</title>
    <link rel="stylesheet" href="agenta.css">
</head>
<body style="position:absolute;align-items:center;height:98%;width:95%;">
<form action="" method="post" style="position:relative;opacity:0.85; top:3%; width:90%;height:90% ; rgb(107, 56, 12);">
        <h1 style="position:relative;transform:scale(4);top:-5%">BO MVOLA </h1>
        <div style="position:relative;display:flex;flex-direction:row; gap: 10px;">
        <input type="text" name="m" id="m"value="Traitement predictif" style="text-align: center;" readonly>
        <br>
        <input type="text" name="chrono" id="chrono" style="text-align: center;" readonly>
        <br>
        <input type="text" name="statut" id="statut" style="text-align: center;" readonly>
        <br>
        <input type="text" name="task" id="task" placeholder="task" style="text-align: center;" readonly>
        <br>       
        <input type="hidden" name="session" id="session" style="text-align: center;" readonly>
        <br>
        <input type="hidden" name="name" id="name" style="text-align: center;" readonly>
        <br>
        <input type="text" name="basepredictif" id="basepredictif" style="text-align: center;"  readonly>
        </div>
        <br>
        <div style="position:relative;width:50%;display:flex;flex-direction:row; gap: 10px;">
        <div style="position:relative;display:flex;flex-direction:column; gap: 10px; background-color:black;width:90%;justify-content:center;align-items:center">
        <h1  style="text-align: center;">INFORMATION CLIENT</h1>
        <input type="text" name="souscripteur" id="souscripteur" style="text-align: center;position:relative"  placeholder="Annimateur / Souscripteur">
        <br>
        <input type="text" name="numero" id="numero" style="text-align: center;" readonly placeholder="MISSDN">
        <br>
        <input type="text" name="ticket" id="ticket" style="text-align: center;" readonly placeholder="ticket">
        <br>
        <input type="text" name="typologie" id="typologie" style="text-align: center;" readonly placeholder="TYPOLOGIE">
        <br>
        <select name="qualification" id="qualification" style="text-align: center;height:6%;width:32%;font-family:bold">
        <option value=""></option>
            <option value="certifié">Certifié</option>
            <option value="rejet">Rejeté</option>           
        </select>
        <br>
        <select name="motifrejet" id="motifrejet" style="text-align: center;height:6%;width:32%;font-family:bold">
        <option value=""></option>
        <option value="MSISDN_erronee">MSISDN Erronee ou manquant VS SENTINEL</option>
<option value="compte_deja_certifie">Compte deja certifie</option>
<option value="numero_piece_identite_erronee">Numero de piece d'identite erronee ou manquante</option>
<option value="signature_non_conforme">Signature Non conforme manquante VS piece d'identite</option>
<option value="contrat_falsifie">Contrat falsifie – collage, rature, blanco, ….</option>
<option value="activite_non_cochee">Activite non cochee ou AUTRE sans mention sur le contrat</option>
<option value="contrat_illisible">Contrat illisible</option>
<option value="informations_contrat_incorrectes">Informations contrat incorrectes</option>
<option value="informations_contrat_manquantes">Informations contrat manquantes</option>
<option value="info_souscripteur_manquante">Info souscripteur manquante</option>
<option value="contrat_manquant">Contrat manquant</option>
<option value="piece_identite_falsifiee_capture">Piece d'identite falsifiee – capture d'ecran</option>
<option value="piece_identite_falsifiee_sans_plastification">Piece d'identite falsifiee sans plastification</option>
<option value="photo_identite_ecrasee">Photo d'identite ecrasee ou remplacee</option>
<option value="piece_identite_falsifiee_blanco_nom_prenom">Piece d'identite falsifiee avec blanco – nom et prenom</option>
<option value="piece_identite_falsifiee_ratures_nom_prenom">Piece d'identite falsifiee avec ratures – nom et prenom</option>
<option value="piece_identite_falsifiee_infos_rajoutees_nom_prenom">Piece d'identite falsifiee avec informations rajoutees – nom et prenom</option>
<option value="piece_identite_falsifiee_suspicions_fraude">Piece d'identite falsifiee – suspicions de fraude</option>
<option value="piece_identite_falsifiee_infos_rajoutees_date_naissance">Piece d'identite falsifiee avec informations rajoutees – date de naissance</option>
<option value="piece_identite_falsifiee_blanco_date_naissance">Piece d'identite falsifiee avec blanco – date de naissance</option>
<option value="piece_identite_falsifiee_ratures_date_naissance">Piece d'identite falsifiee avec ratures – date de naissance</option>
<option value="piece_identite_falsifiee_blanco_num_cin">Piece d'identite falsifiee avec blanco – N° CIN</option>
<option value="piece_identite_falsifiee_ratures_num_cin">Piece d'identite falsifiee avec ratures – N° CIN</option>
<option value="piece_identite_falsifiee_infos_rajoutees_num_cin">Piece d'identite falsifiee avec informations rajoutees – N° CIN</option>
<option value="piece_identite_falsifiee_blanco_date_delivrance">Piece d'identite falsifiee avec blanco – date de delivrance / duplicata</option>
<option value="piece_identite_falsifiee_ratures_date_delivrance">Piece d'identite falsifiee avec ratures – date de delivrance / duplicata</option>
<option value="piece_identite_falsifiee_infos_rajoutees_date_delivrance">Piece d'identite falsifiee avec informations rajoutees – date de delivrance / duplicata</option>
<option value="piece_identite_illisible">Piece d'identite illisible</option>
<option value="piece_identite_manquante">Piece d'identite manquante</option>
<option value="piece_identite_photocopiee_scanee">Piece d'identite photocopiee ou scanee</option>
<option value="piece_identite_infos_manquantes">Piece d'identite avec informations manquantes</option>
<option value="piece_identite_perimee">Piece d'identite perimee</option>
<option value="photo_piece_identite_illisible">Photo piece d'identite illisible</option>
<option value="piece_identite_recto_mauvaise_qualite">Piece d'identite recto de mauvaise qualite</option>
<option value="piece_identite_recto_manquante">Piece d'identite recto manquante</option>
<option value="piece_identite_verso_mauvaise_qualite">Piece d'identite verso de mauvaise qualite</option>
<option value="piece_identite_falsifiee_signature_client_plastification">Piece d'identite falsifiee avec signature client sur la plastification</option>
<option value="piece_identite_verso_manquant">Piece d'identite verso manquante</option>
<option value="personne_illetree_sans_signature">Personne illetree et/ou sans signature</option>
<option value="photo_identite_illisible">Photo d'identite illisible</option>
<option value="photo_non_eligible">Photo non eligible</option>
<option value="photo_manquante">Photo manquante</option>
<option value="photo_identite_live_differente">Photo d'identite live differente de la photo d'identite du CIN</option>
<option value="identite_client_différente_vs_pj">Identite du client differente VS PJ</option>
<option value="adresse_erronee_manquante_vs_contrat">Adresse erronee / manquante VS contrat</option>
<option value="compte_utiba_non_cree">Compte UTIBA non cree</option>
<option value="informations_systemes_incorrectes">Informations systemes incorrectes</option>
<option value="compte_n_existe_pas_hlr">Compte n'existe pas sur HLR</option>
<option value="RAS">RAS</option>
<option value="0_dossier">0-Dossier</option>
<option value="en_attente_adjudication_manuel">En attente adjudication manuel</option>
<option value="multicompte">Multicompte</option>
<option value="erreur">Erreur</option>
<option value="fiche_client_inexistant">Fiche client inexistant</option>
<option value="point_marchand">Point Marchand</option>
<option value="initie">Initie</option>
<option value="a_regulariser">A regulariser</option>
<option value="sim_test">Sim Test</option>
<option value="non_identifie">Non identifie</option>
 
        </select>    
        <br>
        </div>     
        <input type="hidden" name="datedebut" id="datedebut" value=" <?php  ob_start(); date_default_timezone_set('Indian/Antananarivo');echo htmlspecialchars(date("H:i:s")) ;?>" readonly>      
        <br><br>
        <div style="position:relative;display:flex;flex-direction:column; gap: 10px; background-color:black;width:45%;justify-content:center;align-items:center">
        <h1 style="text-align: center;">STATUT</h1>
        <button type="submit" name="work" id="work" style="background-color:red;text-align: center;height:8%;width:78%">Traitement</button>
        <br>
        <select name="pause" id="pause">
            <option value="PAUSE_BREAK">Pause15</option>
            <option value="PAUSE_DEJ">DEJEUNER</option>
            <option value="PAUSE_OSTIE">OSTIE</option>
            <option value="PAUSE_BRIEF">BRIEF</option>
            <option value="PAUSE_COACHING">COACHING</option>
            <option value="PAUSE_FORMATION">FORMATION</option>
            <option value="PAUSE_DO">POINT-DO</option>
        </select>
        <br>
       <button type="submit" name="break" id="break" style="background-color:yellow;text-align: center;height:8%;width:78%">Pause</button>
       <br>   
       <button type="submit" name="appel" id="appel" style="background-color:blue;color:white;text-align: center;height:8%;width:78%">Appel</button>
        <br>     
        <button type="submit" name="manuel" id="manuel" style="background-color:green;text-align: center;height:8%;width:78%">Traitement Manuel</button>
       <br>
        <button type="submit" name="quit" id="quit" style="background-color:orange;text-align: center;height:8%;width:78%">Deconnexion</button> 
        <br><br>
        </div>
        <br>
     </div>
        <br><br>
    </form>
</body>
<?php
function charger($p){
    include($p.".class.php");
}
spl_autoload_register("charger");

$requete= new sql();
// $requete->hidetraitement();
$requete->check();
$requete->traitement();
$requete->traitementmanuel();
$requete->appel();



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

     

     function task() {
    var task = document.getElementById("task");
    var basepredict = document.getElementById("basepredictif");
    var statut = document.getElementById("statut");
    var statvalue = statut.value;
    var val = task.value;
    var m = document.getElementById("m");
    var ma = m.value;

    var base = parseInt(basepredict.value, 10);  // Utilisation de parseInt pour garantir que base est un entier

    var basecertif = '<?php
        $ce = file("certification.txt", FILE_IGNORE_NEW_LINES);
        $cedemande = file("certificationdemande.txt", FILE_IGNORE_NEW_LINES);
        $certifcompte = count($ce) - count($cedemande);
        echo $certifcompte;
    ?>';
    var basecodesecret = '<?php
        $cod = file("code secret.txt", FILE_IGNORE_NEW_LINES);
        $coddmeande = file("code secretdemande.txt", FILE_IGNORE_NEW_LINES);
        $codecompte = count($cod) - count($coddmeande);
        echo $codecompte;
    ?>';

    basecertif = parseInt(basecertif);
    basecodesecret = parseInt(basecodesecret);

    if (val == "certification") {
        basepredict.value = basecertif;
    } else if (val == "code secret") {
        basepredict.value = basecodesecret;
    }

    // Vérification si la valeur de basepredict est <= 0 ou > 0
    if (base <= 0) {
        document.getElementById("work").style.display = 'none'; // Masque si base <= 0
    } else {
        document.getElementById("work").style.display = 'block'; // Affiche si base > 0
    }

    // Autres conditions
    if (val == "AS") {
        window.location.href = "AS.php";
    } else if (statvalue.trim() === "" && ma !== "Traitement manuel") {
        document.getElementById("ticket").style.display = 'none';
        document.getElementById("typologie").style.display = 'none';
        document.getElementById("souscripteur").style.display = 'none';
        document.getElementById("motifrejet").style.display = 'none';
        document.getElementById("qualification").style.display = 'none';
        document.getElementById("numero").style.display = 'none';
        document.getElementById("qualification").removeAttribute("readonly");
    } else if (ma == "Traitement manuel") {
        document.getElementById("numero").removeAttribute("readonly");
        document.getElementById("ticket").removeAttribute("readonly");
        document.getElementById("typologie").removeAttribute("readonly");
        document.getElementById("souscripteur").removeAttribute("readonly");
        document.getElementById("motifrejet").removeAttribute("readonly");
        document.getElementById("qualification").removeAttribute("readonly");
    } else if (ma == "APPEL") {
        document.getElementById("ticket").style.display = 'none';
        document.getElementById("typologie").style.display = 'none';
        document.getElementById("souscripteur").style.display = 'none';
        document.getElementById("motifrejet").style.display = 'none';
        document.getElementById("qualification").style.display = 'none';
        document.getElementById("numero").removeAttribute("readonly");
    } else if (val == "certification") {
        document.getElementById("ticket").style.display = 'none';
        document.getElementById("typologie").style.display = 'none';
    } else if (val == "code secret") {
        document.getElementById("souscripteur").style.display = 'none';
        document.getElementById("motifrejet").style.display = 'none';
        document.getElementById("qualification").style.display = 'none';
    }
}


setInterval(function () { task(); }, 100);  

 
        
  
</script>

</html>