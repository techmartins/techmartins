$(document).ready(function(){

    $('#enviar-dados-venda').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var rt = "$"+$('#rt').val();
        var descricao_servico = $('#descricao_servico').val();
        if($('#empresa_indicadora').val() != 0){
            var indicador = $('#empresa_indicadora').val();
        }else{
            var indicador = $('#indicador').val();
        }

        if($('#data_venda').val() != ""){
            var data_venda = $('#data_venda').val();
        }else{
            var data_venda = null;
        }
                
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

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "post",
                data: {
                    cliente:cliente,
                    valor:valor,
                    rt:rt,
                    descricao_servico:descricao_servico,
                    indicador:indicador,
                    indicado:indicado,
                    id_indicado:id_indicado,
                    data_venda:data_venda,
                    pontuacao_indicador:pontuacao_indicador,
                    contato:contato,
                    perfil:perfil,
                    caed:caed,
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

    $("#chk_empresa").on("change", function(){
        if($(this).val() === "sim"){
            $("#indicado_profissional").prop('disabled', true);
            $("#indicado_empresa").prop('disabled', false);
        }else{
            $("#indicado_profissional").prop('disabled', false);
            $("#indicado_empresa").prop('disabled', true);
        }
    });

    $("#indicado_profissional").on("change", function(){
        $("#id_indicado").val($(this).val());
    });

    $("#indicado_empresa").on("change", function(){
        $("#id_indicado").val($(this).val());
    });


});