<?php
require('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre o Clientes</legend>
        </fieldset>

        <form class="form-inline" action="#" method="post" role="form">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telefone">Tel:</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
          </div>  

          <div class="form-group">
            <label for="data-ini">Data-Ini:</label>
            <input type="text" class="form-control" id="data-ini" name="data-ini">
          </div>  

          <div class="form-group">
            <label for="data-fim">Data-Ini:</label>
            <input type="text" class="form-control" id="data-fim" name="data-fim">
          </div>  

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </div>
        </div>
    </div>


<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

if( isset($nome) || isset($email) || isset($telefone) ){

$qnome = ($nome != '')  ? "and nome like '%{$nome}%' " : '';
$qemail = ($email != '') ? "and email like '%{$email}%' " : '';
$qtelefone = ($telefone != '') ? "and telefone like '%{$telefone}%' " : '';

$queryN = "select * from tb_cliente where 1 = 1 {$qnome} {$qemail} {$qtelefone} ";

    ?>
    <table border="1" class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Escolha o Cliente</th>
        </tr>
        </thead>
        <tbody>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'Fido');

    var_dump($queryN);
    $q = mysqli_query($conn, $queryN);

    while($t = mysqli_fetch_array($q)){
        echo "<tr>";
        echo "<td>$t[1]</td>";
        echo "<td>$t[2]</td>";
        echo "<td>$t[3]</td>";
        echo "<td><a href='/detalhes.php/?id={$t[0]}'>Selecionar</a></td>";
        echo "</tr>";
    }

?>

        </tbody>
    </table>
<?php    
}
?>
          
</div>
</body>
</html>