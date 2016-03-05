<?php
require('header.php');
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="well well-sm">

					<fieldset>
						<legend class="text-center header">Listagem dos Clientes</legend>

					</fieldset>
				</div>

				<table border="1" class="table table-hover">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Telefone</th>
							<th>Observações</th>
						</tr>
					</thead>
					<tbody>

						<?php

						include('Conexao.class.php');
						$conn = Conexao::getInstace();
					
						$query = "SELECT * FROM tb_cliente";
						$q = mysqli_query($conn, $query);


						while($t = mysqli_fetch_array($q)){
							//var_dump(($t[1]));
							echo "<tr>";
							echo "<td>$t[1]</td>";
							echo "<td>$t[2]</td>";
							echo "<td>$t[3]</td>";
							$tam = strlen($t[4]);
							$max = 50;
							$texto = substr_replace($t[4], "...", $max, $tam - $max);
							echo "<td><a href='/detalhes.php/?id={$t[0]}'>{$texto}</a></td>";
							echo "</tr>";

						}

						?>


					</tbody>
				</table>
			</div>

		</body>

		</html>

