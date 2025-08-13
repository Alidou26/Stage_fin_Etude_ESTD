<?php
session_start();

require('BD.php');

$reponse=-1;


    //verifier que les champs ne sont  pas vide

   if(!empty($_POST['nom'])  && !empty($_POST['commission'])){
  
    $nom=strtoupper(htmlspecialchars($_POST['nom']));
    $id=htmlspecialchars($_POST['id']);
    $email= htmlspecialchars(($_POST['email']));
    $adresse=htmlspecialchars(($_POST['adresse']));
    $commission=htmlspecialchars(($_POST['commission']));
    $tel=htmlspecialchars(($_POST['tel']));
    //faire la modification
 



    $enregistrer=$bd->prepare("UPDATE `clients` SET `nom_client`=?,`adresse_client`=?,`email_client`=?,`telephone_client`=?,`commission`=? WHERE id_client=?");

    if($enregistrer->execute(array($nom, $adresse,$email,$tel, $commission,$id))){
        $reponse=1;
    } ;
    
 
 

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
                 $enregistreModif=$bd->prepare("UPDATE `clients` SET `logo_client`=? WHERE id_client=? ");

                 $enregistreModif->execute(array($dest_photo,$id)) ;
                 
             
                 

               $reponse=1;
             }

         }
         else{
            $reponse="Veuillez choisir une image en jpg ou jpeg ou png";
         }
       
    }

  
   }else{
    $reponse="Veuillez remplir correctement tous les champs !";
   }


   echo json_encode($reponse);
?>