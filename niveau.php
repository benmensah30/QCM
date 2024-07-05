<?php session_start() ;
 //si la variable session name n'existe pas , on fait un redirection vers
 // la page index.php
 if(!isset($_SESSION['name'])) header("location:index.php") ; 

//verifier le formulaire
if(isset($_POST['button'])){
 //verifions si le niveau a été choisie d'abord
 if(isset($_POST['niveau'])){
     //enregistrer le niveaudans une veritable session
  $_SESSION['niveau'] = $_POST['niveau'] ;
  //redirection vers la page qcm
  header("location:qcm.php") ;
 }else {
    //si nom
    $error = "Veuillez choisir un niveau" ;
 }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveau page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php 
        //menu

        include "menu.php"
        ?>
    <section class="niveau">
        <h4>Bonjour <span class="change_color"><?=$_SESSION['name']?></span> ,choisissez d'abord le niveau des questions :
        </h4>
        <form action="niveau.php" method="POST">
            <p>Votre niveau actuel est :
                <span class="changer_color">
                    <?php 
                    //afficher le niveau actuel
                    if(isset($_SESSION['niveau'])){
                        //si la variable session['niveau'] existe
                        //si le niveau est egale a 1
                           if($_SESSION['niveau'] == 1) {
                               echo "confirmé";   
                           }else {
                               // si non
                               echo "debutznt";
                           }

                    }else {
                        //si non
                        echo "Aucun";
                    }
                    ?>
                </span>
            </p>
            <p class="error">
                <?php 
                  //afficher l'erreur
                  if(isset($error)) echo $error ;
                ?>
            </p>
            <div class="choices">
                <div class="choice">
                    <input type="radio" name="niveau" value="0">Débutant
                </div>
                <div class="choice">
                    <input type="radio" name="niveau" value="1">Confirmé
                </div>
                <button name="button" class="style_btn">soumettre</button>
            </div>
        </form>
    </section>
</body>
</html>