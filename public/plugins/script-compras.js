$(document).ready(function(){

    $("#tabela_compras input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#tabela_compras td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela_compras tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela_compras input").blur(function(){
        $(this).val("");
    });

    var minDate, maxDate;
 
    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[4] );
     
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
     
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('#tabela_compras').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
   

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
        var id_profissional = $("#identificador").val();
        var id_usuario = $("#id_usuario").val();
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
                    id_profissional:id_profissional,
                    id_usuario:id_usuario,
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
                    console.log(response)
                }
            });
            $('#modal-loading').modal('hide');
            location.reload();
        }, 3000);
    });

    // EDITAR E DELETAR ABAIXO

    $(".btn-editar-compra").click(function(){
        $("#modal-editar-compra").modal();
        let id = $("#id_input").val();
        let _url = $('#url_editar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                //console.log(response[0]["razao_social"]);
                $("#id_edit").val(response[0]["id"]);
                $("#data_compra_edit").val(response[0]["data_compra"]);
                $('#cliente_edit').val(response[0]["cliente"]);
                $('#valor_edit').val(response[0]["valor"]);
                $('#empresa_edit').val(response[0]["empresa"]);
                $('#anotacao_edit').val(response[0]["anotacao"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $("#editar-dados").click(function(){
        var id = $("#id_edit").val();
        var cliente = $('#cliente_edit').val();
        var data_compra = $('#data_compra_edit').val();
        var valor = $('#valor_edit').val();
        var empresa = $('#empresa_edit').val();
        var anotacao = $('#anotacao_edit').val();
        
        let _url = $('#url_editar').val();
        $("#modal-editar-compra").modal('hide');
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
                    cliente:cliente,
                    data_compra:data_compra,
                    empresa:empresa,
                    anotacao:anotacao
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
            //location.reload();
        }, 3000);
    });

    // $(".btn-excluir-empresa").click(function(){
    //     $("#modal-excluir-empresa").modal();
    //     let id = $("#id_input").val();
    //     $('#id_deletar_empresa').val(id);
    // });

    // $("#deletar").click(function(){
        
    //     let id = $("#id_deletar_empresa").val();
    //     let _url = $('#url_visualizar').val();
    //     let _token   = $('meta[name="csrf-token"]').attr('content');
    //     $('#modal-excluir-empresa').modal('hide');
    //     $('#modal-loading').modal('show');
    //     setTimeout(function () {
    //         $.ajax({
    //             url: _url+"/"+id,
    //             type: "DELETE",
    //             data: {_token:_token},
                
    //             success: function(response) {
    //                 console.log(response);
    //             },
    //             error: function(err) {
    //                 console.log(err)
    //             }
    //         });
    //         $('#modal-loading').modal('hide');
    //         alert("Empresa deletada com sucesso!");
    //         //location.reload();
    //     }, 3000);
    // });

});
