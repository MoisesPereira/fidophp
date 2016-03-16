<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('Conexao.class.php');
require('./WideImage/lib/WideImage.php');
$data_entrada = isset($_POST['data-entrada']) ? $_POST['data-entrada'] : '';
if($data_entrada != ''){$data_entrada = explode('/', $data_entrada); $data_entrada = $data_entrada[2].'-'.$data_entrada[1].'-'.$data_entrada[0];}

$id = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : '';
$nome = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['phone']) ? $_POST['phone'] : '';
$tp_servico = ($_POST['tp_servico'] == '') ? 8 : $_POST['tp_servico'];
$funcionario = ($_POST['funcionario'] == '') ? 5 : $_POST['funcionario'];
$forma_pagamento = ($_POST['forma_pagamento'] == '') ? 6 : $_POST['forma_pagamento'];
$valor = ($_POST['valor'] == '') ? 0 : $_POST['valor'];
$valor = str_replace(',','.',str_replace('.','',$valor));
$concluido = ($_POST['concluido'] == '') ? 0 : $_POST['concluido'];
$dt_entrega = isset($_POST['data-entrega']) ? $_POST['data-entrega'] : '';
$gasto1 = isset($_POST['gasto1']) ? $_POST['gasto1'] : '';
$valor1 = ($_POST['valor1'] == '') ? 0 : $_POST['valor1'];
$gasto2 = isset($_POST['gasto2']) ? $_POST['gasto2'] : '';
$valor2 = ($_POST['valor2'] == '') ? 0 : $_POST['valor2'];
$gasto3 = isset($_POST['gasto3']) ? $_POST['gasto3'] : '';
$valor3 = ($_POST['valor3'] == '') ? 0 : $_POST['valor3'];
$gasto4 = isset($_POST['gasto4']) ? $_POST['gasto4'] : '';
$valor4 = ($_POST['valor4'] == '') ? 0 : $_POST['valor4'];
$gasto5 = isset($_POST['gasto5']) ? $_POST['gasto5'] : '';
$valor5 = ($_POST['valor5'] == '') ? 0 : $_POST['valor5'];
$observacao = isset($_POST['message']) ? $_POST['message'] : '';

$conn = Conexao::getInstace();
$sql = "insert into tb_servico (tipo_servico, funcionario, valor, forma_pagamento, concluido, dt_cadastro,
         tb_cliente_id_cliente, dt_entrega, observacao, gasto1, valor1, gasto2, valor2, gasto3, valor3, 
         gasto4, valor4, gasto5, valor5) 
      values 
         ('{$tp_servico}', '{$funcionario}', '{$valor}', '{$forma_pagamento}', '{$concluido}', '{$data_entrada}', '{$id}',
            '{$dt_entrega}', '{$observacao}', '{$gasto1}', '{$valor1}', '{$gasto2}', '{$valor2}', 
            '{$gasto3}', '{$valor3}', '{$gasto4}', '{$valor4}', '{$gasto5}', '{$valor5}');";

$q = mysqli_query($conn, $sql);

// Este metodo pega o id do Serviço para cadastrar na tabela de imagens
$returnId = mysqli_insert_id($conn);

//var_dump($sql);
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
            try {

               $qImg = mysqli_query($conn, $sqlImg);

               //var_dump($sqlImg);
               //die('55');

               if($qImg){
                  echo "cadastro realizado com sucesso!";
                  echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=detalhesServico.php?id={$returnId}'>";
               }
               
            } catch (Exception $e) {
               
               print_r($e);
            }
            
         } 

      }
}    

echo "cadastro realizado com sucesso!";
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=detalhesServico.php?id={$returnId}'>"  

?>