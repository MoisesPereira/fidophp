<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>First App FidoPHP</title>

	<style>
	    .header {
	        color: #36A0FF;
	        font-size: 27px;
	        padding: 10px;
	    }

	    .bigicon {
	        font-size: 35px;
	        color: #36A0FF;
	    }
	</style>




	  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
	integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



	  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
    	dateFormat: "dd/mm/yy",
    	dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    	dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    	monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
    		'Outubro','Novembro','Dezembro'],
	    monthNamesShort: [
		    'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
		    'Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'
    });
  });
  </script>

</head>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active"><a href="index.php">Home</a></li>
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Clientes
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="index.php">Listar</a></li>
		      <li><a href="cadastrar.php">Cadastrar</a></li>
		    </ul>
		</li>
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Serviços
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="#">Listar</a></li>
		      <li><a href="#">Cadastrar</a></li>
		    </ul>
		</li>
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Retornos
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="#">Listar</a></li>
		      <li><a href="#">Cadastrar</a></li>
		    </ul>
		</li>
		<li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios
		    <span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="#">Mensal</a></li>
		      <li><a href="#">Data</a></li>
		      <li><a href="#">Serviço</a></li>
		      <li><a href="#">Valor</a></li>
		    </ul>
		</li>
	</ul>
</div>


<body>