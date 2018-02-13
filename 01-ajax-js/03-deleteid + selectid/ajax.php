<?php

require_once('init.php');

extract($_POST);


$result = $pdo->prepare("DELETE FROM employes WHERE id_employes= :id");
$result->execute(array('id' => $id));

// je regénère la liste des prénoms
$tab = array();
$tab['resultat']='';

$result = $pdo->query("SELECT * FROM employes");
$tab['resultat'] .='<select name="personne" id="personne">';
while ( $employe = $result->fetch(PDO::FETCH_ASSOC) ){

    $tab['resultat'] .='<option value="'.$employe['id_employes'].'">'.$employe['prenom'].'</option>';
}
$tab['resultat'] .='</select>';

echo json_encode($tab);
?>