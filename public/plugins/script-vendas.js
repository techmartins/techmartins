$(document).ready(function(){

    $('#enviar-dados-venda').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var descricao_servico = $('#descricao_servico').val();
        var indicador = $('#indicador').val();
        if($('#indicado_profissional').val() !== 0){
            var indicado = $('#indicado_profissional').val();
            var perfil = "profissional-empresa";
        }else{
            var indicado = $('#indicado_empresa').val();
        }
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                cliente:cliente,
                valor:valor,
                descricao_servico:descricao_servico,
                indicador:indicador,
                indicado:indicado,
                pontuacao_indicador:pontuacao_indicador,
                contato:contato,
                status:status,
                _token:_token
            },

            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    $("#indicado_profissional").on("change", function(){
        $("#indicado_empresa").prop('disabled', 'disabled');
    });

    $("#indicado_empresa").on("change", function(){
        $("#indicado_profissional").prop('disabled', 'disabled');
    });


});