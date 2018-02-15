<?php

require_once('inc/init.php');

//traitement du formulaire en post
if ( isset($_POST['connexion']) ) // si on clique sur connexion

{
    $resultat = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
    $resultat->execute(array('pseudo' => $_POST['pseudo']) );
    $membre = $resultat->fetch(PDO::FETCH_ASSOC);

    if ( $resultat->rowCount() == 0 )

    {
        // insertion en base d'un nouveau membre
        $result=$pdo->prepare("INSERT INTO membre VALUES(NULL,:pseudo,:civilite,:ville,:date_de_naissance,:ip,".time().")");
        $result->execute(array("pseudo" => $_POST['pseudo'],
                               "civilite" => $_POST['civilite'],
                               "ville" => $_POST['ville'],
                               "date_de_naissance" => $_POST['date_de_naissance'],
                               "ip" => gethostbyname($_SERVER['SERVER_NAME']), ));
        $id_membre=$pdo->lastInsertId();
    }
    elseif( $resultat->rowCount()>0 && $membre['ip'] == gethostbyname($_SERVER['SERVER_NAME']) )
    {
        /* Le pseudo est connu et l'internaut est proprietaire du pseudo (meme IP) */
        // On met à jour la date de connexion
        $result = $pdo->prepare("UPDATE membre SET date_connexion=".time()."WHERE id_membre=:id_membre");
        $result->execute(array('id_membre' => $membre['id_membre']));
        $id_membre=$membre['id_membre'];
    }

else
{
    $msg .= '<div class="erreur">Ce pseudo est déjà reservé</div>';
}
    if(empty($msg))
    {
        // remplir $_SESSION et rediriger vers index.php
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header('location:index.php');
        exit();

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
            <button type="submit" class ='btn btn-success btn-block' style="margin-top: 25px;" name="connexion" id="submit">Connexion au Tchat</button>
            </div>
        </form>
    </div>
    </div>


</body>
</html>