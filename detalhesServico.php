<?php
require('header.php');
require('Conexao.class.php');

$id = $_GET['id'];

$conn = Conexao::getInstace();
$q = mysqli_query($conn, "select tc.nome, tc.email, tc.telefone, tc.celular, tc.celular2, tc.endereco, 
                    tc.bairro, tc.cidade, tc.estado, tc.cep, tc.referencia,
                    ss.funcionario, ss.valor, ss.forma_pagamento, ss.concluido, ss.dt_entrega, ss.observacao,
                    ts.descricao desc_servico, ti.descricao desc_imagem 
                    from tb_servico ss, tipo_servico ts, tb_cliente tc, tb_imagem ti
                    where ss.id_servico = {$id}
                    and ss.tipo_servico = ts.id_tipo_servico
                    and tc.id_cliente = ss.tb_cliente_id_cliente
                    and ss.id_servico = ti.tb_servico_id_servico;");
$t = mysqli_fetch_assoc($q);


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
                                <input id="fname" name="fname" type="text" value="<?php echo $t['nome']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" value="<?php echo $t['email']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" value="<?php echo $t['telefone']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular" name="celular" type="text" value="<?php echo $t['celular']; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular2" name="celular2" type="text" value="<?php echo $t['celular2']; ?>" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="endereco" name="endereco" type="text" value="<?php echo $t['endereco']; ?>" placeholder="Endereço" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="bairro" name="bairro" type="text" value="<?php echo $t['bairro']; ?>" placeholder="Bairro" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cidade" name="cidade" type="text" value="<?php echo $t['cidade']; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="estado" name="estado" type="text" value="<?php echo $t['estado']; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cep" name="cep" type="text" value="<?php echo $t['cep']; ?>" placeholder="CEP" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="referencia" name="referencia" type="text" value="<?php echo $t['referencia']; ?>" placeholder="Ponto de Referencia" class="form-control">
                            </div>
                        </div>   


                        <p class="text-center header">Serviço</p>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Funcionario:</label>
                                <input id="funcionario" name="funcionario" type="text" value="<?php echo $t['funcionario']; ?>" class="form-control">
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
                                <input id="forma_pagamento" name="forma_pagamento" type="text" value="<?php echo $t['forma_pagamento']; ?>" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Concluido:</label>
                                <input id="concluido" name="concluido" type="text" value="<?php echo $t['concluido']; ?>" class="form-control">
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
                            <label>Observação:</label>
                                <input id="observacao" name="observacao" type="text" value="<?php echo $t['observacao']; ?>"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Tipo:</label>
                                <input id="desc_servico" name="desc_servico" type="text" value="<?php echo $t['desc_servico']; ?>" class="form-control">
                            </div>
                        </div> 

                        <p class="text-center header">Gastos</p>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Gasto 1:</label>
                                <input id="gasto1" name="gasto1" type="text" value="<?php echo $t['gasto1']; ?>" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Observação:</label>
                                <input id="observacao" name="observacao" type="text" value="<?php echo $t['observacao']; ?>"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Tipo:</label>
                                <input id="desc_servico" name="desc_servico" type="text" value="<?php echo $t['desc_servico']; ?>" class="form-control">
                            </div>
                        </div> 
                    


Colocar umas divs para receber as imagens (Criar um for de 5 ou 10 para carregar as imagens)
                        <div id="img">
                            <img src="./uploads/<?=$t['desc_imagem']?>" height="100" width="100"></img>
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