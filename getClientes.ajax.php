<?php
require('Conexao.class.php');

$nome = $_GET['nome'];
$email = $_GET['email'];
$telefone = $_GET['telefone'];

get($nome, $email, $telefone);

function get($nome, $email, $telefone){

	$conn = Conexao::getInstace();

	$qnome = ($nome != '')  ? "and nome like '%{$nome}%' " : '';
	$qemail = ($email != '') ? "and email like '%{$email}%' " : '';
	$qtelefone = ($telefone != '') ? "and telefone like '%{$telefone}%' " : '';

	$query = "select * from tb_cliente where 1 = 1 {$qnome} {$qemail} {$qtelefone}";
    $q = mysqli_query($conn, $query);

    $dados = array();
    $i = 0;

    while($t = mysqli_fetch_assoc($q)){

        $dados[$i] = $t;
        $i ++;
    }

    print_r(json_encode($dados));

}