<?php 
//Connexion BDD
$pdo= new PDO ('mysql:host=localhost;dbname=tchat',
'root',
'',
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


//ouverture de session
session_start();


//initialisation variable
$msg= '';

//Fonction de calcul d'age à partir d'une date de naissance sous la forme AAAA-MM-JJ
function age($naiss){

    list($y, $m, $d ) = explode('-',$naiss);
    if (($m = date('m') - $m ) < 0)
    {
        $y++;
    }
    elseif( $m == 0 && (date('d') - $d < 0 ))
    {
        $y++;
    }
    return date('Y') - $y;
}
