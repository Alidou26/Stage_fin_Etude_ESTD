<?php
require('BD.php');

if(isset($_GET['id'])){

    $enregistrer=$bd->prepare("DELETE FROM `clients` WHERE id_client=?");
    $enregistrer->execute(array($_GET['id']));

    header("location:ListeClient.php");
}


?>