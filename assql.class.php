<?php
 class assql{
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
               
               
        
            </script>";

             

    }

    public function traitement(){
           
        date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
        if(isset($_POST["work"])){
            
            $today = date("d-m-Y");
           
        
            $datefin=date("H:i:s");
            if((!empty($_POST["session"]))){
            $traitementall=fopen("traitement.txt","a");
            $base=fopen("AS.txt","r");
            $demandeavecattente=fopen("demandeavecattente.txt","a");
            $demande=fopen("ASdemande.txt","a");
            $traitementdelet=fopen("AStraitement.txt","a");
            
            $resultat=fopen("resultat.txt","a");
            

            fwrite($demande,$_POST["session"].";".$datefin.";"."traitement"."\n");
            fwrite($resultat,$_POST["session"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";"."AS".";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");
            
           

          ftruncate($traitementdelet,0);
          $reouverturedufichierdemande=fopen("ASdemande.txt","r");
          $tritementpropre=fopen("AStraitement.txt","a");
          while(($redem=fgets($reouverturedufichierdemande))!==FALSE){
            $basefile=trim(fgets($base));
            $redema=trim($redem);
            fwrite($tritementpropre,$basefile.";".$redema."\n");
          }
          
          $catchnewdata=fopen("AStraitement.txt","r");
          while(($catch=fgetcsv($catchnewdata,5000,";"))!==FALSE){
            $a=$catch[0];
          
            $b=@$catch[1];
            $c=@$catch[2];
            $d=@$catch[3];
            $e=@$catch[4];
           
          }

          fwrite($traitementall,$a.";".$b.";".$e.";".$datefin.";"."traitement".";"."AS".";".$today."\n") ;

          echo "<script>
                 document.getElementById('name').value='$e';
                 document.getElementById('nomprenom').value='$c';
                 document.getElementById('info').value='$d';
                  document.getElementById('id').value='$a';
                   document.getElementById('numero').value='$b';
                    document.getElementById('statut').value='traitement';

                 </script>";
          


        }
        else{
            date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
            $today = date("d-m-Y");
            $resultat=fopen("resultat.txt","a");
            $demandeavecattente=fopen("demandeavecattente.txt","a");
            $datefin=date("H:i:s");
          
            fwrite($resultat,$_POST["name"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";"."AS".";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");
            fwrite($demandeavecattente,"".";"."".";".$_POST["name"].";".$datefin.";"."deconnexion"."\n");

            
            header("location:index.php");


        }

    }
     elseif(isset($_POST["break"])){
        $datefin=date("H:i:s");
        if((!empty($_POST["session"]))){
            $today = date("d-m-Y");
           $demandeavecattente=fopen("demandeavecattente.txt","a");
       
           $resultat=fopen("resultat.txt","a");
           

           fwrite($demandeavecattente,$_POST["id"].";".$_POST["numero"].";".$_POST["session"].";".$datefin.";".$_POST["pause"]."\n");
           fwrite($resultat,$_POST["session"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";"."AS".";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");

           
           $a=$_POST["session"];
           $pause=$_POST['pause'];
          
       
          
         
          echo "<script>
                 document.getElementById('name').value='$a';
                  document.getElementById('id').value='';
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
           
            fwrite($resultat,$_POST["name"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";"."AS".";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");
            fwrite($demandeavecattente,"".";"."".";".$_POST["name"].";".$datefin.";"."deconnexion"."\n");

            
            header("location:index.php");


        }

    }
    elseif(isset($_POST["quit"])){
        $datefin=date("H:i:s");
        if((!empty($_POST["session"]))){
            $today = date("d-m-Y");
           $demandeavecattente=fopen("demandeavecattente.txt","a");
       
           $resultat=fopen("resultat.txt","a");
           

    
           fwrite($resultat,$_POST["session"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";"."AS".";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");

           fwrite($demandeavecattente,$_POST["id"].";".$_POST["numero"].";".$_POST["session"].";".$datefin.";"."deconnexion"."\n");
           $a=$_POST["session"];
          
         
          
         
        //   echo "<script>
        //          document.getElementById('name').value='$a';
        //           document.getElementById('id').value='';
        //            document.getElementById('numero').value='';
        //             document.getElementById('statut').value='deconnexion';
        //          </script>";

        
            if( !empty($_POST["session"])){
                   setcookie($_POST["session"],"",time()-9000);
            }
            elseif(!empty($_POST["name"])){
                setcookie($_POST["name"],"",time()-9000);

            }
            header("location:index.php");
        


        
          


        }
        else{
            date_default_timezone_set('Indian/Antananarivo'); // Fuseau horaire de Madagascar
            $today = date("d-m-Y");
            $resultat=fopen("resultat.txt","a");
            $demandeavecattente=fopen("demandeavecattente.txt","a");
            $today = date("d-m-Y");
           
            fwrite($resultat,$_POST["name"].";".$_POST["numero"].";".$_POST["id"].";".$_POST["datedebut"].";".$datefin.";".$_POST["statut"].";".$today.";".$_POST["commentaire"].";".$_POST["qualification"]."\n");
              fwrite($demandeavecattente,"".";"."".";".$_POST["name"].";".$datefin.";"."deconnexion"."\n");

            
            header("location:index.php");


        }

    }
    

}
 }
?>