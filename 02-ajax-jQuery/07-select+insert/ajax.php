<?php

require_once('init.php');
extract($_POST);

/*
en mode insertion
mode = envoi
personne = 'un prenom'
*/

if(isset($mode)&& $mode == 'envoi'){

    $result = $pdo->prepare("INSERT INTO employes (prenom) VALUES (:personne)");
        if ( $result->execute(array('personne' => $personne))){


    $tab['validation']= 'ok';

    echo json_encode($tab); // { 'validation' :'ok'}

    
}

}
else{

$tab = array();
$tab['resultat'] = '';

$result=$pdo->prepare("SELECT * FROM employes ORDER BY nom");
$result->execute();

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
}


echo json_encode($tab);

