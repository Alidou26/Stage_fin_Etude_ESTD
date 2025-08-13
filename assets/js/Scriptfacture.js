$(document).ready(function (e) {
    e.preventDefault;
    $("#rechercher").on('submit', function (e) {

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "recherche.php",
            data: new FormData(this),
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (reponse) {

                if (reponse['status'] == true) {

                    $("#position").html(reponse['affichage']);
                    $("#benefice").html(reponse['benefice']);
                    $("#total").html(reponse['sommeTotal']);
                    $("#retour").html(reponse['sommeRetour']);

                    $("#button").html(reponse['affichageButton']);

                }

            }

        });
    });

})