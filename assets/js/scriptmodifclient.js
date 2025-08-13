$('.alert-success').hide();
$('.alert-danger').hide();

$("#modification").on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'modifClientAction.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,

        success: function (reponse) {


            if (reponse == 1) {

                $('.alert-success').show();
                setTimeout(function () { $('.alert-success').hide(); }, 2000);
                document.forms['client'].reset();
            }
            else {
                $(".alert-danger").show();
                $(".alert-danger").html(reponse);
                setTimeout(function () { $(".alert-danger").hide(); }, 2000);
            }


        }

    });

});