<?php

require('verification.php');

include('fonction.php');

$infoClient= getPartenaireById($_GET['id']);



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
<a href="javascript:void(0);" class="active"><img src="assets/img/icons/users1.svg" alt="img"><span>Clients</span> <span class="menu-arrow"></span></a>
<ul>

<li><a href="ListeClient.php">Liste Des Clients</a></li>
<li><a href="profile.php">Ajouter Un Client</a></li>

</ul>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/product.svg" alt="img"><span>Colis</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="ajouterCom.php">Ajouter Un Colis</a></li>
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

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Modification Des information</h4>

</div>
</div>



<div class="card">
<div class="card-body">
<form method="POST" id="modification">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">

<label> <abbr title="(obligatoire)" aria-hidden="true" class="required">*</abbr> Nom</label>
<input type="text" name="nom"  value="<?=$infoClient['nom_client']?>" required>
</div>
<div class="form-group">
<label>Adresse</label>
<input type="text" name="adresse" value="<?=$infoClient['adresse_client']?>">
</div>
<div class="form-group">
<label>Email</label>
<div class="pass-group">
<input type="text" class="pass-input" name="email" value="<?=$infoClient['email_client']?>"> 

</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Téléphone</label>
<input type="text" name="tel" value="<?=$infoClient['telephone_client']?>">
</div>


<div class="form-group">

<label> <abbr title="(obligatoire)" aria-hidden="true" class="required">*</abbr> Commission</label>
<input type="text" name="commission" value="<?=$infoClient['commission']?>" required>
</div>


<div class="form-group">
<input type="text" name="id" value="<?=$infoClient['id_client']?>" style="visibility:hidden">
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Logo du Client</label>
<div class="image-upload image-upload-new">
<input type="file" name="image">
<div class="image-uploads">
<img src="assets/img/icons/upload.svg" alt="img">
<h4>Ajouter une image</h4>
</div>
</div>
</div>
</div>

<div class="alert alert-success"   role="alert">
  Informations Enregistrées avec succès!
</div>

<div class="alert alert-danger"  role="alert">

</div>

<div class="col-lg-12">

<button type="submit" class="btn btn-submit me-2" form="modification">Enregistrer</button>
<a href="javascript:void(0);" class="btn btn-cancel">Annuler</a>
</div>
</div>

</form>
</div>
</div>

</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/scriptmodifclient.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>