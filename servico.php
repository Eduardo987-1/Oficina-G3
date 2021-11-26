<?php include_once 'header.php'; ?>

<?php 
	include_once 'actions/Login.php';
	$login = new Login();
	$resultado = $login->checkLogin();


	/*print_r($_SESSION);
	exit;*/
?>
<h1> Serviços </h1>

<p>Escolha aqui o serviço que você deseja para o seu carro</p>

<form action="actions.php?class_name=Insert&action=insertOrError&tabela=agendamento&redirect=servico.php" method="POST">
	Data: <input type="date" name="data"> <br>
	Serviço: 
	<select name="servico">
		<option value="troca_de_oleo">Troca de Óleo</option>
		<option value="alinhamento">Alinhamento</option>
		<option value="servico_geral">Serviços Gerais </option>
		<option value="pintura_funilaria">Pintura Funilaria</option>	
	</select>	<br>
	<input type="hidden" name="origin" value="servico.php">
	<input type="hidden" name="usuario" value="<?= $resultado['id']; ?> ">
	<button type="submit">Enviar</button>
</form>

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

<?php include_once 'footer.php' ?>