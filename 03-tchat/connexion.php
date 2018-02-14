<?php

require_once('inc/init.php');0

//Traitement du Formulaire en post
if (isset($_POST['connexion'])){ // si on clique sur connexion

    $resultat = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $resultat->execute( array('pseudo' => $_POST['pseudo']));
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);

    if( $resultat->rowCount() == 0 ){
        //insertion en base d'un nouveau membre
    }

    elseif( $resultat->rowCount()>0 && $membre['id'] == $_SERVER['REMOTE_ADDR']){

        //Le pseudo est connu et l'internaute est proprietaire du pseudo (meme IP) 
        // On met à jour la date de connexion
    }
    else{
        $msg .='<div class="erreur">Ce pseudo est déja réservé </div>' ;   
    }

    if(empty($msg)){

        //remplir $_SESSION et rediriger vers index.php
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="inc/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body>
    <?= $msg ?>
    
    <div class="row">
    <div class="col-xs-6 col-xs-push-3 well">
         <form method="post" action="">
            <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" id="pseudo" value=""><br>
            </div>
            <div class="form-group">
            <label for="civilite">Civilité</label>
            <input type="radio" name="civilite" value="f"checked>  Femme
			<input type="radio" name="civilite" value="m"> Homme <br>
            </div>
            <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value=""><br>
            </div>
            <div class="form-group">
            <label for="date_de_naissance">Date de naissance (YYYY-MM-DD) </label>
            <input type="text" name="date_de_naissance" id="date_de_naissance" class="form-control" value=""><br>
            </div>
            <div class="form-group">
            <button type="submit" class ='btn btn-success btn-block' style="margin-top: 25px;">Connexion au Tchat</button>
            </div>
        </form>
    </div>
    </div>


</body>
</html>