$('.alert-success').hide();
$('.alert-danger').hide();

$("#produit").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'commandeAction.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,

        success: function (reponse) {

            if (reponse == true) {

                $('.alert-success').show();
                setTimeout(function () { $('.alert-success').hide(); }, 2000);
                document.forms['client'].reset();

            }
            else {
                $(".alert-danger").show();
                $(".alert-danger").html(reponse);
                console.log(reponse);
                setTimeout(function () { $(".alert-danger").hide(); }, 2000);
            }


        }
    });

});