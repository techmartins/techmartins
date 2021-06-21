$(document).ready(function(){

    $("#valor").inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': '.',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ",",
        'digitsOptional': false,
        'allowMinus': false,
        'prefix': 'R$ ',
        'placeholder': ''
    });

    $('#enviar-dados-compra').on('click', function() {
        
        var cliente = $('#cliente').val();
        var identificador = $("#identificador").val();
        var valor = $('#valor').val();
        valor = valor.split("R$ ");
        valor = valor[1];
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
                    identificador:identificador,
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