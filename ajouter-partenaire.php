<?php
session_start();

require('BD.php');

$reponse=false;


    //verifier que les champs ne sont  pas vide

   if(!empty($_POST['nom']) && !empty($_POST['commission'])){
  
    $nom=strtoupper(htmlspecialchars($_POST['nom']));

    $email= htmlspecialchars(($_POST['email']));
    $adresse=htmlspecialchars(($_POST['adresse']));
    $commission=htmlspecialchars(($_POST['commission']));
    $tel=htmlspecialchars(($_POST['tel']));
    //faire la modification

 //verifier si l'entreprise n'existe pas deja

 $verif=$bd->prepare("SELECT*from `clients` WHERE nom_client = ? ");
 $verif->execute(array($nom));

 if($verif->rowcount() > 0  ){
    $reponse="Cette entreprise existe deja ";

 }else{


    $enregistrer=$bd->prepare("INSERT INTO `clients`( `nom_client`, `adresse_client`, `email_client`, `telephone_client`, `commission`) VALUES (?,?,?,?,?)");

    if($enregistrer->execute(array($nom, $adresse,$email,$tel, $commission))){

      $reponse=true;

    }
   
    
 }
 

    if(!empty($_FILES['image']['name'])){

        $dest_photo='image-entreprise/'.$nom.$_FILES['image']['name'];
        $dest='image-entreprise/'.$nom.$_FILES['image']['name'];
        $nom_photo=$_FILES['image']['name'];
         //verifier l'extension de la photo
           
         $extensionPhoto=strrchr($nom_photo,'.');

         $extensionAutorise=array('.jpg','.JPG','.jpeg','.JPEG','.png','.PNG');

         if(in_array($extensionPhoto,$extensionAutorise)){

             //Deplacer l'image dans le dossier image utilisateur

             //verifier si l'image a ete enregistre dans le dossier

             if(move_uploaded_file($_FILES['image']['tmp_name'],$dest_photo)){
                
                 //Enregistrer les donnees de l'utilisateurs dans la base de donnees
                 $enregistreModif=$bd->prepare("UPDATE `clients` SET `logo_client`=? WHERE nom_client=? ");

                 $enregistreModif->execute(array($dest_photo,$nom)) ;

             }

         }
       
    }else{
      $enregistreModif=$bd->prepare("UPDATE `clients` SET `logo_client`=? WHERE nom_client=? ");

                 $enregistreModif->execute(array('image-entreprise/entreprise.jpg',$nom)) ;

    }

  
   }else{

      $reponse="veuillez remplir tous les champs";
   }

   echo json_encode($reponse);
?>