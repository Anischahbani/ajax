<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>deleteid selectid  Ajax jQuery</title>
</head>
<body>
    <form method="post" action="#">
    <div id="employes" style="display:inline">
        <?php
        require_once('init.php');
        $resul = $pdo->query("SELECT * FROM employes");
        echo '<select name="personne" id="personne">';
        while ( $employe = $resul->fetch(PDO::FETCH_ASSOC)){

            echo'<option value="'.$employe['id_employes'].'">'.$employe['prenom'].'</option>';
        
        }
        echo'</select>';
        ?>
    </div>
    <input type="submit" value="Supprimer" id="submit">
    </form>
    <div id="resultat"></div>
<script src="jquery-3.3.1.min.js"></script>
<script src="ajax.js"></script>
</body>
</html>