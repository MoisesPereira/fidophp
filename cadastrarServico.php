<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require('header.php');
require('Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : '';

?>

<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./cadastrarServico.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Novo Serviço</legend>

                        <p id="buscar-cliente" rel="modal" class="btn btn-primary btn-lg">Buscar Cliente</p>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="id_cliente" name="id_cliente" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="nome_cliente" name="nome_cliente" type="text"
                                    value="<?=$nome; ?>" placeholder="Cliente" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" 
                                    value="<?=$email; ?>" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" 
                                    value="<?=$telefone; ?>" placeholder="Telefone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                 <select id="tp_servico" name="tp_servico" placeholder="Escolha o Serviço" class="form-control"> 
                                    <option value="">Selecione o Serviço</option> 
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="funcionario" name="funcionario" type="text" placeholder="Funcionario" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="valor" name="valor" type="text" placeholder="Valor" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="forma_pagamento" name="forma_pagamento" type="text" placeholder="Forma Pagamento" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                 <select id="concluido" name="concluido" placeholder="Concluido" class="form-control"> 
                                    <option value="0">Concluido o Serviço</option> 
                                    <option value="0">Não</option> 
                                    <option value="1">Sim</option> 
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Data de Entrega" id="datepicker" name="data-entrega">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-img-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="imagem" name="imagem[]" type="file" placeholder="imagem" class="form-control">
                                <input id="imagem" name="imagem[]" type="file" placeholder="imagem" class="form-control">
                                <input id="imagem" name="imagem[]" type="file" placeholder="imagem" class="form-control">
                                <input id="imagem" name="imagem[]" type="file" placeholder="imagem" class="form-control">

                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Digite informações sobre o Serviço." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
.window{
    display:none;
    width:300px;
    height:300px;
    position:absolute;
    left:0;
    top:0;
    background:#FFF;
    z-index:9900;
    padding:10px;
    border-radius:10px;
}
 
#mascara{
    display:none;
    position:absolute;
    left:0;
    top:0;
    z-index:9000;
    background-color:#000;
}
 
.fechar{display:block; text-align:right;}
</style>

<div class="window" id="janela1">
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre Clientes</legend>
        </fieldset>

        <form class="form-inline" action="#" method="post" role="form">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telefone">Tel:</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
          </div>  

          <p id="submit-cliente" class="btn btn-default">Submit</p>
        </form>

        </div>
        </div>
    </div>

    <table border="1" id="rstable" class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Escolha o Cliente</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<script>

// Popula o Combo Box de Serviços
$(document).ready(function(){
        $.ajax({
        url: 'http://fidophp.com.br/getServicos.ajax.php',
        success: function(response){

            var parse = JSON.parse(response);
            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {

                var option = "<option value="+parse[i].id_tipo_servico+">"+parse[i].descricao+"</option>";
                
                $('#tp_servico').append(option);
            };

        },
        error: function( response ) {
            console.log( 'Deu merda', response ); 
        }
    });
});

// Chama o popup de de Lista Clientes
$('#buscar-cliente').click(function(event) {
    var param = window.location.search;
    if(param){
        window.location.href = 'servico.php';
    }
    else{
        $('#janela1').dialog({modal: true, height: 590, width: 1005 });
    }
});

//Chama o ajax que retorna os clientes
$('#submit-cliente').click(function(event) {

    var nome = $('#nome').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();

    $.ajax({
        url: 'http://fidophp.com.br/getClientes.ajax.php?nome='+nome+'&email='+email+'&telefone='+telefone,
        success: function(response){

            var parse = JSON.parse(response);
            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {
                var table = "<tr><td>" + parse[i].nome + "</td>";
                table += "<td>" + parse[i].email + "</td>"; 
                table += "<td>" + parse[i].telefone + "</td>";  
                table += "<td><a href='/servico.php?id=" + parse[i].id_cliente + "&nome="+
                     parse[i].nome + "&email="+parse[i].email+ "&telefone=" +parse[i].telefone+ "'>Selecionar</a></td></tr>";  

                $('#rstable tbody').append(table);
            };

        },
        error: function( response ) {
            console.log( 'Deu merda', response ); 
        }
    });
    
});

$(document).ready(function(){
    $("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
     
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000); 
        $('#mascara').fadeTo("slow",0.8);
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );
     
        $(id).css({'top':top,'left':left});
        $(id).show();   
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });
});
</script>

</body>

</html>