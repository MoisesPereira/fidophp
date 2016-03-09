<?php
require('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./insertCliente.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Cadastro de Clientes</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="fname" type="text" placeholder="Nome" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cpf_cnpj" name="cpf_cnpj" type="text" placeholder="CPF - CNPJ" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Telefone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular" name="celular" type="text" placeholder="Celular" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular2" name="celular2" type="text" placeholder="Celular2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular3" name="celular3" type="text" placeholder="Celular3" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-control">
                            </div>
                        </div> 

                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cidade" name="cidade" type="text" placeholder="Cidade" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <select id="estado" name="estado" placeholder="Estado" class="form-control"> 
                                    <option value="">Selecione o Estado</option> 
                                    <option value="AC">Acre</option> 
                                    <option value="AL">Alagoas</option> 
                                    <option value="AM">Amazonas</option> 
                                    <option value="AP">Amapá</option> 
                                    <option value="BA">Bahia</option> 
                                    <option value="CE">Ceará</option> 
                                    <option value="DF">Distrito Federal</option> 
                                    <option value="ES">Espírito Santo</option> 
                                    <option value="GO">Goiás</option> 
                                    <option value="MA">Maranhão</option> 
                                    <option value="MT">Mato Grosso</option> 
                                    <option value="MS">Mato Grosso do Sul</option> 
                                    <option value="MG">Minas Gerais</option> 
                                    <option value="PA">Pará</option> 
                                    <option value="PB">Paraíba</option> 
                                    <option value="PR">Paraná</option> 
                                    <option value="PE">Pernambuco</option> 
                                    <option value="PI">Piauí</option> 
                                    <option value="RJ">Rio de Janeiro</option> 
                                    <option value="RN">Rio Grande do Norte</option> 
                                    <option value="RO">Rondônia</option> 
                                    <option value="RS">Rio Grande do Sul</option> 
                                    <option value="RR">Roraima</option> 
                                    <option value="SC">Santa Catarina</option> 
                                    <option value="SE">Sergipe</option> 
                                    <option value="SP">São Paulo</option> 
                                    <option value="TO">Tocantins</option> 
                                </select>
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="cep" name="cep" type="text" placeholder="CEP" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="referencia" name="referencia" type="text" placeholder="Ponto de Referencia" class="form-control">
                            </div>
                        </div>    

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="observacao" name="observacao" placeholder="Digite alguma observação sobre o cliente." rows="7"></textarea>
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


</body>

</html>