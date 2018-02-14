<?php

require_once('init.php');
extract($_POST);
// je sais que j'ai une entrée 'personne' => 'Laura'
// avec l'extract j'obtiens $personne = 'Laura';

$tab = array();
$tab['resultat'] = '';

$result=$pdo->prepare("SELECT * FROM employes WHERE prenom=:prenom");
$result->execute(array('prenom' => $personne));

$tab['resultat'] .= '<table border="5"><tr>';
$nbcolonnes = $result->columnCount(); 
for( $i=0; $i < $nbcolonnes; $i++){
    $infoscolonne = $result->getColumnMeta($i); 
    $tab['resultat'] .='<th>'.$infoscolonne['name'].'</th>';
}
$tab['resultat'] .="</tr>";

// parcours des enregistrements répondant à la requete
while ($ligne = $result->fetch(PDO::FETCH_ASSOC))
{
    $tab['resultat'] .= "<tr>";
        foreach($ligne as $information){
            $tab['resultat'] .= "<td>$information</td>";
        }
        $tab['resultat'] .="</tr>";
}
$tab['resultat'] .= "</table>";
$tab['validation'] = 'ok';

echo json_encode($tab);

