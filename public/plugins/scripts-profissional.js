$(document).ready(function(){

    // Static Mask

    $('#static-mask1').inputmask("99-99999999");  //static mask
    
    // Date 

    $("#date2").inputmask("99-99-9999");

    // Email

    $("#email").inputmask(
        {
            mask:"*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy:!1,onBeforePaste:function(m,a){return(m=m.toLowerCase()).replace("mailto:","")},
            definitions:{"*":
                {
                    validator:"[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]",
                    cardinality:1,
                    casing:"lower"
                }
            }
        }
    )

    // Phone Number
    $("#ph-number").inputmask({mask:"(999) 999-9999"});

    // Currency
    // $("#currency").inputmask({mask:"$999,9999,999.99"});

    /*
    ==================
        METHODS
    ==================
    */


    // On Complete
    //$("#oncomplete").inputmask("99/99/9999",{ oncomplete: function(){ $('#oncompleteHelp').css('display', 'block'); } });


    // On InComplete
    //$("#onincomplete").inputmask("99/99/9999",{ onincomplete: function(){ $('#onincompleteHelp').css('display', 'block'); } });

    
    // On Cleared
    //$("#oncleared").inputmask("99/99/9999",{ oncleared: function(){ $('#onclearedHelp').css('display', 'block'); } });


    // Repeater
    //$("#repeater").inputmask({ "mask": "2", "repeat": 4});  // ~ mask "9999999999"
    

    // isComplete

    // $("#isComplete").inputmask({mask:"999.999.999.99"})
    // $("#isComplete").inputmask("setvalue", "117.247.169.64");
    // $('#isComplete').on('focus keyup', function(event) {
    //     event.preventDefault();
    //     if($(this).inputmask("isComplete")){
    //         $('#isCompleteHelp').css('display', 'block');
    //     }
    // });
    // $('#isComplete').on('keyup', function(event) {
    //     event.preventDefault();
    //     if(!$(this).inputmask("isComplete")){
    //         $('#isCompleteHelp').css('display', 'none');
    //     }
    // });


    // Set Default Value

    $("#setVal").inputmask({
        mask:"*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
        greedy:!1,onBeforePaste:function(m,a){return(m=m.toLowerCase()).replace("mailto:","")},
        definitions:{"*":
            {
                validator:"[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]",
                cardinality:1,
                casing:"lower"
            }
        }
    })
    $('#setVal').on('focus', function(event) {
        $(this).inputmask("setvalue", 'test@mail.com');
    });

    $('#cep').on('blur', function(){

        if($.trim($("#cep").val()) != ""){

            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){

                if(resultadoCEP["resultado"]){
                    $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#uf").val(unescape(resultadoCEP["uf"]));
                }
            });				
        }			
    });

    $('#cep_edit').on('blur', function(){

        if($.trim($("#cep_edit").val()) != ""){

            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep_edit").val(), function(){

                if(resultadoCEP["resultado"]){
                    $("#endereco_edit").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro_edit").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade_edit").val(unescape(resultadoCEP["cidade"]));
                    $("#uf_edit").val(unescape(resultadoCEP["uf"]));
                }
            });				
        }			
    });

    $('#enviar-dados').on('click', function() {
        
        var parceiro = $('#parceiro').val();
        var cpf = $('#cpf').val();
        var email = $('#email').val();
        var area_atuacao = $('#area').val();
        var nascimento = $('#nascimento').val();
        var telefone = $('#telefone').val();
        var cep = $('#cep').val();
        var endereco = $('#endereco').val();
        var bairro = $('#bairro').val();
        var uf = $('#uf').val();
        var cidade = $('#cidade').val();
        var chave_pix = $('#chave_pix').val();
        var banco = $('#banco').val();
        var agencia = $('#agencia').val();
        var conta = $('#conta').val();
        var login = $('#login').val();
        var password = $('#password').val();
        var perfil = $('#perfil').val();
        
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                parceiro: parceiro,
                cpf: cpf,
                email: email,
                area_atuacao: area_atuacao,
                nascimento: nascimento,
                telefone: telefone,
                cep: cep,
                endereco: endereco,
                bairro: bairro,
                uf: uf,
                cidade: cidade,
                chave_pix: chave_pix,
                banco: banco,
                agencia: agencia,
                conta: conta,
                login: login,
                password: password,
                perfil:perfil,
                _token: _token
            },

            success: function(response) {
                if(response.code == 200) {
                    alert("deu tudo certo registro inserido com sucesso na base, parabens")
                }
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    $(".btn-editar-profissional").click(function(){
        $("#modal-editar-profissional").modal();
        let id = $(this).data("id");
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                //console.log(response[0]["razao_social"]);
                $("#id_edit").val(response[0]["id"]);
                $('#parceiro_edit').val(response[0]["parceiro"]);
                $('#cpf_edit').val(response[0]["cpf"]);
                $('#email_edit').val(response[0]["email"]);
                $('#area_edit').val(response[0]["area_atuacao"]);
                $('#nascimento_edit').val(response[0]["nascimento"]);
                $('#telefone_edit').val(response[0]["telefone"]);
                $('#cep_edit').val(response[0]["cep"]);
                $('#endereco_edit').val(response[0]["endereco"]);
                $('#bairro_edit').val(response[0]["bairro"]);
                $('#uf_edit').val(response[0]["uf"]);
                $('#cidade_edit').val(response[0]["cidade"]);
                $('#chave_pix_edit').val(response[0]["chave_pix"]);
                $('#banco_edit').val(response[0]["banco"]);
                $('#agencia_edit').val(response[0]["agencia"]);
                $('#conta_edit').val(response[0]["conta"]);
                $('#login_edit').val(response[0]["login"]);
                $('#password_edit').val(response[0]["password"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $("#editar-dados").click(function(){
        var id = $("#id_edit").val();
        var parceiro = $('#parceiro_edit').val();
        var cpf = $('#cpf_edit').val();
        var email = $('#email_edit').val();
        var area_atuacao = $('#area_edit').val();
        var nascimento = $('#nascimento_edit').val();
        var telefone = $('#telefone_edit').val();
        var cep = $('#cep_edit').val();
        var endereco = $('#endereco_edit').val();
        var bairro = $('#bairro_edit').val();
        var uf = $('#uf_edit').val();
        var cidade = $('#cidade_edit').val();
        var chave_pix = $('#chave_pix_edit').val();
        var banco = $('#banco_edit').val();
        var agencia = $('#agencia_edit').val();
        var conta = $('#conta_edit').val();
        var login = $('#login_edit').val();
        var password = $('#password_edit').val();

        let _url = $('#url_cadastro').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: _url+"/"+id,
            type: "PUT",
            data: {
                id: id,
                parceiro: parceiro,
                cpf: cpf,
                email: email,
                area_atuacao: area_atuacao,
                nascimento: nascimento,
                telefone: telefone,
                cep: cep,
                endereco: endereco,
                bairro: bairro,
                uf: uf,
                cidade: cidade,
                chave_pix: chave_pix,
                banco: banco,
                agencia: agencia,
                conta: conta,
                login: login,
                password: password,
            },
            
            success: function(response) {
                console.log(response);    
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $(".btn-excluir-profissional").click(function(){
        $("#modal-excluir-profissional").modal();
        let _url = $('#url_visualizar').val();
        let id = $(this).data("id");
        $('#id_deletar_profissional').val(id);
    });

    $("#deletar").click(function(){
        var table = $('#zero-config').DataTable();

        let id = $("#id_deletar_profissional").val();
        let _url = $('#url_visualizar').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url+"/"+id,
            type: "DELETE",
            data: {_token:_token},
            
            success: function(response) {
                console.log(response);
            },
            error: function(err) {
                console.log(err)
            }
        });
        //table.ajax.reload();
    });

});