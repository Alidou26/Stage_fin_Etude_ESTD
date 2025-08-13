<?php

include('fonction.php');

require("BD.php");

$reponse['status']=-1;

if(isset($_POST)){

    extract($_POST);

    $query=$bd->prepare("UPDATE colis set etat=?,date_modif=NOW() where id_colis=? ");
    $query->execute(array($status, $id));

    $reponse['colisTotal']="";

    $commande=getCommande();

   foreach($commande as $com){ 

    $reponse['colisTotal'].='

    <tr>
    
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['date_reception'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['nom_client'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['references'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['valeur'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['nom_recepteur'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['adresse_recepteur'].'</a></td>
    <td><a href="product-details.php?id='.$com['id_colis'].'">'.$com['telephone_recepteur'].'</a></td>';

    
     if($com['etat']=='Recu'){ 
        $reponse['colisTotal'].=
        '<td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1" >'.$com['etat'].'</button></span></td>';
        } else{ 
         $reponse['colisTotal'].=
    '<td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1"   data-bs-toggle="modal" data-bs-target="#myModal'.$com['id_colis'].'">'.$com['etat'].'</button></span></td>';
    
     } 
     $reponse['colisTotal'].='
    </tr>
    
    
    <div class="modal" id="myModal'.$com['id_colis'].'">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <h5 class="modal-title">Modification du Status</h5>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3" style="display:flex;flex-wrap:wrap;" >
      
                                <button type="submit"  class="btn btn-primary status"  data-id='.$com['id_colis'].'  data-cs="Recu" style="margin-right:1rem;margin-bottom:1rem;">Reçu</button>
                                <button type="submit" class="btn btn-success status"  data-id='.$com['id_colis'].'  data-cs="Livre" style="margin-right:1rem;margin-bottom:1rem;">Livré</button>
                                <button type="submit" class="btn btn-warning status"  data-id='.$com['id_colis'].' data-cs="Annule" style="margin-right:1rem;margin-bottom:1rem;">Annulé</button>
                                <button type="submit" class="btn btn-info status"  data-id='.$com['id_colis'].' data-cs="Injoignable" style="margin-right:1rem;margin-bottom:1rem;">Injoignable</button><br><br>
                                <button type="submit" class="btn btn-danger status"  data-id='.$com['id_colis'].' data-cs="Refuse" style="margin-right:1rem;margin-bottom:1rem;">Refusé</button> 
                                <button type="submit" class="btn btn-dark status"  data-id='.$com['id_colis'].' data-cs="Reporte" style="margin-right:1rem;margin-bottom:1rem;">Reporté</button>
                                <button type="submit" class="btn btn-primary status"  data-id='.$com['id_colis'].' data-cs="Retour" style="margin-right:1rem;margin-bottom:1rem;">Retour</button>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" style="border-radius:10px; margin:auto;">Annuler</button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    
    
    
    }


    $reponse['colisRecu']="";

    $recu =getCom("Recu");

   foreach($recu as $r){ 

    $reponse['colisRecu'].='

    <tr>
    
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['date_reception'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['nom_client'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['references'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['valeur'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['nom_recepteur'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['adresse_recepteur'].'</a></td>
    <td><a href="product-details.php?id='.$r['id_colis'].'">'.$r['telephone_recepteur'].'</a></td>
    <td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1"   data-bs-toggle="modal" data-bs-target="#myModal'.$r['id_colis'].'">'.$r['etat'].'</button></span></td>
    </tr>
    
    
    <div class="modal" id="myModal'.$r['id_colis'].'">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" >
                            <h5 class="modal-title">Modification du Status</h5>
                        </div>
                        <div class="modal-body">
                        <div class="mb-3" style="display:flex;flex-wrap:wrap;" >
      
                                <button type="submit"  class="btn btn-primary status"  data-id='.$r['id_colis'].'  data-cs="Recu" style="margin-right:1rem;margin-bottom:1rem;">Reçu</button>
                                <button type="submit" class="btn btn-success status"  data-id='.$r['id_colis'].'  data-cs="Livre" style="margin-right:1rem;margin-bottom:1rem;">Livré</button>
                                <button type="submit" class="btn btn-warning status"  data-id='.$r['id_colis'].' data-cs="Annule" style="margin-right:1rem;margin-bottom:1rem;">Annulé</button>
                                <button type="submit" class="btn btn-info status"  data-id='.$r['id_colis'].' data-cs="Injoignable" style="margin-right:1rem;margin-bottom:1rem;">Injoignable</button><br><br>
                                <button type="submit" class="btn btn-danger status"  data-id='.$r['id_colis'].' data-cs="Refuse" style="margin-right:1rem;margin-bottom:1rem;">Refusé</button> 
                                <button type="submit" class="btn btn-dark status"  data-id='.$r['id_colis'].' data-cs="Reporte" style="margin-right:1rem;margin-bottom:1rem;">Reporté</button>
                                <button type="submit" class="btn btn-primary status"  data-id='.$r['id_colis'].' data-cs="Retour" style="margin-right:1rem;margin-bottom:1rem;">Retour</button>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" style="border-radius:10px; margin:auto;">Annuler</button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    
    
    
    }


$reponse['status']=0;

    
}

echo json_encode($reponse);


?>