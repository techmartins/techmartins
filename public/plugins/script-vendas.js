$(document).ready(function(){

    $('#enviar-dados').on('click', function() {
        
        var cliente = $('#cliente').val();
        var valor = $('#valor').val();
        var descricao_servico = $('#descricao_servico').val();
        var indicador = $('#indicador').val();
        var pontuacao_indicador = $('#pontuacao_indicador').val();
        var contato = $('#contato').val();
        if($('#indicado_profissional').val() !== 0){
            var indicado = $('#indicado_profissional').val();
        }else{
            var indicado = $('#indicado_empresa').val();
        }
        var status = $('#status').val();
        
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
                if(response.code) {
                    alert("deu tudo certo registro inserido com sucesso na base, parabens");
                }
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    // $(".btn-editar-profissional").click(function(){
    //     $("#modal-editar-profissional").modal();
    //     let id = $(this).data("id");
    //     let _url = $('#url_visualizar').val();
    //     //let _token   = $('meta[name="csrf-token"]').attr('content');
        
    //     $.ajax({
    //         url: _url+"/"+id,
    //         type: "GET",
            
    //         success: function(response) {
    //             //console.log(response[0]["razao_social"]);
    //             $("#id_edit").val(response[0]["id"]);
    //             $('#parceiro_edit').val(response[0]["parceiro"]);
    //             $('#cpf_edit').val(response[0]["cpf"]);
    //             $('#email_edit').val(response[0]["email"]);
    //             $('#area_edit').val(response[0]["area_atuacao"]);
    //             $('#nascimento_edit').val(response[0]["nascimento"]);
    //             $('#telefone_edit').val(response[0]["telefone"]);
    //             $('#cep_edit').val(response[0]["cep"]);
    //             $('#endereco_edit').val(response[0]["endereco"]);
    //             $('#bairro_edit').val(response[0]["bairro"]);
    //             $('#uf_edit').val(response[0]["uf"]);
    //             $('#cidade_edit').val(response[0]["cidade"]);
    //             $('#chave_pix_edit').val(response[0]["chave_pix"]);
    //             $('#banco_edit').val(response[0]["banco"]);
    //             $('#agencia_edit').val(response[0]["agencia"]);
    //             $('#conta_edit').val(response[0]["conta"]);
    //             $('#login_edit').val(response[0]["login"]);
    //             $('#password_edit').val(response[0]["password"]);
    //         },
    //         error: function(err) {
    //             console.log(err)
    //         }
    //     });

    // });

    // $("#editar-dados").click(function(){
    //     var id = $("#id_edit").val();
    //     var parceiro = $('#parceiro_edit').val();
    //     var cpf = $('#cpf_edit').val();
    //     var email = $('#email_edit').val();
    //     var area_atuacao = $('#area_edit').val();
    //     var nascimento = $('#nascimento_edit').val();
    //     var telefone = $('#telefone_edit').val();
    //     var cep = $('#cep_edit').val();
    //     var endereco = $('#endereco_edit').val();
    //     var bairro = $('#bairro_edit').val();
    //     var uf = $('#uf_edit').val();
    //     var cidade = $('#cidade_edit').val();
    //     var chave_pix = $('#chave_pix_edit').val();
    //     var banco = $('#banco_edit').val();
    //     var agencia = $('#agencia_edit').val();
    //     var conta = $('#conta_edit').val();
    //     var login = $('#login_edit').val();
    //     var password = $('#password_edit').val();

    //     let _url = $('#url_cadastro').val();
        
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
        
    //     $.ajax({
    //         url: _url+"/"+id,
    //         type: "PUT",
    //         data: {
    //             id: id,
    //             parceiro: parceiro,
    //             cpf: cpf,
    //             email: email,
    //             area_atuacao: area_atuacao,
    //             nascimento: nascimento,
    //             telefone: telefone,
    //             cep: cep,
    //             endereco: endereco,
    //             bairro: bairro,
    //             uf: uf,
    //             cidade: cidade,
    //             chave_pix: chave_pix,
    //             banco: banco,
    //             agencia: agencia,
    //             conta: conta,
    //             login: login,
    //             password: password,
    //         },
            
    //         success: function(response) {
    //             console.log(response);    
    //         },
    //         error: function(err) {
    //             console.log(err)
    //         }
    //     });

    // });


});