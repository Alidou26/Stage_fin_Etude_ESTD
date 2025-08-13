<?php 

include("BD.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Connexion</title>

<link rel="shortcut icon" type="image/x-icon" href="logo.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="account-page">

<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">
<div class="login-logo">
<img src="logo.png" alt="img">
</div>
<div class="login-userheading">
<h3>Connexion</h3>
</div>
<form id="formConnexion">
<div class="form-login">
<label>Nom d'utilisateur</label>
<div class="form-addons">
<input type="text" placeholder="Entrer votre Nom d'utilisateur" name="nom_utilisateur" required>
<img src="assets/img/icons/users1.svg" alt="img">
</div>
</div>
<div class="form-login">
<label>Mot de passe</label>
<div class="pass-group">
<input type="password" class="pass-input" placeholder="Entrer votre Mot de passe" name="mot_de_passe" required>
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>

<!-- reponse -->
<div class="alert alert-danger alert-dismissible fade show" role="alert">
</div>

<div class="form-login">
<div class="alreadyuser">
</div>
</div>
<div class="form-login">
    <button class="btn btn-login" type="submit">Se connecter</button>
</div>

</form>



</div>
</div>
<div class="login-img">
<img src="assets/img/login.jpg" alt="img">
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>

<script src="assets/js/ajax.js"></script>

<script>  $(".alert-danger").hide   () </script>

</body>
</html>