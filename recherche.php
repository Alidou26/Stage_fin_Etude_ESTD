<?php

include("BD.php");

extract($_POST);


if(!empty($idE) && !empty($dateDebut) && !empty($dateFin)){

    $convDate = strtotime($dateDebut);
    $dateDebut = date("Y-m-d", $convDate);
    $convDate = strtotime($dateFin); 
    $dateFin = date("Y-m-d", $convDate);
   
$recherche=$bd->prepare("SELECT * from colis where id_client=? and  date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");
 
$recherche->execute(array($idE));

$resultat=$recherche->fetchAll();

//somme totale

$montant=$bd->prepare("SELECT sum(valeur) as sommeTotal from colis where  id_client=? and date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");

$montant->execute(array($idE));

$somme=$montant->fetch();

// benefice total

$com=$bd->prepare("SELECT sum(commission) as totalcommission from colis where id_client=? and date_reception >='".$dateDebut." 00:00:00' and date_reception <='".$dateFin." 23:59:59' and `etat`='".$etat."'");

$com->execute(array($idE));

$commission=$com->fetch();

$benefice=$commission['totalcommission'];

//total a envoyer

$sommeRetourner= $somme['sommeTotal']-$benefice;


// }


$resultatRecherche="";

if(count( $resultat)>0){

    $reponse['status']=true;

 foreach($resultat as $r){ 
    $resultatRecherche.=
    '					             
<tr>
<td class="productimgname">

<a href="javascript:void(0);">'.$r['references'].'</a>
</td>
 <td>'.$r['valeur'].'</td>
<td>'.$r['nom_recepteur'].'</td>
<td>'.$r['telephone_recepteur'].'</td>
<td>'.$r['adresse_recepteur'].'</td>
<td>'.$r['etat'].'</td>
<td>'.$r['date_reception'].'</td>

</tr>
			
';

}
}else{
        $reponse['status']=false;
    }


$reponse['affichage']= $resultatRecherche;
$reponse['sommeRetour']= $sommeRetourner;
$reponse['benefice']= $benefice;
$reponse['sommeTotal']= $somme['sommeTotal'];

$form='
<div class="card">
<div class="card-header">
<select class="form-control form-small select" name="couleur" style="margin-bottom:1rem;">
<option value="false">Imprimer en pdf sans couleur de fond</option>
<option value="true">Imprimer en pdf avec couleur de fond</option>
</select>
<h5 class="card-title">Charges supplementaires</h5>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-8">
<select class="form-control form-small select" id="number" onchange="showInputs()" name="nombre" style="margin-bottom:1rem;">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
<div class="col-lg-5" id="inputs">

</div>
<input type="text" value="'.$idE.'" name="id" hidden>
<input type="text" name="dateDebut" value="'.$dateDebut.'" hidden>
<input type="text" name="dateFin" value="'.$dateFin.'" hidden>
<input type="text" name="etat" value="'.$etat.'" hidden>
<button type="submit" class="btn btn-submit me-2" style="margin-top:1rem;">Imprimer</button>
</div>
</div>
</div>
</div>
';



$reponse['affichageButton']=$form;
}else{
    $response['erreur']="LES CHAMPS SONT VIDES";
}


echo json_encode($reponse);
?>