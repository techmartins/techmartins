$(document).ready(function(){

    function carregaPontuacao(){
        var perfil = $('#perfil').val();
        var email = $('#email').val();
        var _url = $('#url_base_dashboard').val();
        $.ajax({
            url: _url+"/minhapontuacao",
            type: "get",
            data: {
                perfil: perfil,
                email: email
            },

            success: function(response) {
                // console.log(response);
                $("#pontuacao_atual_usuario").html(response['pontuacao']['original']);
                $('#realizar-resgate').html(response['resgate']);
                $('#btn-resgate').html(response['btn_resgate']);
            },
            error: function(response) {
                console.log(response)
            }
        });
    }

    function carregaVendasUsuario(){
        var perfil = $('#perfil').val();
        var email = $('#email').val();
        var _url = $('#url_base_dashboard').val();
        $.ajax({
            url: _url+"/minhasvendas",
            type: "get",
            data: {
                perfil: perfil,
                email: email
            },

            success: function(response) {
                var html = "";
                for (let i = 0; i < response.length; i++) {
                    
                    html += "<tr>";
                    html += "<td>"+response[i]['cliente']+"</td>";
                    html += "<td>"+response[i]['valor']+"</td>";
                    html += "<td>"+response[i]['data_venda']+"</td>";
                    html += "</tr>";
                    
                }
                $('.vendas').append(html);
                //location.reload();
            },
            error: function(response) {
                console.log("response")
            }
        });
    }

    $('#btn-resgate').click(function(){
        window.location.replace("/public/vendas/resgate/premio");
    });

    carregaPontuacao();
    carregaVendasUsuario();

});
