$(document).ready(function(){

    $('#enviar-dados-compra').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var anotacao = $('#anotacao').val();
        var empresa = $('#empresa').val();

        if($('#data_compra').val() != ""){
            var data_compra = $('#data_compra').val();
        }else{
            var data_compra = null;
        }
                
        let _url = $('#url_cadastro_compra').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "post",
                data: {
                    cliente:cliente,
                    valor:valor,
                    empresa:empresa,
                    anotacao:anotacao,
                    data_compra:data_compra,
                    _token:_token
                },

                success: function(response) {
                    console.log(response);
                    //location.reload();
                },
                error: function(response) {
                    console.log("response")
                }
            });
            $('#modal-loading').modal('hide');
            location.reload();
        }, 3000);
    });

});