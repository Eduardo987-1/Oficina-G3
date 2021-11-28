<?php include_once 'header.php'; ?>

<?php 
	include_once 'actions/Login.php';
	$login = new Login();
	$resultado = $login->checkLogin();


	/*print_r($_SESSION);
	exit;*/
?>
<br><br><br><br>
<h1 class="text-center"> Serviços </h1>

<h5 class="text-center">Escolha aqui o serviço que você deseja para o seu veiculo</h5>
<div class="container">
	<div class="row">
	  <div style="height: 200px;" 
			 class="col-md-6 offset-md-3">
		<form action="actions.php?class_name=Insert&action=insertOrError&tabela=agendamento&redirect=servico.php" method="POST">
			Data:<div class="form-outline datepicker" data-mdb-inline="true">
				<input type="date" class="form-control" id="exampleDatepicker2">
			  </div>
			Serviço:
			<select class="form-select" aria-label="Default select example" name="servico">
				<option selected>Selecione um serviço</option>
				<option value="troca_de_oleo">Troca de Óleo</option>
				<option value="alinhamento">Alinhamento</option>
				<option value="servico_geral">Serviços Gerais</option>
				<option value="pintura_funilaria">Pintura Funilaria</option>
			  </select> 
				<br>
			<input type="hidden" name="origin" value="servico.php">
			<input type="hidden" name="usuario" value="<?= $resultado['id']; ?> ">
			<button type="submit">Enviar</button>
		</form>
	</div>
	</div>
  </div>

<?php if (isset($_SESSION['mensagem'])): ?>
	<div class="alert alert-success" role="alert">
  		<?= $_SESSION['mensagem']; ?>
	</div>
<?php endif ?>

<?php if (isset($_SESSION['mensagem_erro'])): ?>	
 	<div class="alert alert-danger" role="alert">
  		<?= $_SESSION['mensagem_erro']; ?>
	</div>
<?php endif ?>
<br><br><br><br><br><br>

<?php include_once 'footer.php' ?>