<?php

require_once('inc/init.php');

if(!isset($_SESSION['pseudo'])){ // si on a pas de pseudo enregistré en session , c'est que je ne suis pas passé par la page connexion

    header('location:connexion.php');
}