<?php

include("../BD.php");

extract($_GET);


if(!empty($id) && !empty($dateDebut) && !empty($dateFin)){


    $convDate = strtotime($dateDebut);
    $dateDebut = date("Y-m-d", $convDate);
    $convDate = strtotime($dateFin);
    $dateFin = date("Y-m-d", $convDate);

$recherche=$bd->prepare("SELECT * from colis where id_client=? and  date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");
 
$recherche->execute(array($id));

$resultat=$recherche->fetchAll();

//nom entreprise

$nomE=$bd->prepare("SELECT * from clients where id_client=? ");

$nomE->execute(array($id));

$nom= $nomE->fetch();


//somme totale

$montant=$bd->prepare("SELECT sum(valeur) as sommeTotal from colis where  id_client=? and date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");

$montant->execute(array($id));

$somme=$montant->fetch();

// benefice total

$com=$bd->prepare("SELECT sum(commission) as totalcommission from colis where id_client=? and date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");

$com->execute(array($id));

$commission=$com->fetch();

$benefice=$commission['totalcommission'];

//total a envoyer

$sommeRetourner= $somme['sommeTotal']-$benefice;



function numFacture($length=5){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}

}

?>
