<?php
require('header.php');
require('./model/db/Conexao.class.php');

$idCliente = $_GET['id'];

$conn = Conexao::getInstace();
$q = mysqli_query($conn, "select * from tb_cliente where id_cliente = {$idCliente}");
$t = mysqli_fetch_assoc($q);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="/model/alterarCliente.php">
                    <fieldset>
                        <legend class="text-center header">Detalhes do Clientes</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="id_cliente" name="id_cliente" type="hidden" value="<?php echo $t['id_cliente']; ?>" class="form-control">
                                <label>Nome:</label>
                                <input id="fname" name="fname" type="text" value="<?php echo $t['nome']; ?>" class="form-control">
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
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label>CPF / CNPJ:</label>
                                <input id="cpf_cnpj" name="cpf_cnpj" type="text" value="<?php echo $t['cpf_cnpj']; ?>" class="form-control">
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
                                <label>Celular2:</label>
                                <input id="celular2" name="celular2" type="text" value="<?php echo $t['celular2']; ?>" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <label>Celular3:</label>
                                <input id="celular3" name="celular3" type="text" value="<?php echo $t['celular3']; ?>" placeholder="Celular3" class="form-control">
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

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <label>Observação:</label>                            
                                <textarea class="form-control" id="observacao" name="observacao" rows="7" ><?php echo $t['observacao']; ?></textarea>
                            </div>
                        </div>                           

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
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