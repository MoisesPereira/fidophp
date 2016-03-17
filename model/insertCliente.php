<?php
require('./db/Conexao.class.php');

$nome = $_POST['fname'];
$email = $_POST['email'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$telefone = $_POST['phone'];
$celular = $_POST['celular'];
$celular2 = $_POST['celular2'];
$celular3 = $_POST['celular3'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$referencia = $_POST['referencia'];
$observacao = $_POST['observacao'];

      try {
         $conn = Conexao::getInstace();

         $sql = "insert into tb_cliente (nome, email, telefone, celular, celular2, celular3, endereco, dt_cadastro,
         bairro, cidade, estado, cep, referencia, observacao, cpf_cnpj) values ('{$nome}', '{$email}', '{$telefone}', '{$celular}', '{$celular2}',
         '{$celular3}', '{$endereco}', now(), '{$bairro}', '{$cidade}', '{$estado}', '{$cep}', '{$referencia}', '{$observacao}', '{$cpf_cnpj}' );";

         $q = mysqli_query($conn, $sql);

          if($q){
            echo "cadastro realizado com sucesso!";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastrarCliente.php'>";
         }
      } catch (Exception $e) {
         die($e);
      }

   
?>