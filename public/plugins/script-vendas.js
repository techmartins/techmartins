$(document).ready(function(){

    $("#contato").inputmask({mask:"(99) 99999-9999"});

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

    $("#valor_edit").inputmask('decimal', {
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

    $('#enviar-dados-venda').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var perfil_usuario = $('#perfil').val();
        valor = valor.split("R$ ");
        valor = valor[1]; // 20.000,00
        
        var descricao_servico = $('#descricao_servico').val();
        if(perfil_usuario == "admin"){
            if($('#empresa_indicadora').val() != 0){
                var indicador = $('#empresa_indicadora').val();
                indicador = indicador.split("/");
                indicador = indicador[1];
            }else{
                var indicador = $('#indicador').val();
            }
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
        
        indicado = indicado.split("/");
        indicado = indicado[1];
        id_indicado = id_indicado.split("/");
        id_indicado = id_indicado[0];
        
        var contato = $('#contato').val();
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
                    descricao_servico:descricao_servico,
                    indicador:indicador,
                    indicado:indicado,
                    id_indicado:id_indicado,
                    data_venda:data_venda,
                    contato:contato,
                    perfil:perfil,
                    _token:_token
                },

                success: function(response) {
                    if(response){
                        alert("Venda Registrada com Sucesso!");
                    }
                    console.log(response);
                    //location.reload();
                },
                error: function(response) {
                    console.log(response)
                }
            });
            $('#modal-loading').modal('hide');
            
            //location.reload();
        }, 3000);
    });

    $("#chk_empresa").on("change", function(){
        if($(this).val() === "empresa"){
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

    $(".btn-editar-venda").click(function(){
        $("#modal-editar-venda").modal();
        let id = $("#id_input").val();
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                console.log(response);
                $("#id_edit").val(response[0]["id"]);
                $("#valor_original").val(response[0]["valor"]);
                $("#indicado_edit").val(response[0]["indicado"]);
                $("#id_indicado").val(response[0]["id_indicado"]);
                $("#data_venda_edit").val(response[0]["data_venda"]);
                $('#valor_edit').val(response[0]["valor"]);
                $('#cliente_edit').val(response[0]["cliente"]);
                $('#contato_edit').val(response[0]["contato"]);
                $("#perfil").val(response[0]["perfil"]);
                $("#descricao_servico_edit").val(response[0]["descricao_servico"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });


    $("#editar-dados-venda").click(function(){

        var id = $("#id_edit").val();
        var valor_original = $("#valor_original").val();
        var motivo = $("#motivo").val();
        var cliente = $('#cliente_edit').val();
        var valor = $('#valor_edit').val();
        var perfil_usuario = $('#perfil_usuario').val();
        var perfil = $('#perfil').val();
        valor = valor.split("R$ ");
        valor = valor[1]; // 20.000,00

        valor_original = valor_original.split("R$ ");
        valor_original = valor_original[1]; // 20.000,00
        
        var descricao_servico = $('#descricao_servico_edit').val();
        if(perfil_usuario == "admin"){
            if($('#empresa_indicadora_edit').val() != 0){
                var indicador = $('#empresa_indicadora_edit').val();
                indicador = indicador.split("/");
                indicador = indicador[1];
            }else{
                var indicador = $('#indicador').val();
            }
        }else{
            var indicador = $('#indicador').val();
        }
    
        if($('#data_venda_edit').val() != ""){
            var data_venda = $('#data_venda_edit').val();
        }else{
            var data_venda = null;
        }
        
        if($('#indicado_profissional_edit').val() != 0){
            var indicado = $('#indicado_profissional_edit').val();
            var perfil = "profissional-empresa";
            var id_indicado = $('#id_indicado').val();
        }else if($('#indicado_empresa_edit').val() != 0){
            var indicado = $('#indicado_empresa_edit').val();
            var id_indicado = $('#id_indicado').val();
            var perfil = "empresa-empresa";
        }else{
            var id_indicado = $('#id_indicado').val();
            var indicado = $('#indicado_edit').val();
        }
        
        indicado = indicado.split("/");
        indicado = indicado[1];
        id_indicado = id_indicado.split("/");
        id_indicado = id_indicado[0];
        
        var contato = $('#contato_edit').val();
        let _url = $('#url_visualizar').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $("#modal-editar-venda").modal('hide');
        $('#modal-loading').modal('show');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "PUT",
                data: {
                    id: id,
                    indicado: indicado,
                    indicador: indicador,
                    id_indicado: id_indicado,
                    data_venda: data_venda,
                    valor: valor,
                    valor_original: valor_original,
                    motivo: motivo,
                    cliente: cliente,
                    contato: contato,
                    perfil: perfil,
                    descricao_servico: descricao_servico
                    // _token: _token
                },
                
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            // location.reload();
        }, 3000);
    });

});
