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
                    <fieldset>
                        <legend class="text-center header">Ordem de Serviço: <b style='color:red'><?=$id; ?></b> </legend>

                        <p class="text-center header">Cliente</p>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Nome:</label>
                                <input id="id_servico" name="id_servico" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="fname" name="fname" disabled type="text" value="<?php echo $t['cliente']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Email:</label>
                                <input id="email" name="email" disabled type="text" value="<?php echo $t['email']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Telefone:</label>
                                <input id="phone" name="phone" disabled type="text" value="<?php echo $t['telefone']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular:</label>
                                <input id="celular" name="celular" disabled type="text" value="<?php echo $t['celular']; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular 2:</label>
                                <input id="celular2" name="celular2" disabled type="text" value="<?php echo $t['celular2']; ?>" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Endereço:</label>
                                <input id="endereco" name="endereco" disabled type="text" value="<?php echo $t['endereco']; ?>" placeholder="Endereço" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Bairro:</label>
                                <input id="bairro" name="bairro" disabled type="text" value="<?php echo $t['bairro']; ?>" placeholder="Bairro" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Cidade:</label>
                                <input id="cidade" name="cidade" disabled type="text" value="<?php echo $t['cidade']; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Estado:</label>
                                <input id="estado" name="estado" disabled type="text" value="<?php echo $t['estado']; ?>" placeholder="Estado" class="form-control">
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>CEP:</label>
                                <input id="cep" name="cep" disabled type="text" value="<?php echo $t['cep']; ?>" placeholder="CEP" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Referência:</label>
                                <input id="referencia" name="referencia" disabled type="text" value="<?php echo $t['referencia']; ?>" placeholder="Ponto de Referencia" class="form-control">
                            </div>
                        </div>   


                        <p class="text-center header">Serviço</p>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Funcionario:</label>
                                <select id="funcionario" name="funcionario" placeholder="Escolha o Funcionario" class="form-control"> 
                                    <option value="<?php echo $t['id_funcionario']; ?>" selected><?php echo $t['nome']; ?></option> 
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Valor:</label>
                                <input id="valor" name="valor" type="text" value="<?php echo $t['valor']; ?>" class="form-control">
                            </div>
                        </div>       

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Forma de Pagamento:</label>
                                <select id="forma_pagamento" name="forma_pagamento" placeholder="Forma Pagamento" class="form-control"> 
                                    <option value="<?php echo $t['id_forma_pagamento']; ?>" selected><?php echo $t['descricao']; ?></option> 
                                </select>                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Concluido:</label>
                                 <select id="concluido" name="concluido" placeholder="Concluido" class="form-control"> 
                                    <option <?= $t['concluido'] == 0 ? 'selected' : ''; ?> value="0">Não</option> 
                                    <option <?= $t['concluido'] == 1 ? 'selected' : ''; ?> value="1">Sim</option> 
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Data de Entrega:</label>
                                <input id="datepicker" name="dt_entrega" type="text" value="<?php echo $data_entrega; ?>" class="form-control">
                                <input type="hidden" id="data_entrega" value="<?php echo $data_entrega; ?>" name="data_entrega" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <label>Tipo de Serviço:</label>
                                 <select id="tp_servico" name="tp_servico" placeholder="Escolha o Serviço" class="form-control"> 
                                    <option value="<?php echo $t['id_tipo_servico']; ?>" selected><?php echo $t['desc_servico']; ?></option> 
                                 </select>
                            </div>
                        </div>                         

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Observação:</label>
                                <textarea class="form-control" id="observacao" name="observacao" rows="7" ><?php echo $t['observacao']; ?></textarea>
                            </div>
                        </div>


                  

                        <p class="text-center header">Gastos</p>




                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 1:</label>
                                <input id="gasto1" name="gasto1" type="text" value="<?= $t['gasto1']; ?>" class="form-control">
                            
                            <label>Valor 1:</label>
                                <input id="valor1" name="valor1" type="text" value="<?= $t['valor1']; ?>" class="form-control">
                            </div>
                        </div>    

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 2:</label>
                                <input id="gasto2" name="gasto2" type="text" value="<?= $t['gasto2']; ?>" class="form-control">
                            
                            <label>Valor 2:</label>
                                <input id="valor2" name="valor2" type="text" value="<?= $t['valor2']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 3:</label>
                                <input id="gasto3" name="gasto3" type="text" class="form-control">
                            
                            <label>Valor 3:</label>
                                <input id="valor3" name="valor3" type="text" value="<?= $t['valor3']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 4:</label>
                                <input id="gasto4" name="gasto4" type="text" class="form-control">
                            
                            <label>Valor 4:</label>
                                <input id="valor4" name="valor4" type="text" value="<?= $t['valor4']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 5:</label>
                                <input id="gasto5" name="gasto5" type="text" class="form-control">
                            
                            <label>Valor 5:</label>
                                <input id="valor5" name="valor5" type="text" value="<?= $t['valor5']; ?>" class="form-control">
                            </div>
                        </div>                    



                    <div class="row">
                         <? for($j=0; $j<count($imagens); $j++){
                             
                                echo "<div class='col-lg-3 col-sm-4 col-6' id='remove-{$j}'><a href='#img_fim' >";
                                echo    "<div class='remover_img'>Deletar</div>";
                                echo        "<img src='./uploads/$imagens[$j]' class='thumbnail img-responsive'>";
                                echo "</div>";
                         } 
                         echo "<div id='img_fim'></div>";
                         ?>

                    </div>

                    <?php 

                        if($k=count($imagens) < 9){
                            echo "<div class='form-group'>";
                            echo "<span class='col-md-1 col-md-offset-2 text-center'><i class='fa fa-img-square bigicon'></i></span>";
                            echo "<div class='col-md-8'>";
                            for($k=count($imagens); $k<=9; $k++ ){
                                echo "<input id='imagem' name='imagem[]' type='file' placeholder='imagem' class='form-control'>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                        
                    ?>

                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">Fechar</button>
                        </div>
                        <div class="modal-body">
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
                            <a href="/orcamento.php?id=<?=$id?>" class="btn btn-primary btn-lg" >Orçamento<a>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

$('#datepicker').change(function(){
    var dt_entrega = $('#datepicker').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#data_entrega').attr("value", dt_entrega));
});

$('.remover_img').click(function(){
    var remover = $(this).parent().html();
    var id = remover.substring(78, 79);
    var img = remover.substring(58, 83);

    // Deleta a imagem
        $.ajax({
            url: 'http://fidophp.com.br/Ajax/removeImage.ajax.php?img='+img,
            success: function(response){

                console.log('Deu Certo', response);
            },
            error: function( response ) {
                console.log( 'Deu merda', response ); 
            }
    });    

    $('#remove-'+id).remove();

});

$(document).ready(function(){

        // Busca os Serviços
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

        // Busca as formas de pagamento
        $.ajax({
            url: 'http://fidophp.com.br/getFormaPagamento.ajax.php',
            success: function(response){

                var parse = JSON.parse(response);
                var count = Object.keys(parse).length;

                for (var i = 0; i < count; i++) {

                    var option = "<option value="+parse[i].id_forma_pagamento+">"+parse[i].descricao+"</option>";
                    
                    $('#forma_pagamento').append(option);
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
</script>

</body>

</html>