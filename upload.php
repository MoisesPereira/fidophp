<?php
require('Conexao.class.php');

$nome = $_POST['fname'];
$email = $_POST['email'];
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

/*require('./WideImage/lib/WideImage.php');

$nome = utf8_decode($_POST['fname']);
$email = utf8_decode($_POST['email']);
$telefone = utf8_decode($_POST['phone']);
$mensagem = utf8_decode($_POST['message']);

$conn = mysqli_connect('localhost', 'root', '', 'fidophp');
$sql = "insert into tb_cadastro (nome, telefone, email, mensagem) values ('{$nome}', '{$telefone}', '{$email}', '{$mensagem}');";

$q = mysqli_query($conn, $sql);

$retornoClientId = 2;

   if(isset($_FILES['imagem']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $name = $_FILES['imagem']['name']; // Atribui um array com os nomes dos arquivos à variavel

      $tmp_name = $_FILES['imagem']['tmp_name']; // Atribui um array com os nomes temporarios


      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); // Extensões permitidas

      $dir = './uploads/'; //Diretório para uploads

      for($i = 0; $i < count($tmp_name); $i++){

         $ext = strtolower(substr($name[$i],-4));

         if(in_array($ext, $allowedExts)){ // Verifica se a extensão é permitida

            $new_name = date("Y.m.d-H.i.s") . "-" . $i . $ext;

            $image = WideImage::load($tmp_name[$i]);  //Carrega imagem utilizando o WideImage

            $image = $image->resize(800, 600, 'outside'); //Redimensiona a imagem para 170 width e 180 height, mantendo a proporção original

            $image = $image->crop('center', 'center', 800, 600); //Corta a imagem do centro forçando sua altura e largura

            $image->saveToFile($dir.$new_name); //Salva a imagem

   $sqlImg = "insert into tb_imagens (id_cadastrofk, descricao) values ({$retornoClientId}, '{$new_name}');";

            //$conn = mysqli_connect('localhost', 'root', '', 'fidophp');
            $qImg = mysqli_query($conn, $sqlImg);

            if($qImg){
               echo "cadastro realizado com sucesso!";
               echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastrar.php'>";
            }
         } 

      }

*/

      try {
         $conn = Conexao::getInstace();

         $sql = "insert into tb_cliente (nome, email, telefone, celular, celular2, celular3, endereco, dt_cadastro,
         bairro, cidade, estado, cep, referencia, observacao) values ('{$nome}', '{$email}', '{$telefone}', '{$celular}', '{$celular2}',
         '{$celular3}', '{$endereco}', now(), '{$bairro}', '{$cidade}', '{$estado}', '{$cep}', '{$referencia}', '{$observacao}' );";

         $q = mysqli_query($conn, $sql);

          if($q){
            echo "cadastro realizado com sucesso!";
            echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastrar.php'>";
         }
      } catch (Exception $e) {
         die($e);
      }

   
?>