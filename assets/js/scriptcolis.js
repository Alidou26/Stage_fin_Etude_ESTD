$(".status").click(function () {

    var id_produit = $(this).data('id');
    var sta = $(this).data('cs');
    var button = this;

    $.ajax({
        url: 'modifstatus.php',
        method: 'post',
        dataType: 'json',
        data: { id: id_produit, status: sta },

        success: function (reponse) {

            if (reponse['status'] != -1) {

                $("#myModal" + id_produit).modal('hide');


                $("#colisRecu").html(reponse['colisRecu']);

                $("#colisTotal").html(reponse['colisTotal']);

            }
        }


    });
});