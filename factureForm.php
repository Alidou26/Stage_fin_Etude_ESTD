<?php
require('verification.php');

include('fonction.php');

$partenaires=getPartenaire();


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

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

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
<li><a href="Commandes.php" >Liste Des Colis</a></li>
</ul>
</li>

</li>

</li>
<li class="active">
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
<h4>Générer une facture</h4>
<h6>Recherche des Colis par periode</h6>
</div>
</div>
<div class="card">

    <form  method="post" id="rechercher">

<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Nom de l'entreprise</label>
<div class="row">
<div class="col-lg-10 col-sm-10 col-10">
<select class="select " name="idE"  required>
<?php foreach($partenaires as $p){?>

<option value="<?= $p['id_client'] ?>"><?= $p['nom_client'] ?> </option>

<?php }?>
</select>
</div>
</div>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<label>Etat</label>
<div class="row">
<div class="col-lg-10 col-sm-10 col-10">
<select class="select " name="etat"  required>
<option value="Livre" selected>Livre</option>
<option value="Recu">Recu</option>
<option value="Annule">Annule</option>
<option value="Injoignable">Injoignable</option>
<option value="Refuse">Refuse</option>
<option value="Reporte">Reporte</option>
<option value="Retour">Retour</option>
</select>
</div>

</div>
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label> De la date du</label>
<div class="input-groupicon">
<input type="text" placeholder="DD-MM-YYYY" name="dateDebut" class="datetimepicker"  required>
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>

    <div class="col-lg-3 col-sm-6 col-12">
        <div class="form-group">
        <label>A la date du</label>
        <div class="row">
        <div class="col-lg-10 col-sm-10 col-10">
            <input type="text" placeholder="DD-MM-YYYY" name="dateFin" required class="datetimepicker">
        </div>
        <div class="col-lg-2 col-sm-2 col-2 ps-0">
        <div class="add-icon">
            <button type="submit" form="rechercher" class="btn btn-secondary"><i class="fa fa-search"></i></button>
        </div>
        </div>
        </div>
        </div>
        </div>


</div>
</form>

<div class="row">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Référence</th>
<th>Valeur du Colis</th>
<th>Nom Récepteur</th>
<th>Téléphone</th>
<th>Adresse</th>
<th>Etat</th>
<th>Date de réception</th>


</thead>

<tbody id="position">


</tbody>
</table>
</div>
</div>


<div class="row">
<div class="col-lg-12 float-md-right">
<div class="total-order">
<ul>
<li class="total">
<h4>Montant Total</h4>
<h5 id="total"></h5>MAD
</li>
<li class="retour">
<h4>Montant à Retouner</h4>
<h5 id="retour"></h5>MAD
</li>
<li class="benefice">
<h4 >Bénéfices</h4>
<h5 id="benefice"></h5>MAD
</li>


</ul>
</div>
</div>
</div>


<div class="row">


<div class="col-lg-12">
 
<form method="GET" action="facture/factures.php" id="button">



</form>

</div>
</div>

</div>
</div>
</div>
</div>
</div>

<script src="assets/js/scriptcharge.js"></script>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/Scriptfacture.js"></script>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>
