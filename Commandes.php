<?php

require("verification.php");

include('fonction.php');

$commande=getCommande();
$recu =getCom("Recu");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Allo Abdo</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Oswald:wght@700&display=swap" rel="stylesheet">

<link rel="shortcut icon" type="image/x-icon" href="logo.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>
<div class="header" >

<div class="header-left active" >

<a href="dashboard.php" style="font-size:3rem;height:100%;text-align:center;width:100%;" >
<span style="font-family: 'Dancing Script', cursive;" >Allo</span><span style="color:#1b2850;font-family: 'Oswald', sans-serif;">Abdo</span>  
</a>
<a id="toggle_btn" href="#">
</a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="#" class="responsive-search">
<i class="fa fa-search"></i>
</a>

</div>
</li>

<li class="nav-item dropdown has-arrow flag-nav">
<a href="dashboard.php" class="logo" >
<img src="logodash.png" alt="">
</a>

</li>

</ul>

</div>
<div class="main-wrapper">



<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li >
<a href="dashboard.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);" ><img src="assets/img/icons/users1.svg" alt="img"><span>Clients</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="ListeClient.php" >Liste Des Clients</a></li>
<li><a href="profile.php" >Ajouter Un Client</a></li>

</ul>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>Colis</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="ajouterCom.php">Ajouter Un Colis</a></li>
<li><a href="#" class="active">Liste Des Colis</a></li>
</ul>
</li>

</li>

</li>
<li>
<a href="factureForm.php"><img src="assets/img/icons/facture.svg" alt="img"><span>Facture</span> </a>
</li>
<li>
<a href="parametres.php"><img src="assets/img/icons/settings.svg" alt="img"><span>Paramètre</span> </a>
</li>
<li>
<a href="deconnexionAction.php"><img src="assets/img/icons/log-out.svg" alt="img"><span>Déconnexion</span> </a>
</li>

</ul>
</div>
</div>
</div>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Les Commandes</h4>

</div>
</div>

<div class="card">
<div class="card-body">
<div class="tabs-set" style="margin-left:50px;">
<ul class="nav nav-tabs" id="myTab" role="tablist">


<li class="nav-item" role="presentation">
<button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" role="tab" aria-controls="purchase" aria-selected="false">Colis Reçus</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" role="tab" aria-controls="payment" aria-selected="false">Tous les Colis</button>
</li>

</ul>

<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<a class="btn btn-filter">
<img src="assets/img/icons/filter.svg" alt="img">
</a>
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>

</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">

<div class="col-lg-1 col-sm-6 col-12 ms-auto">

</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date Livraison</th>
<th>Nom Entreprise</th>
<th>Référence</th>
<th>Valeur</th>
<th>Nom Destinataire</th>
<th>Adresse</th>
<th>Contact</th>
<th>Status</th>
</tr>
</thead>
<tbody id="colisRecu">

