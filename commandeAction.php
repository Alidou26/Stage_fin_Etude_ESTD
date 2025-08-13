<?php
session_start();

require('BD.php');

$reponse=false;


    //verifier que les champs ne sont  pas vide

   if(!empty($_POST['entreprise'])&&!empty($_POST['code']) &&!empty($_POST['valeur']) &&!empty($_POST['localisation'])&&!empty($_POST['telephone'])){
  
    $nom=strtoupper(htmlspecialchars($_POST['nom']));
    $prenom=strtoupper(htmlspecialchars($_POST['prenom']));
    $idEntreprise=htmlspecialchars(($_POST['entreprise']));
    $code= htmlspecialchars(($_POST['code']));
    $valeur=htmlspecialchars(($_POST['valeur']));
    $etat="Recu";
    $tel=htmlspecialchars(($_POST['telephone']));
    $localisation=htmlspecialchars(($_POST['localisation']));

    //faire la modification
    $idEntreprise=intval($idEntreprise);


 $verif=$bd->prepare("SELECT*from `colis`, clients WHERE colis.id_client=clients.id_client and `references` = ? and clients.id_client=? ");
 $verif->execute(array($code,$idEntreprise));

 if($verif->rowcount() > 0  ){
    $reponse="Ce colis existe déjà ";

 }else{

 
   $commissions=$bd->prepare("SELECT*from clients WHERE id_client=? ");
   $commissions->execute(array($idEntreprise));
   $resultat= $commissions->fetch();
    
   $commission=floatval($resultat['commission']);


    $enregistrer=$bd->prepare("INSERT INTO `colis`( `references`, `valeur`, `nom_recepteur`, `prenom_recepteur`, `adresse_recepteur`, `telephone_recepteur`, `etat`, `date_reception`, `id_client`, `commission`)  VALUES (?,?,?,?,?,?,?,NOW(),?,?)");

    $enregistrer->execute(array($code,$valeur,$nom,$prenom,$localisation,$tel,$etat, $idEntreprise,$commission)) ;

    $reponse=true;
    
 }
 

  
  
   }else{

      $reponse="veuillez remplir tous les champs";
   }


   echo json_encode($reponse);
?>