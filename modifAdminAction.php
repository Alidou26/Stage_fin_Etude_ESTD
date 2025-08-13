<?php 

session_start();

extract($_POST);

$reponse=false;

require("BD.php");

//recherche du mot de passe de l`utilisateur connecter pour la modification

    $verif=$bd->prepare("SELECT `mot_de_passe` from `administrateurs` WHERE `id_admin` = ?");

    $verif->execute(array($_SESSION['id_admin']));
     $admin=$verif->fetch();
     
   
    
  
      if(!empty($nom) && !empty($prenom) && !empty($pseudo)){

        if(!empty($pwd)&&!empty($pwd1)){

        if(password_verify($pwd1,$admin['mot_de_passe']) ){
          
         $mot_de_passe=password_hash(htmlspecialchars($pwd),PASSWORD_DEFAULT);
   
            $changeStatus=$bd->prepare('UPDATE `administrateurs` SET `mot_de_passe`= ?, nom=?,prenom=?,nom_utilisateur=? WHERE `id_admin`= ? ');
           
            $changeStatus->execute(array($mot_de_passe,$nom,$prenom,$pseudo,$_SESSION['id_admin']));
           
          
            $verifAdmin=$bd->prepare("SELECT * from `administrateurs` WHERE `id_admin` = ?  ");
            $verifAdmin->execute(array($_SESSION['id_admin']));
    
            $admin=$verifAdmin->fetch();
            
    
            $_SESSION['nom']=$admin['nom'];
            $_SESSION['prenom']=$admin['prenom'];
            $_SESSION['nom_utilisateur']=$admin['nom_utilisateur'];
          
    
            $reponse=true;
    }
    else {

        $reponse="Mot de Passe Incorrect";
    }

} else{

    $changeStatus=$bd->prepare('UPDATE `administrateurs` SET  nom=?,prenom=?,nom_utilisateur=? WHERE `id_admin`= ? ');
           
    $changeStatus->execute(array($nom,$prenom,$pseudo,$_SESSION['id_admin']));
   
  
    $verifAdmin=$bd->prepare("SELECT * from `administrateurs` WHERE `id_admin` = ?  ");
    $verifAdmin->execute(array($_SESSION['id_admin']));

    $admin=$verifAdmin->fetch();
    

    $_SESSION['nom']=$admin['nom'];
    $_SESSION['prenom']=$admin['prenom'];
    $_SESSION['nom_utilisateur']=$admin['nom_utilisateur'];
  

    $reponse=true;
}

        } 
       else {
    
        $reponse="veuillez remplir tous les champs demandes !";
    }
    
   
          
        //    Retourner la reponse
        echo json_encode($reponse);
?>
