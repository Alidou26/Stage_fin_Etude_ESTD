$(document).ready(function (e) {

    //connexion

    $("#formConnexion").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'connexionAction.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (reponse) {
                if (reponse['status'] == 0) {
                    window.location.href = reponse['url'];


                }


                else {
                    $(".alert-danger").show();
                    $(".alert-danger").html(reponse['status']);
                    setTimeout(function () { $(".alert-danger").hide(); }, 5000);
                }

            }

        });
    });






})