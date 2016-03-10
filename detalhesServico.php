<?php
require('header.php');
require('Conexao.class.php');

$id = $_GET['id'];

$conn = Conexao::getInstace();

$query = "select tc.nome cliente, tc.email, tc.telefone, tc.celular, tc.celular2, tc.endereco, tc.bairro, 
        tc.cidade, tc.estado, tc.cep, tc.referencia, format(ss.valor,2,'de_DE') valor, ss.concluido, ss.dt_entrega,
        ss.observacao, ss.gasto1, format(ss.valor1,2,'de_DE') valor1, ss.gasto2, format(ss.valor2,2,'de_DE') valor2, 
        ss.gasto3, format(ss.valor3,2,'de_DE') valor3, ss.gasto4, format(ss.valor4,2,'de_DE') valor4,
        ss.gasto5, format(ss.valor5,2,'de_DE') valor5, tf.nome, ts.descricao desc_servico, ti.descricao desc_imagem, tfp.descricao
    from tb_servico ss, tipo_servico ts, tb_cliente tc, tb_imagem ti, tb_funcionario tf, tb_forma_pagamento tfp
    where ss.id_servico = 32
        and ss.tipo_servico = ts.id_tipo_servico
        and tc.id_cliente = ss.tb_cliente_id_cliente
        and tf.id_funcionario = ss.funcionario
        and tfp.id_forma_pagamento = ss.forma_pagamento
        and ss.id_servico = ti.tb_servico_id_servico;";

$q = mysqli_query($conn, $query);
$t = mysqli_fetch_assoc($q);

$imagens = array();
$i = 0;

while($img = mysqli_fetch_assoc($q)){
    $imagens[$i] = $img['desc_imagem'];
    $i++;
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./alterarServico.php">
                    <fieldset>
                        <legend class="text-center header">Detalhes do Serviço</legend>

                        <p class="text-center header">Cliente</p>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Nome:</label>
                                <input id="id_servico" name="id_servico" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="fname" name="fname" type="text" value="<?php echo $t['cliente']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Email:</label>
                                <input id="email" name="email" type="text" value="<?php echo $t['email']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Telefone:</label>
                                <input id="phone" name="phone" type="text" value="<?php echo $t['telefone']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular:</label>
                                <input id="celular" name="celular" type="text" value="<?php echo $t['celular']; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular 2:</label>
                                <input id="celular2" name="celular2" type="text" value="<?php echo $t['celular2']; ?>" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Endereço:</label>
                                <input id="endereco" name="endereco" type="text" value="<?php echo $t['endereco']; ?>" placeholder="Endereço" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Bairro:</label>
                                <input id="bairro" name="bairro" type="text" value="<?php echo $t['bairro']; ?>" placeholder="Bairro" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Cidade:</label>
                                <input id="cidade" name="cidade" type="text" value="<?php echo $t['cidade']; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Estado:</label>
                                <input id="estado" name="estado" type="text" value="<?php echo $t['estado']; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>CEP:</label>
                                <input id="cep" name="cep" type="text" value="<?php echo $t['cep']; ?>" placeholder="CEP" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Referência:</label>
                                <input id="referencia" name="referencia" type="text" value="<?php echo $t['referencia']; ?>" placeholder="Ponto de Referencia" class="form-control">
                            </div>
                        </div>   


                        <p class="text-center header">Serviço</p>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Funcionario:</label>
                                <input id="funcionario" name="funcionario" type="text" value="<?php echo $t['nome']; ?>" class="form-control">
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
                                <input id="forma_pagamento" name="forma_pagamento" type="text" value="<?php echo $t['descricao']; ?>" class="form-control">
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
                                <input id="dt_entrega" name="dt_entrega" type="text" value="<?php echo $t['dt_entrega']; ?>" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Tipo:</label>
                                <input id="desc_servico" name="desc_servico" type="text" value="<?php echo $t['desc_servico']; ?>" class="form-control">
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
                                echo "<div class='col-lg-3 col-sm-4 col-6'><a href='#' >
                                        <img src='./uploads/$imagens[$j]' class='thumbnail img-responsive'></a>
                                      </div>";
                         } ?>
                    </div>

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
                            <button type="submit" class="btn btn-primary btn-lg">Deletar</button>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>




</body>

</html>