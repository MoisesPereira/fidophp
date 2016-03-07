<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('Conexao.class.php');
require('./WideImage/lib/WideImage.php');

$id = $_POST['id_cliente'];
$nome = $_POST['nome_cliente'];
$email = $_POST['email'];
$telefone = $_POST['phone'];
$tp_servico = $_POST['tp_servico'];
$funcionario = $_POST['funcionario'];
$valor = $_POST['valor'];
$forma_pagamento = $_POST['forma_pagamento'];
$concluido = $_POST['concluido'];
$dt_entrega = $_POST['data-entrega'];
$observacao = $_POST['message'];

$conn = Conexao::getInstace();
$sql = "insert into tb_servico (tipo_servico, funcionario, valor, forma_pagamento, concluido, dt_cadastro,
   tb_cliente_id_cliente, dt_entrega, observacao) values ('{$tp_servico}', '{$funcionario}', '{$valor}', 
   '{$forma_pagamento}', '{$concluido}', now(), '{$id}', '{$dt_entrega}', '{$observacao}');";

$q = mysqli_query($conn, $sql);

// Este metodo pega o id do Serviço para cadastrar na tabela de imagens
$returnId = mysqli_insert_id($conn);

//var_dump($returnId);
//exit;

   if(isset($_FILES['imagem']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $name = $_FILES['imagem']['name']; // Atribui um array com os nomes dos arquivos à variavel

      $tmp_name = $_FILES['imagem']['tmp_name']; // Atribui um array com os nomes temporarios


      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); // Extensões permitidas

      $dir = 'uploads/'; //Diretório para uploads

      for($i = 0; $i < count($tmp_name); $i++){

         $ext = strtolower(substr($name[$i],-4));

         if(in_array($ext, $allowedExts)){ // Verifica se a extensão é permitida

            $new_name = date("Y.m.d-H.i.s") . "-" . $i . $ext;

            $image = WideImage::load($tmp_name[$i]);  //Carrega imagem utilizando o WideImage

            $image = $image->resize(800, 600, 'outside'); //Redimensiona a imagem para 170 width e 180 height, mantendo a proporção original

            $image = $image->crop('center', 'center', 800, 600); //Corta a imagem do centro forçando sua altura e largura

            $image->saveToFile($dir.$new_name); //Salva a imagem

         $sqlImg = "insert into tb_imagem (descricao, dt_cadastro, tb_servico_id_servico) values ('{$new_name}', now(), '{$returnId}');";

            //$conn = mysqli_connect('localhost', 'root', '', 'fidophp');
            $qImg = mysqli_query($conn, $sqlImg);

            if($qImg){
               echo "cadastro realizado com sucesso!";
               echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastrar.php'>";
            }
         } 

      }
}      

?>