
<?php 
   header("refresh:1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display:flex;text-align:center;">
    <div name="code secret" style="background-color:'';margin: 3px; padding: 1px;">
   
    <?php
      
     echo "<table border='1'>";
     $code=file("code secret.txt");
     $trait=file("code secrettraitement.txt");
     echo "CODE:".count($code)."<br>";
     echo "Traité: ".count($trait)."<br>";
     echo "Reste: ".count($code)-count($trait);
     $counta=0;
    
     $max=file("max.txt",FILE_IGNORE_NEW_LINES);
     foreach ($max as $code) {
        $expl = explode(";", $code);
        if (isset($expl[5]) && $expl[5] == "code secret") {
            $counta++;
        }
    }
     echo "<tr><th>AFFECTED ($counta) </th></tr>"; // En-têtes du tableau
             
            
            foreach($max as $code){
                $expl=explode(";",$code);
                if($expl[5]=="code secret"){
                    echo "<td>".$expl[2]."</td>";
                    $counta++;
                   $p=$counta;
                    
                    
                }
               
                echo "</tr>";
            }
            
     echo "</table>";
     

    ?>
    </div>
    <br> <br><br>

    <div name="certification  " style="background-color:'';margin: 3px; padding: 1px;">
    
    <?php
     
     $certification=file("certification.txt");
     $traitecertif=file("certificationtraitement.txt");
     echo "CERTIFICATION:".count($certification)."<br>";
     echo "Traité:".count($traitecertif)."<br>";
     echo "reste:".count($certification)-count($traitecertif)."<br>";
    $max=file("max.txt",FILE_IGNORE_NEW_LINES);
    $counta=0;
    foreach($max as $code){
        $expl=explode(";",$code);
        if($expl[5]=="certification"){
           
            $counta++;
            $p=$counta;
             
        }
        
        echo "</tr>";
    }
     echo "<table border='1'>";
     echo "<tr><th>AFFECTED ($counta)</th></tr>"; // En-têtes du tableau
             
             $counta=0;
            foreach($max as $code){
                $expl=explode(";",$code);
                if($expl[5]=="certification"){
                    echo "<td>".$expl[2]."</td>";
                    $counta++;
                    $p=$counta;
                     
                }
              
                echo "</tr>";
            }
     echo "</table>";

    ?>
    </div>


    <br> <br><br>

<div name="fo  " style="background-color:'';margin: 3px; padding: 1px;">

<?php
 
 $as=file("AS.txt");
 
 $traiteAS=file("AStraitement.txt");
     echo "FO AS:".count($as)."<br>";
     echo "Traité:".count($traiteAS)."<br>";
     echo "reste:".count($as)-count($traiteAS)."<br>";
$max=file("max.txt",FILE_IGNORE_NEW_LINES);
$counta=0;
foreach($max as $code){
    $expl=explode(";",$code);
    if($expl[5]=="AS"){
       
        $counta++;
        $p=$counta;
         
    }
    
    echo "</tr>";
}
 echo "<table border='1'>";
 echo "<tr><th>AFFECTED ($counta)</th></tr>"; // En-têtes du tableau
         
         $counta=0;
        foreach($max as $code){
            $expl=explode(";",$code);
            if($expl[5]=="AS"){
                echo "<td>".$expl[2]."</td>";
                $counta++;
                $p=$counta;
                 
            }
          
            echo "</tr>";
        }
 echo "</table>";

?>
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
    </script>
    
</body>
</html>
