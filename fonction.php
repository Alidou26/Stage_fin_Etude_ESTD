<?php

require("BD.php");


//obtenir tous les utilisateurs 

function getPartenaire(){
    global $bd;
    $query=$bd->prepare("SELECT * FROM clients");
    $query->execute();
    $run= $query->fetchAll();
 return  $run;

}

function getPartenaireById($id){
    global $bd;
    $query=$bd->prepare("SELECT * FROM clients where id_client=?");
    $query->execute(array($id));
    $run= $query->fetch();
 return  $run;

}

//obtenir tous les utilisateurs 

function getCommande(){
    global $bd;
    $query=$bd->prepare("SELECT * FROM colis,clients where colis.id_client= clients.id_client ");
    $query->execute();
    $run= $query->fetchAll();
 return  $run;

}

function getCom($etat){
    global $bd;
    $query=$bd->prepare("SELECT * FROM colis,clients where colis.id_client= clients.id_client and etat=?");
    $query->execute(array($etat));
    $run= $query->fetchAll();
 return  $run;

}




function getCommandeById($id){
    global $bd;
    $query=$bd->prepare("SELECT * FROM colis, clients where colis.id_client = clients.id_client and colis.id_colis=?");
    $query->execute(array($id));
    $run= $query->fetch();
 return  $run;

}
?>