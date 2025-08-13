<?php

require('../verification.php');
include("../BD.php");
include("factureAction.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="style.css">

    <link rel="shortcut icon" type="image/x-icon" href="../logo.png">

    <title>FACTURE ALLO ABDO!</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="../logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Facture</p>
                    </div>
                    <div class="position-relative">
                        <p> No Facture: <span><?= numfacture(15); ?></span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Entreprise:</p>
                            <h2>ALLO ABDO</h2>
                            <p class="address"> Wahada 02 Kassam, <br>  Dakhla, <br>Maroc</p>
                        </div>
                        <div class="col-5">
                            <p>Client:</p>
                            <h2><?= $nom['nom_client'] ?></h2>
                            <p class="address"> <?= $nom['email_client'] ?> </p>
                            <div class="txn mt-2"><?= $nom['adresse_client'] ?></div>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Commission : <span><?= $nom['commission'] ?></span></p>
                        </div>
                        <div class="col-5">
                            <p> De la Date du: <span><?= $_GET['dateDebut'] ?></span></p>
                            <p> A la Date du: <span><?= $dateFin ?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Numéro</td>
                            <td>Références</td>
                            <td>Valeur</td>
                            <td>Etat</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($resultat as $produit){ ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?= $i ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $produit['references'] ?></td>
                            <td><?= $produit['valeur'] ?>  DH</td>
                            <td><?= $produit['etat'] ?></td>
                        </tr>

                        <?php $i++; } ?>
                    </tbody>
                </table>
            </section>

            <?php if($nombre > 0){ ?>

                <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead style="background:#1b2850;">
                        <tr>
                            <td>Numéro Charge</td>
                            <td>Désignation Charge</td>
                            <td>Valeur Charge</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<=$_GET['nombre'];$i++){ ?>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title"><?= $i ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= $_GET['charge'.$i] ?></td>
                            <td><?= $_GET['montant'.$i] ?>  DH</td>
                        </tr>

                        <?php $somme['sommeTotal']+=$_GET['montant'.$i];
                        $sommeRetourner-=$_GET['montant'.$i];
                      } ?>
                    </tbody>
                </table>
            </section>

                <?php } ?>

            <section class="balance-info" >
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"></p>
                        <p></p>
                    </div>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Montant Total:</td>
                                <td><span><?= $somme['sommeTotal'] ?> DH</td>
                            </tr>
                            <tr>
                                <td>Montant à Retourner:</td>
                                <td><span><?= $sommeRetourner ?> DH</td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Bénéfices:</td>
                                    <td><span><?= $benefice ?> DH</td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12" style="margin-bottom:8rem;">
                            <img src="signature1.jpg" class="img-fluid" alt="">
                            <p class="text-center m-0"> Directeur AlloAbdo </p>
                        </div>
                    </div>
                </div>
            </section>


            <footer >
                <hr>
                <p class="m-0 text-center">
                    Site Officiel de l'Entreprise - <a href="../index/index.php"> AlloAbdo.com </a>
                </p>
                <div class="social pt-3">
                    <span class="pr-2">
                        <i class="fas fa-mobile-alt"></i>
                        <span>(+212) 0 674 521 757</span>
                    </span>
                    <span class="pr-2">
                        <i class="fas fa-envelope"></i>
                        <span>AlloAbdo@Gmail.Com</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-facebook-f"></i>
                        <span>AlloAbdo</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-youtube"></i>
                        <span>ytAlloAbdo</span>
                    </span>
                    <span class="pr-2">
                        <i class="fab fa-twitter"></i>
                        <span>twAlloAbdo</span>
                    </span>
                </div>
            </footer>
        </div>
    </div>

</body>

<?php if($_GET['couleur']=='false'){ ?>

<script>
    window.onload=print();
</script>

<?php } else{ ?>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        window.onload=function imprimerPage() {
            html2canvas(document.body).then(function (canvas) {
                var imgData = canvas.toDataURL('image/png');

                var img = new Image();
                img.src = imgData;
                img.onload = function () {
                    var printWindow=window.open('', '_self');;
                    printWindow.document.open();
                    printWindow.document.write('<img src="' + imgData + '" style="width:100%;"/>');
                    printWindow.document.close();
                    printWindow.print();
                };
            });
        }

    </script>

<?php } ?>

</html>