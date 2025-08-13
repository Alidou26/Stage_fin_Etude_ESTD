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

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/twitter-bootstrap-wizard/form-wizard.css">

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

<li><a href="ListeClient.php">Liste Des Clients</a></li>
<li><a href="profile.php" >Ajouter Un Client</a></li>

</ul>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>Colis</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="#" class="active">Ajouter Un Colis</a></li>
<li><a href="Commandes.php">Liste Des Colis</a></li>
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

<div class="page-wrapper cardhead">
<div class="content container-fluid">

<div class="page-header">
<div class="row">
<div class="col-sm-12">
<h3 class="page-title">Les Information sur le Colis</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Ajout Colis</a></li>

</ul>
</div>
</div>
</div>

<div class="row">

<div class="col-lg-12">
<div class="card">
<div class="card-header">

</div>
<div class="card-body">
<div id="progrss-wizard" class="twitter-bs-wizard">
<ul class="twitter-bs-wizard-nav nav nav-pills nav-justified">
<li class="nav-item">
<a href="#progress-seller-details" class="nav-link" data-toggle="tab">
<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="User Details">
<i class="fa fa-shopping-bag"></i>
</div>
</a>
</li>
<li class="nav-item">
<a href="#progress-company-document" class="nav-link" data-toggle="tab">
<div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Address Detail">
<i class="far fa-user"></i>
</div>
</a>
</li>

</ul>

<div id="bar" class="progress mt-4">
<div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
</div>
<div class="tab-content twitter-bs-wizard-tab-content">
<div class="tab-pane" id="progress-seller-details">
<div class="mb-4">
<h5>Détails colis</h5>
</div>
<form method="post"  id="produit" name="colis">



<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label class="form-label"><h5>Entreprise</h5></label>
<select class="form-select" name="entreprise" required>
<option selected>Selectionner l'Entreprise</option>
<?php foreach($partenaires as $p){?>

<option value="<?= $p['id_client'] ?>"><?= $p['nom_client'] ?> </option>

<?php }?>

</select>
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-lastname-input">
 <h5>Référence</h5> </label>
<input type="text" class="form-control" id="progresspill-lastname-input" name="code" required>
</div>
</div>
</div>
<div class="row">

<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-email-input"><h5>Valeur du Colis</h5></label>
<input type="number" min="0.0" class="form-control" id="progresspill-email-input" name="valeur" required>
</div>
</div>
</div>

<ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="next"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()">Suivant <i class="bx bx-chevron-right ms-1"></i></a></li>
</ul>
</div>
<div class="tab-pane" id="progress-company-document">
<div>
 <div class="mb-4">
<h5> Détails Destinataire</h5>
</div>

<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-pancard-input" class="form-label"><h5>Nom</h5></label>
<input type="text" class="form-control" id="progresspill-pancard-input" name="nom">
</div>
</div>
<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-vatno-input" class="form-label"><h5>Prénom</h5></label>
<input type="text" class="form-control" id="progresspill-vatno-input" name="prenom">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-cstno-input" class="form-label"><h5>Téléphone</h5></label>
<input type="text" class="form-control" id="progresspill-cstno-input" name="telephone" required>
</div>
</div>
<div class="col-lg-6">
<div class="mb-3">
<label for="progresspill-servicetax-input" class="form-label"><h5>Localisation</h5></label>
<input type="text" class="form-control" id="progresspill-servicetax-input" name="localisation" required>
</div>
</div>
</div>

<div class="alert alert-success"   role="alert">
  Informations Enregistrées avec succès!
</div>

<div class="alert alert-danger"  role="alert">Erreur, le colis existe déjà ou veuillez remplir tous les champs</div>
 <ul class="pager wizard twitter-bs-wizard-pager-link">
<li class="previous"><a href="javascript: void(0);" class="btn btn-primary" onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Précédent</a></li>

<button type="submit" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target=".confirmModal" form="produit" >Enregistrer</button>

</ul>
</div>
</div>
</form>

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

<script src="assets/js/scriptcommande.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/plugins/twitter-bootstrap-wizard/prettify.js"></script>
<script src="assets/plugins/twitter-bootstrap-wizard/form-wizard.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>