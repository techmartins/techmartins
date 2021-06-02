$(document).ready(function(){

    $('#enviar-dados-venda').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var descricao_servico = $('#descricao_servico').val();
        var indicador = $('#indicador').val();
        if($('#indicado_profissional').val() != 0){
            var indicado = $('#indicado_profissional').val();
            var perfil = "profissional-empresa";
            var id_indicado = $('#id_indicado').val();
        }else{
            var indicado = $('#indicado_empresa').val();
            var id_indicado = $('#id_indicado').val();
            var perfil = "empresa-empresa";
        }
        var contato = $('#contato').val();
        var pontuacao_indicador = 0;
        var caed = 0;
        let _url = $('#url_cadastro_venda').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url,
            type: "post",
            data: {
                cliente:cliente,
                valor:valor,
                descricao_servico:descricao_servico,
                indicador:indicador,
                indicado:indicado,
                id_indicado:id_indicado,
                pontuacao_indicador:pontuacao_indicador,
                contato:contato,
                perfil:perfil,
                caed:caed,
                _token:_token
            },

            success: function(response) {
                console.log(response);
                location.reload();
            },
            error: function(response) {
                console.log("response")
            }
        });
    });

    $("#indicado_profissional").on("change", function(){
        $("#indicado_empresa").prop('disabled', 'disabled');
        $("#id_indicado").val($(this).val());
    });

    $("#indicado_empresa").on("change", function(){
        $("#indicado_profissional").prop('disabled', 'disabled');
        $("#id_indicado").val($(this).val());
    });


});