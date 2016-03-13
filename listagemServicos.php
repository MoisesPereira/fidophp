<?php
require('header.php');
require('Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';

$ordem_servico = isset($_POST['ordem_servico']) ? $_POST['ordem_servico'] : '';
$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : '';
$dt_ini = isset($_POST['dt_inicial']) ? $_POST['dt_inicial'] : '';
$dt_fim = isset($_POST['dt_final']) ? $_POST['dt_final'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';
$tp_servico = isset($_POST['tp_servico']) ? $_POST['tp_servico'] : '';

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


          <div class="form-group" >
                <input class="form-control" id="ordem_servico" name="ordem_servico" type="text" placeholder="Ordem Serviço" value="<?=$ordem_servico; ?>" >
          </div>

          <div class="form-group">
                <input id="cliente" name="cliente" type="text" value="<?=$nome; ?>" placeholder="Cliente" class="form-control">
          </div>

            <div class="form-group">
                <div class="col-md-8">
                    <select id="funcionario" name="funcionario" placeholder="Escolha o Funcionario" class="form-control"> 
                        <option value="">Funcionario</option> 
                    </select>
                </div>
            </div>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Entrega Inicial" id="datepicker" name="dt-ini">
            <input type="hidden" id="dt_inicial" placeholder="data inicial" name="dt_inicial" class="form-control">
          </div>  

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Entrega Final" id="datepicker2" name="dt_fim">
            <input type="hidden" id="dt_final" name="dt_final" class="form-control">
          </div>           

          <div class="form-group">
            <select id="concluido" name="concluido" class="form-control"> 
                <option value="">Concluído</option> 
                <option value="0">Não</option> 
                <option value="1">Sim</option> 
            </select>
          </div>  
            
            <button type='submit' class='btn btn-default'>Pesquisar</button>
            <a href='/listagemServicos.php' class='btn btn-default'>Limpar</a>

        </form>

        </div>
        </div>
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

    // Busca os funcionarios cadastrados
        $.ajax({
            url: 'http://fidophp.com.br/getFuncionario.ajax.php',
            success: function(response){

                var parse = JSON.parse(response);
                var count = Object.keys(parse).length;

                for (var i = 0; i < count; i++) {

                    var option = "<option value="+parse[i].id_funcionario+">"+parse[i].nome+"</option>";
                    
                    $('#funcionario').append(option);
                };

            },
            error: function( response ) {
                console.log( 'Deu merda', response ); 
            }
    });        
});

$('#datepicker').change(function(){
    var dt_ini = $('#datepicker').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#dt_inicial').attr("value", dt_ini));
});

$('#datepicker2').change(function(){
    var dt_final = $('#datepicker2').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#dt_final').attr("value", dt_final));
});

// Chama o popup de de Lista Clientes
$('#cliente').click(function(event) {
    var param = window.location.search;
    if(param){
        window.location.href = 'encontreClientes.php';
    }
    else{
        window.location.href = 'encontreClientes.php';
    }
});

</script>


<?php

if( $id != '' || $ordem_servico != '' || $funcionario != '' || $dt_ini != '' || $dt_fim != '' || $concluido != '' ){

$qid = ($id != '')  ? "and tb_cliente_id_cliente = {$id} " : '';
$qordem_servico = ($ordem_servico != '') ? "and ss.id_servico = {$ordem_servico} " : '';
$qfuncionario = ($funcionario != '') ? "and funcionario = '{$funcionario}' " : '';
$qdata = ($dt_ini != '') ? "and dt_entrega between '{$dt_ini}' and '{$dt_fim}' " : '';
$qconcluido = ($concluido != '') ? "and concluido = '{$concluido}' " : '';

$queryN =  "select format(ss.valor,2,'de_DE') valor_total, ss.observacao obs, ss.*, tf.*, ts.*, tc.* from tb_servico ss
                 inner join tb_funcionario tf 
                    on ss.funcionario = tf.id_funcionario
                 inner join tipo_servico ts
                    on ss.tipo_servico = ts.id_tipo_servico
                 inner join tb_cliente tc
                    on ss.tb_cliente_id_cliente = tc.id_cliente
            where 1 = 1
            {$qid}
            {$qordem_servico}
            {$qfuncionario}
            {$qdata}
            {$qconcluido};";    

    ?>
    <table border="1" class="table table-hover">
        <thead>
        <tr>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Entrega</th>
            <th>Concluido</th>
            <th>Serviço</th>            
            <th>Observação</th>
            <th>Selecione</th>
        </tr>
        </thead>
        <tbody>
    <?php

    
    $conn = Conexao::getInstace();
    $q = mysqli_query($conn, $queryN);

    while($t = mysqli_fetch_assoc($q)){

        $conc = $t['concluido'] == 0 ? 'Não' : 'Sim';
       
        echo "<tr>";
        echo "<td>{$t['nome']}</td>";
        echo "<td>{$t['valor_total']}</td>";
        echo "<td>{$t['dt_entrega']}</td>";
        echo "<td>{$conc}</td>";
        echo "<td>{$t['descricao']}</td>";
        echo "<td>{$t['obs']}</td>";
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