<?php foreach($recu as $r){ ?>

<tr>

<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['date_reception']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['nom_client']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['references']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['valeur']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['nom_recepteur']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['adresse_recepteur']?></a></td>
<td><a href="product-details.php?id=<?= $r['id_colis']?>"><?= $r['telephone_recepteur']?></a></td>

<td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1"   data-bs-toggle="modal" data-bs-target="#myModal<?= $r['id_colis']?>"><?= $r['etat']?></button></span></td>
</tr>


<div class="modal" id="myModal<?= $r['id_colis']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title">Modification du Status</h5>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3" style="display:flex;flex-wrap:wrap;" >
                    <button type="submit"  class="btn btn-primary status"  data-id='<?=$r['id_colis']?>'  data-cs="Recu"style="margin-right:1rem;margin-bottom:1rem;" >Reçu</button>
                             <button type="submit" class="btn btn-success status"  data-id='<?=$r['id_colis']?>'  data-cs="Livre" style="margin-right:1rem;margin-bottom:1rem;">Livré</button>
                            <button type="submit" class="btn btn-warning status"  data-id='<?=$r['id_colis']?>' data-cs="Annule" style="margin-right:1rem;margin-bottom:1rem;">Annulé</button>
                            <button type="submit" class="btn btn-info status"  data-id='<?=$r['id_colis']?>' data-cs="Injoignable" style="margin-right:1rem;margin-bottom:1rem;">Injoignable</button><br><br>
                            <button type="submit" class="btn btn-danger status"  data-id='<?=$r['id_colis']?>' data-cs="Refuse" style="margin-right:1rem;margin-bottom:1rem;">Refusé</button> 
                            <button type="submit" class="btn btn-dark  status"  data-id='<?=$r['id_colis']?>' data-cs="Reporte" style="margin-right:1rem;margin-bottom:1rem;">Reporté</button>
                            <button type="submit" class="btn btn-primary  status"  data-id='<?=$r['id_colis']?>' data-cs="Retour" style="margin-right:1rem;margin-bottom:1rem;">Retour</button>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" style="border-radius:10px; margin:auto;">Annuler</button>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }?>

</tbody>
</table>
</div>
</div>
<div class="tab-pane fade" id="payment" role="tabpanel">
<div class="table-top">
<div class="search-set">

</div>
<div class="wordset">
<ul>

</ul>
</div>
</div>

<div class="card" id="filter_inputs2">
<div class="card-body pb-0">
<div class="row">


<div class="col-lg-1 col-sm-6 col-12 ms-auto">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<th>Date Livraison</th>
<th>Nom Entreprise</th>
<th>Référence</th>
<th>Valeur</th>
<th>Nom Destinataire</th>
<th>Adresse</th>
<th>Contact</th>
<th>Status</th>
</tr>
</thead>
<tbody id="colisTotal">


<?php foreach($commande as $com){ ?>

<tr>

<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['date_reception']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['nom_client']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['references']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['valeur']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['nom_recepteur']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['adresse_recepteur']?></a></td>
<td><a href="product-details.php?id=<?= $com['id_colis']?>"><?= $com['telephone_recepteur']?></a></td>

<?php if($com['etat']=='Recu'){ ?>
    <td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1" ><?= $com['etat']?></button></span></td>
    <?php } else{ ?>

<td><span class=""><button type="button" class="btn btn-outline-primary mr-1 mb-1"   data-bs-toggle="modal" data-bs-target="#myModal<?= $com['id_colis']?>"><?= $com['etat']?></button></span></td>

<?php } ?>
</tr>


<div class="modal" id="myModal<?= $com['id_colis']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title">Modification du Status</h5>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3" style="display:flex;flex-wrap:wrap;" >
  
                            <button type="submit"  class="btn btn-primary status"  data-id='<?=$com['id_colis']?>'  data-cs="Recu" style="margin-right:1rem;margin-bottom:1rem;">Reçu</button>
                            <button type="submit" class="btn btn-success status"  data-id='<?=$com['id_colis']?>'  data-cs="Livre" style="margin-right:1rem;margin-bottom:1rem;">Livré</button>
                            <button type="submit" class="btn btn-warning status"  data-id='<?=$com['id_colis']?>' data-cs="Annule" style="margin-right:1rem;margin-bottom:1rem;">Annulé</button>
                            <button type="submit" class="btn btn-info status"  data-id='<?=$com['id_colis']?>' data-cs="Injoignable" style="margin-right:1rem;margin-bottom:1rem;">Injoignable</button><br><br>
                            <button type="submit" class="btn btn-danger status"  data-id='<?=$com['id_colis']?>' data-cs="Refuse" style="margin-right:1rem;margin-bottom:1rem;">Refusé</button> 
                            <button type="submit" class="btn btn-dark status"  data-id='<?=$com['id_colis']?>' data-cs="Reporte" style="margin-right:1rem;margin-bottom:1rem;">Reporté</button>
                            <button type="submit" class="btn btn-primary status"  data-id='<?=$com['id_colis']?>' data-cs="Retour" style="margin-right:1rem;margin-bottom:1rem;">Retour</button>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" style="border-radius:10px; margin:auto;">Annuler</button>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }?>

</tbody>
</table>
</div>
</div>


</div>
</div>
</div>
</div>

</div>
</div>


</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/scriptcolis.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>


<script src="assets/js/script.js"></script>
</body>
</html>