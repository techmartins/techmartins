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

    $('#enviar-dados').on('click', function() {
        
        var razao = $('#razao_social').val();
        var cnpj = $('#cnpj').val();
        var email = $('#email').val();
        var atividade = $('#ramo').val();
        var cep = $('#cep').val();
        var endereco = $('#endereco').val();
        var bairro = $('#bairro').val();
        var uf = $('#uf').val();
        var cidade = $('#cidade').val();
        var percentual = $('#percentual').val();
        var contato = $('#contato').val();
        var referencia = $('#referencia').val();
        var login = $('#login').val();
        var password = $('#password').val();
    
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: _url,
            type: "POST",
            data: {
                razao_social: razao,
                cnpj: cnpj,
                email: email,
                ramo_atividade: atividade,
                cep: cep,
                endereco: endereco,
                bairro: bairro,
                uf: uf,
                cidade: cidade,
                percentual: percentual,
                contato: contato,
                referencia: referencia,
                login: login,
                password: password,
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

    $(".btn-editar-empresa").click(function(){
        $("#modal-editar-empresa").modal();
        let id = $(this).data("id");
        let _url = $('#url_visualizar').val();
        //let _token   = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            // dataType: 'json',
            
            success: function(response) {
                console.log(response);
                $('#razao_social_edit').val($response);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $(".btn-excluir-empresa").click(function(){
        $("#modal-excluir-empresa").modal();
        let _url = $('#url_visualizar').val();
        let _id = $(this).data("id");
    });

});