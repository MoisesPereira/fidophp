<?php
//header('Content-Type: charset=uft-8');

$nome = utf8_decode($_POST['fname']);
$email = utf8_decode($_POST['email']);
$telefone = utf8_decode($_POST['phone']);
$mensagem = utf8_decode($_POST['message']);

//print_r();


$conn = mysqli_connect('localhost', 'root', '', 'fidophp');

$sql = "insert into tb_cadastro (nome, telefone, email, mensagem) values ('{$nome}', '{$telefone}', '{$email}', '{$mensagem}');";

$q = mysqli_query($conn, $sql);



if($q){
	echo "cadastro realizado com sucesso!";

	echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastrar.php'>";


}

?>

