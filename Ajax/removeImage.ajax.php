<?php
require('../Conexao.class.php');

$desc_img = $_GET['img'];

$conn = Conexao::getInstace();

$query = "delete from tb_imagem where descricao = '{$desc_img}'";

$q = mysqli_query($conn, $query);

if($q){
	echo "Removido com sucesso!";
}else{
	echo "Ocorreu algum problema para remover a imagem!";
}
