<?php
require('header.php');
require('Conexao.class.php');

$id = $_GET['id'];

$conn = Conexao::getInstace();

$query = "select tc.nome cliente, tc.email, tc.telefone, tc.celular, tc.celular2, tc.endereco, tc.bairro, 
        tc.cidade, tc.estado, tc.cep, tc.referencia, format(ss.valor,2,'de_DE') valor, ss.concluido, ss.dt_entrega,
        ss.observacao, ss.gasto1, format(ss.valor1,2,'de_DE') valor1, ss.gasto2, format(ss.valor2,2,'de_DE') valor2, 
        ss.gasto3, format(ss.valor3,2,'de_DE') valor3, ss.gasto4, format(ss.valor4,2,'de_DE') valor4,
        ss.gasto5, format(ss.valor5,2,'de_DE') valor5, tf.id_funcionario, tf.nome, ts.id_tipo_servico, 
        ts.descricao desc_servico, tfp.id_forma_pagamento, tfp.descricao
    from tb_servico ss
    inner join tipo_servico ts
        on ss.tipo_servico = ts.id_tipo_servico
    inner join tb_cliente tc
        on ss.tb_cliente_id_cliente = tc.id_cliente
    inner join tb_funcionario tf
        on ss.funcionario = tf.id_funcionario
    inner join tb_forma_pagamento tfp
        on ss.forma_pagamento = tfp.id_forma_pagamento
    where ss.id_servico = {$id}";

$queryImg = "select * from tb_imagem where tb_servico_id_servico = {$id}";

$rstQuery = mysqli_query($conn, $query);
$rstImage = mysqli_query($conn, $queryImg);

$t = mysqli_fetch_assoc($rstQuery);

$data_entrega = explode('-', $t['dt_entrega']);
$data_entrega = $data_entrega[2].'/'.$data_entrega[1].'/'.$data_entrega[0];

$imagens = array();
$i = 0;

while($img = mysqli_fetch_assoc($rstImage)){
    $imagens[$i] = $img['descricao'];
    $i++;
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./alterarServico.php" enctype="multipart/form-data">
                <img src="./img/logo3.png">
                <span class="pull-right">
                              <h4>End:  Av. Água Fria, 631 - São Paulo / SP <br>
                              Tels:  (11) 2809 1111 <br>
                              Email:  tapecaria@fidoti.com.br </h4>
                </span>
                <br><br>

                <p class="text-center header">Ordem de Serviço: <b style='color:red'><?=$id; ?></b></p>
                  
                    <fieldset>
                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Nome:</label>
                                <input id="id_servico" name="id_servico" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="fname" name="fname" disabled type="text" value="<?php echo $t['cliente']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Tipo de Serviço:</label>
                                <input id="tp_servico" name="tp_servico" disabled type="text" value="<?php echo $t['desc_servico']; ?>" class="form-control">
                            </div>
                        </div>                         

                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Data de Entrega:</label>
                                <input id="datepicker" name="dt_entrega" disabled type="text" value="<?php echo $data_entrega; ?>" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Concluido:</label>
<input id="concluido" name="concluido" type="text" value="<?= $t['concluido'] == 0 ? 'Não' : 'Sim'; ?>" disabled class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Valor R$:</label>
                                <input id="valor" name="valor" disabled type="text" value="<?php echo $t['valor']; ?>" class="form-control">
                            </div>
                        </div>       

                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Forma de Pagamento:</label>
<input id="forma_pagamento" name="forma_pagamento" type="text" disabled value="<?= $t['descricao']; ?>" class="form-control">                            </div>
                        </div> 
                        

                        <div class="form-group">
                            <div class="col-md-8">
                            <label>Observação:</label>
                                <textarea class="form-control" disabled id="observacao" name="observacao" rows="7" ><?php echo $t['observacao']; ?></textarea>
                            </div>
                        </div>


                    <div class="form-group">
                        <div class="col-md-12 text-center">
            <input class="btn btn-primary btn-lg" type="button" name="imprimir" id="imprimir" value="Imprimir">
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
</style>


<script>
$('#imprimir').click(function(){

    $(this).remove();
    window.print();

})


</script>

</body>

</html>