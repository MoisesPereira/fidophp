<?php
require('header.php');
require('Conexao.class.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre Cliente</legend>
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

          <p id="submit-cliente" class="btn btn-default">Submit</p>
        </form>

        </div>
        </div>
    </div>

    <table border="1" id="rstable" class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Escolha o Cliente</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<script>
//Chama o ajax que retorna os clientes
$('#submit-cliente').click(function(event) {
    //alert('11');

    var nome = $('#nome').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();

    $.ajax({
        url: 'http://fidophp.com.br/getClientes.ajax.php?nome='+nome+'&email='+email+'&telefone='+telefone,
        success: function(response){

            console.log('retorno cliente: ', response);

            var parse = JSON.parse(response);
            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {
                var table = "<tr><td>" + parse[i].nome + "</td>";
                table += "<td>" + parse[i].email + "</td>"; 
                table += "<td>" + parse[i].telefone + "</td>";  
                table += "<td><a href='/listagemServicos.php?id=" + parse[i].id_cliente + "&nome="+
                     parse[i].nome + "'>Selecionar</a></td></tr>";  

                $('#rstable tbody').append(table);
            };

        },
        error: function( response ) {
            console.log( 'Deu merda', response ); 
        }
    });
    
});
</script>

</body>
</html>