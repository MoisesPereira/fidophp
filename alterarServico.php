<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('Conexao.class.php');
require('./WideImage/lib/WideImage.php');

$id = isset($_POST['id_servico']) ? $_POST['id_servico'] : '';
$nome = isset($_POST['fname']) ? $_POST['fname'] : '';

$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$valor = str_replace(',','.',str_replace('.','',$valor));
$forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';
$dt_entrega = isset($_POST['data_entrega']) ? $_POST['data_entrega'] : '';
if($dt_entrega != ''){$dt_entrega = explode('/', $dt_entrega); $dt_entrega = $dt_entrega[2].'-'.$dt_entrega[1].'-'.$dt_entrega[0];}
$tp_servico = isset($_POST['tp_servico']) ? $_POST['tp_servico'] : '';
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';
$gasto1 = isset($_POST['gasto1']) ? $_POST['gasto1'] : '';
$valor1 = isset($_POST['valor1']) ? $_POST['valor1'] : '';
$gasto2 = isset($_POST['gasto2']) ? $_POST['gasto2'] : '';
$valor2 = isset($_POST['valor2']) ? $_POST['valor2'] : '';
$gasto3 = isset($_POST['gasto3']) ? $_POST['gasto3'] : '';
$valor3 = isset($_POST['valor3']) ? $_POST['valor3'] : '';
$gasto4 = isset($_POST['gasto4']) ? $_POST['gasto4'] : '';
$valor4 = isset($_POST['valor4']) ? $_POST['valor4'] : '';
$gasto5 = isset($_POST['gasto5']) ? $_POST['gasto5'] : '';
$valor5 = isset($_POST['valor5']) ? $_POST['valor5'] : '';

$sql = "update tb_servico
         set
         funcionario = {$funcionario},
         valor = '{$valor}',
         forma_pagamento = {$forma_pagamento},
         concluido = {$concluido},
         dt_entrega = '{$dt_entrega}',
         tipo_servico = {$tp_servico},
         observacao = '{$observacao}',
         gasto1 = '{$gasto1}',
         valor1 = '{$valor1}',
         gasto2 = '{$gasto2}',
         valor2 = '{$valor2}',
         gasto3 = '{$gasto3}',
         valor3 = '{$valor3}',
         gasto4 = '{$gasto4}',
         valor4 = '{$valor4}',
         gasto5 = '{$gasto5}',
         valor5 = '{$valor5}'        
         where id_servico = {$id};";


$conn = Conexao::getInstace();
$q = mysqli_query($conn, $sql);

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

         $sqlImg = "insert into tb_imagem (descricao, dt_cadastro, tb_servico_id_servico) values ('{$new_name}', now(), '{$id}');";

            try {

               $qImg = mysqli_query($conn, $sqlImg);

               //var_dump($sqlImg);
               //die('55');

               if($qImg){
                  echo "cadastro realizado com sucesso!";
                  echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=detalhesServico.php?id={$id}'>";
               }
               
            } catch (Exception $e) {
               
               print_r($e);
            }
            
         } 

      }
   }     

   if($q){
      echo "Alteração realizada com sucesso!";
      echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=detalhesServico.php?id={$id}'>";
   }

?>