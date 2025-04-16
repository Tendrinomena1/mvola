<?php
ini_set('display_errors', 0);
error_reporting(0);

// Mais tu peux toujours enregistrer les erreurs dans un fichier log
// ini_set('log_errors', 1);
// ini_set('error_log', '/chemin/vers/le/fichier/log/php_error.log');
class sql{
    public function __construct() {
        ob_start();  // Démarre la mise en tampon de la sortie
       

}
    public function check(){
     
        date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
        $datefin=date("H:i:s");
        $affectation=file("affectation.txt",FILE_IGNORE_NEW_LINES);
       

        $cookie=file("cookie.txt",FILE_IGNORE_NEW_LINES);
        $comptage=0;
        foreach($_COOKIE as $nom=>$valeur){
            $u;
            $combinaison=$nom.";".$valeur;
            if(in_array($combinaison,$cookie)){ 
             $u=$nom;
             $comptage++;
            }
          
   
            
        }
        if($comptage!==1){
            header("location:index.php");
        }
        
           
          

            foreach($affectation as $affect){
                $exp=explode(";",$affect);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                if($u===$exp[0]){
                   $aff= $exp[1];
                    
                }
               
            }
    
        
      
        echo "<script>
                document.getElementById('session').value='$u';
                document.getElementById('task').value='$aff';
                

            </script>";
    }

        // public function hidetraitement(){
        //     $ce=file("certification.txt",FILE_IGNORE_NEW_LINES);
        //     $cedemande=file("certificationdemande.txt",FILE_IGNORE_NEW_LINES);
        //     $cod=file("code secret.txt",FILE_IGNORE_NEW_LINES);
        //     $coddmeande=file("code secretdemande.txt",FILE_IGNORE_NEW_LINES);
        //     $certifcompte=count($ce)- count($cedemande);
        //     $codecompte=count($cod)- count($coddmeande);
        //     if(!empty($_POST["task"]) && $_POST["task"]=="certifcation" ){
        //         echo "<script> document.getElementById('basepredictif').value='$certifcompte' ;</script> ";
        //     }
        //     elseif (!empty($_POST["task"]) &&  $_POST["task"]=="code secret" && $codecompte <=0 ) {
        //         echo "<script> document.getElementById('basepredictif').value='$codecompte' ;</script> ";
        //     } 

               
            
        // }

