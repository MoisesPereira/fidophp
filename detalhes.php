<?php
require('header.php');
require('Conexao.class.php');

$idCliente = $_GET['id'];

$conn = Conexao::getInstace();
$q = mysqli_query($conn, "select * from tb_cliente where id_cliente = {$idCliente}");
$t = mysqli_fetch_row($q);


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./alterar.php">
                    <fieldset>
                        <legend class="text-center header">Detalhes do Clientes</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="fname" type="text" value="<?php echo $t[1]; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" value="<?php echo $t[2]; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" value="<?php echo $t[3]; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular" name="celular" type="text" value="<?php echo $t[4]; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular2" name="celular2" type="text" value="<?php echo $t[5]; ?>" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular3" name="celular3" type="text" value="<?php echo $t[6]; ?>" placeholder="Celular3" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="endereco" name="endereco" type="text" value="<?php echo $t[7]; ?>" placeholder="Endereço" class="form-control">
                            </div>
                        </div> 

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="bairro" name="bairro" type="text" value="<?php echo $t[10]; ?>" placeholder="Bairro" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cidade" name="cidade" type="text" value="<?php echo $t[11]; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="estado" name="estado" type="text" value="<?php echo $t[12]; ?>" placeholder="Cidade" class="form-control">
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cep" name="cep" type="text" value="<?php echo $t[13]; ?>" placeholder="CEP" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="referencia" name="referencia" type="text" value="<?php echo $t[14]; ?>" placeholder="Ponto de Referencia" class="form-control">
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