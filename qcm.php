<?php 
//démarer la session
session_start();
//verifier si la session name et niveau existe
if(!isset($_SESSION['name'])){
    header('location:index.php'); // si le pseudo n'existe pas redirection vers index.php
}

if(!isset($_SESSION['niveau'])){
    header('location:niveau.php'); // si le pseudo n'existe pas redirection vers index.php
}
    
$niveau = $_SESSION["niveau"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qcm page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include "menu.php" ;
        //include la page de connexion
        include "connect.php"
    ?>
    <section class="qcm">
        <form action="reponse.php" method="POST">
           <?php 
                //liste des questions et des réponses
                $req = "SELECT * from questions WHERE niveau=1 ORDER BY rand() limit 5";
                //executer la requette
                $res = mysqli_query($id,$req);
                //afficher les questions
             
            
                    echo "<ol>" ;
                    while($ligne =mysqli_fetch_assoc($res)){
                        $idq = $ligne['idq'] ;
                    ?>
                    <h3 class="question"><li><?=$ligne['libelleQ']?></li></h3>
                    <?php 
                    // afficher les réponses associées a ces questions;
                    $req2 = "SELECT * FROM reponses WHERE idq =$idq";
                    //executer la requette 
                    $res2 = mysqli_query($id,$req2);
                    //afficher les questions
                    while($ligne2 = mysqli_fetch_assoc($res2)){
                        ?>
                        <input type="radio" name="<?=$idq?>" value="<?=$ligne2['idr']?>" required><?=$ligne2['libeller']?> <br>
                        <?php
                        }
                    }
                    ?>
                    
    
                
            

            <input type="submit"  class="style_btn" value="Envoyer">
        </form>
    </section>
</body>
</html>