        public function traitement(){
           
            date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
            if(isset($_POST["work"])){
              
              
                $today = date("d-m-Y");
                $x=$_POST["task"];
                  
                $datefin=date("H:i:s");
                if((!empty($_POST["session"]))){
                $traitementall=fopen("traitement.txt","a");
                $base=fopen($x.".txt","r");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $demande=fopen($x."demande.txt","a");
                $traitementdelet=fopen($x."traitement.txt","a");
                
                $resultat=fopen("resultat.txt","a");
                

                fwrite($demande,
                htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                "traitement" . "\n"
            );
            
                fwrite($resultat,
                htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            

              ftruncate($traitementdelet,0);
              $reouverturedufichierdemande=fopen($x."demande.txt","r");
              $tritementpropre=fopen($x."traitement.txt","a");
              while(($redem=fgets($reouverturedufichierdemande))!==FALSE){
                $basefile=trim(fgets($base));
                $redema=trim($redem);
                $columns=explode(";",$basefile);
                fwrite($tritementpropre,
                htmlspecialchars($columns[0], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($columns[1], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($columns[2], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($columns[3], ENT_QUOTES, 'UTF-8') . ";" .
              
               
               
                htmlspecialchars($redema, ENT_QUOTES, 'UTF-8') . "\n"
            );
            
              }
              
              $catchnewdata=fopen($x."traitement.txt","r");
              while(($catch=fgetcsv($catchnewdata,1000,";"))!==FALSE){
                $a=$catch[0];
                $b=$catch[1];
                $c=$catch[2];
                $d=$catch[3];
                $e=$catch[4];
                $f=$catch[5];
                $g=$catch[6];

              }

              fwrite($traitementall,
    htmlspecialchars($a, ENT_QUOTES, 'UTF-8') . ";" .
    htmlspecialchars($b, ENT_QUOTES, 'UTF-8') . ";" .

htmlspecialchars($e, ENT_QUOTES, 'UTF-8') . ";" .
    
    htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
    "traitement" . ";" .
    htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
    htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
        
              echo "<script>
                     document.getElementById('name').value='$e';
                      document.getElementById('souscripteur').value='$d';
                       document.getElementById('numero').value='$a';
                        document.getElementById('statut').value='traitement';
                        document.getElementById('typologie').value='$c';
                        document.getElementById('ticket').value='$b';


                     </script>";
              


  }
            else{
                date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
                $today = date("d-m-Y");
                $resultat=fopen("resultat.txt","a");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $datefin=date("H:i:s");
              
                fwrite($resultat,
                htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            fwrite($demandeavecattente,
            "" . ";" . "" . ";" .
            htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "deconnexion" . "\n"
        );
        
                
                header("location:index.php");


            }
        
        }
         elseif(isset($_POST["break"])){
            $datefin=date("H:i:s");
            if((!empty($_POST["session"]))){
                $today = date("d-m-Y");
               $demandeavecattente=fopen("demandeavecattente.txt","a");
           
               $resultat=fopen("resultat.txt","a");
               

               fwrite($demandeavecattente,"".";".$_POST["numero"].";".$_POST["session"].";".$datefin.";".$_POST["pause"]."\n");
               fwrite($resultat,
               htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
           );
           
               
               $a=$_POST["session"];
               $pause=$_POST['pause'];
              
           
              
             
              echo "<script>
                     document.getElementById('name').value='$a';
                      document.getElementById('souscripteur').value='';
                       document.getElementById('numero').value='';
                         document.getElementById('statut').value='$pause';

                     </script>";
              


            }
            else{
                date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
                $today = date("d-m-Y");
                $resultat=fopen("resultat.txt","a");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $datefin=date("H:i:s");
               
                fwrite($resultat,
                htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            fwrite($demandeavecattente,
            "" . ";" . "" . ";" .
            htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "deconnexion" . "\n"
        );
        

                
                header("location:index.php");


            }

        }
        elseif(isset($_POST["quit"])){
            $datefin=date("H:i:s");
            if((!empty($_POST["session"]))){
                $today = date("d-m-Y");
               $demandeavecattente=fopen("demandeavecattente.txt","a");
               $resultat=fopen("resultat.txt","a");
               

        
               fwrite($resultat,
               htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
               htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
           );
           
           fwrite($demandeavecattente,
           "" . ";" .
           htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
           htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
           htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
           "deconnexion" . "\n"
       );
       
               $a=$_POST["session"];
                if( !empty($_POST["session"])){
                 setcookie($_POST["session"],"",time()-9000);
                }
                elseif(!empty($_POST["name"])){
                 setcookie($_POST["name"],"",time()-9000);
                }
                header("location:index.php");
                exit();
            }
            else{
                date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
                $today = date("d-m-Y");
                $resultat=fopen("resultat.txt","a");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $today = date("d-m-Y");
               
                fwrite($resultat,
                htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            fwrite($demandeavecattente,
            "" . ";" . "" . ";" .
            htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "deconnexion" . "\n"
        );
        

                
                header("location:index.php");
                       


            }

        }
        

    }
    public function traitementmanuel(){
        if(isset($_POST["manuel"])){
            if(!empty($_POST["session"])){
               
                $today = date("d-m-Y");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $resultat=fopen("resultat.txt","a");
                $datefin=date("H:i:s");
                fwrite($resultat,
                htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            
            fwrite($demandeavecattente,
            "" . ";" .
            htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "manuel" . "\n"
        );
        
                
                echo "<script>
                 document.getElementById('m').value = 'Traitement manuel';
               document.getElementById('m').style.backgroundColor = 'green';
               </script>";

            }
            else{
                $today = date("d-m-Y");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $resultat=fopen("resultat.txt","a");
                $datefin=date("H:i:s");
                fwrite($resultat,
                htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            fwrite($demandeavecattente,
            ";" .
            htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "deconnexion" . "\n"
        );
        
                header("location:index.php");
            }
            
           
           

        }
    }
    public function appel(){
        if(isset($_POST["appel"])){
            if(!empty($_POST["session"])){
               
                $today = date("d-m-Y");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $resultat=fopen("resultat.txt","a");
                $datefin=date("H:i:s");
                fwrite($resultat,
                htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            
            fwrite($demandeavecattente,
            ";" .
            htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($_POST["session"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "APPEL" . "\n"
        );
        
                
                echo "<script>
                 document.getElementById('m').value = 'APPEL';
               document.getElementById('m').style.backgroundColor = 'blue';
               document.getElementById('m').style.color = 'white';
                 document.getElementById('statut').value='APPEL';
               </script>";

            }
            else{
                $today = date("d-m-Y");
                $demandeavecattente=fopen("demandeavecattente.txt","a");
                $resultat=fopen("resultat.txt","a");
                $datefin=date("H:i:s");
                fwrite($resultat,
                htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["numero"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["souscripteur"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["ticket"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["typologie"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["qualification"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["motifrejet"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["m"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["task"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["statut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($_POST["datedebut"], ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
                htmlspecialchars($today, ENT_QUOTES, 'UTF-8') . "\n"
            );
            fwrite($demandeavecattente,
            ";" .
            htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8') . ";" .
            htmlspecialchars($datefin, ENT_QUOTES, 'UTF-8') . ";" .
            "deconnexion" . "\n"
        );
        
                header("location:index.php");
            }
        }
    }
  
 }
?>