<?php

require("verification.php");

include("statistiques.php");

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

<div class="header-left active"  >
    
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
<li class="active">
<a href="#"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="assets/img/icons/users1.svg" alt="img"><span>Clients</span> <span class="menu-arrow"></span></a>
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
<a href="parametres.php"><img src="assets/img/icons/settings.svg" alt="img"><span>Paramètre</span> </a>
</li>
<li>
<a href="factureForm.php"><img src="assets/img/icons/facture.svg" alt="img"><span>Facture</span> </a>
</li>
<li>
<a href="deconnexionAction.php"><img src="assets/img/icons/log-out.svg" alt="img"><span>Déconnexion</span> </a>
</li>

</ul>
</div>
</div>
</div>



<!-- ******************************* -->
<div class="page-wrapper">
<div class="content">
<div class="row">

<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4><?= $totalClient['total'] ?></h4>
<h5>Clients</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4><?= $totalCommission['total'] ?></h4>
<h5>Bénéfices en DH</h5>
</div>
<div class="dash-imgs">
<i data-feather="dollar-sign"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4><?= $totalColis['total'] ?></h4>
<h5>Total Colis</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4><?= $totalColisLivre['total']  ?></h4>
<h5>Total Colis livrés</h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Bénéfices par mois de l'année en cours</h4>
</div>
<div class="card-body">
<canvas id="chartBar1" class="h-300"></canvas>
</div>
</div>
</div>  
<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Pourcentage des états des colis</h4>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<div id="donut-chart" class="chart-set"></div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">

<div class="card-body">
<h4 class="card-title mb-0">Bénéfices par Client</h4>
<div id="s-bar" class="chart-set"></div>
</div>
</div>
</div>  
<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Evolution des colis du jour</h4>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<div id="s-line-area" class="chart-set"></div>
</div>
</div>
</div>
</div>
</div>

<div class="card mb-0">
<div class="card-body">
<h4 class="card-title">Statistique des colis par mois de l'année en cours</h4>
<div class="table-responsive dataview">
<div id="s-col-stacked" class="chart-set"></div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>


<script src="assets/js/script.js"></script>

<script src="assets/plugins/chartjs/chart.min.js"></script>

<?php include("ScriptStat.php"); ?>


</body>
</html>