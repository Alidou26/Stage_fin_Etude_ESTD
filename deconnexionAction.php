<?php

session_start();

//mettre tous les donnees dans un tableau

$_SESSION=array();

//supprimer la session

session_destroy();

unset($_SESSION);

//redirection vers l'index

header('location: index.php');



?>