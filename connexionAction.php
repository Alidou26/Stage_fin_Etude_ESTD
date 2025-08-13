<?php 

session_start();

$reponse=[];


require('BD.php');


    //enregistrer les donnees dans des variables

    $nom_utilisateur=htmlspecialchars($_POST['nom_utilisateur']);
    $mot_de_passe=htmlspecialchars($_POST['mot_de_passe']);

    //verifier si l'utilisateur existe
    
    $verifUtilisateur=$bd->prepare("SELECT * from `administrateurs` WHERE `nom_utilisateur` = ?  ");
    $verifUtilisateur->execute(array($nom_utilisateur));

    if($verifUtilisateur->rowcount() > 0){
        
        //verifier le mot de passe
       
    $utilisateur=$verifUtilisateur->fetch();
    

    if(password_verify($mot_de_passe,$utilisateur['mot_de_passe'])){

            
           //On cree une SESSION pour l'utilisateur

           $_SESSION['admin_connecte']=true;
           $_SESSION['id_admin']=$utilisateur['id_admin'];
           $_SESSION['nom_utilisateur']=$utilisateur['nom_utilisateur'];
           $_SESSION['nom']=$utilisateur['nom'];
           $_SESSION['prenom']=$utilisateur['prenom'];
   
        $reponse['status']=0;
  
        //url de redirection
        $reponse['url']="dashboard.php";
    }

    else {
        $reponse['status']="Votre mot de passe est incorrect !";
    }

    }
else {
    $reponse['status']="Ce compte n'existe pas !";
}


//Retourner la reponse

echo json_encode($reponse);