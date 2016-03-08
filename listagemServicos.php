<?php
require('header.php');
require('Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
?>

<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre o Serviço Por:</legend>
        </fieldset>

        <form class="form-inline" action="#" method="post" role="form">
          <div class="form-group">
            <input id="id_cliente" name="id_cliente" type="hidden" value="<?=$id; ?>" class="form-control">
            <input id="cliente" name="cliente" type="text" value="<?=$nome; ?>" placeholder="Cliente" class="form-control">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Funcionario" id="funcionario" name="funcionario">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Data Entrega" id="datepicker" name="dt_entrega">
          </div>  

          <div class="form-group">
            <select id="concluido" name="concluido" class="form-control"> 
                <option value="">Concluído</option> 
                <option value="0">Não</option> 
                <option value="1">Sim</option> 
            </select>
          </div>  

          <div class="form-group">
             <select id="tp_servico" name="tp_servico" placeholder="Escolha o Serviço" class="form-control"> 
                <option value="">Selecione o Serviço</option> 
            </select>
          </div>  

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

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
            <legend class="text-center header">Encontre Cliente</legend>
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
$('#cliente').click(function(event) {
    var param = window.location.search;
    if(param){
        window.location.href = 'listagemServicos.php';
    }
    else{
        $('#janela1').dialog({modal: true, height: 590, width: 1005 });
    }
});

//Chama o ajax que retorna os clientes
$('#submit-cliente').click(function(event) {
    //alert('11');

    var nome = $('#nome').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();

    $.ajax({
        url: 'http://fidophp.com.br/getClientes.ajax.php?nome='+nome+'&email='+email+'&telefone='+telefone,
        success: function(response){

            console.log('retorno cliente: ', response);

            var parse = JSON.parse(response);
            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {
                var table = "<tr><td>" + parse[i].nome + "</td>";
                table += "<td>" + parse[i].email + "</td>"; 
                table += "<td>" + parse[i].telefone + "</td>";  
                table += "<td><a href='/listagemServicos.php?id=" + parse[i].id_cliente + "&nome="+
                     parse[i].nome + "'>Selecionar</a></td></tr>";  

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

</div>

<?php

$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : '';
/*$dt_entrega = isset($_POST['dt_entrega']) ? $_POST['dt_entrega'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';
$tp_servico = isset($_POST['tp_servico']) ? $_POST['tp_servico'] : '';
*/

//if( $id != '' || $funcionario != '' || $dt_entrega != '' || $concluido != '' || $tp_servico != '' ){
if( $id != '' || $funcionario != '' ){

$qid = ($id != '')  ? "and tb_cliente_id_cliente = {$id} " : '';
$qfuncionario = ($funcionario != '') ? "and funcionario = '%{$funcionario}%' " : '';
/*$qtelefone = ($telefone != '') ? "and telefone like '%{$telefone}%' " : '';
$qData = ( empty($dtIni) && empty($dtFim) ) ? "and STR_TO_DATE('dt_cadastro','%Y-%m-%d') BETWEEN '{$dtIni[2]}-{$dtIni[1]}-{$dtIni[0]}' AND '{$dtFim[2]}-{$dtFim[1]}-{$dtFim[0]}'" : '';
*/

$queryN = "select * from tb_servico ss inner join tipo_servico ts 
    where 1 = 1 
    {$qid} {$qfuncionario}
    and ss.tipo_servico = ts.id_tipo_servico";

    ?>
    <table border="1" class="table table-hover">
        <thead>
        <tr>
            <th>Funcionário</th>
            <th>Valor</th>
            <th>Tipo Serviço</th>
            <th>Data Entrega</th>
            <th>Concluido</th>
            <th>Data Entrega</th>
            <th>Selecione</th>
        </tr>
        </thead>
        <tbody>
    <?php

    
    $conn = Conexao::getInstace();
    $q = mysqli_query($conn, $queryN);

    while($t = mysqli_fetch_assoc($q)){
        //var_dump($t);
        
        echo "<tr>";
        echo "<td>{$t['funcionario']}</td>";
        echo "<td>{$t['valor']}</td>";
        echo "<td>{$t['descricao']}</td>";
        echo "<td>{$t['dt_entrega']}</td>";
        echo "<td>{$t['concluido']}</td>";
        echo "<td>{$t['dt_entrega']}</td>";
        echo "<td><a href='/detalhesServico.php?id={$t['id_servico']}'>Selecionar</a></td>";
        echo "</tr>";
    }

?>

        </tbody>
    </table>
<?php    
}
?>
</body>
</html>