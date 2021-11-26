<?php include_once 'header.php' ?>

<h1> Serviços </h1>

<p>Escolha aqui o serviço que você deseja para o seu carro</p>

<form action="actions.php?class_name=Servico&action=index&tabela=agendamento&redirect=servico.php" method="POST">
	Data: <input type="date" name="data"> <br>
	Serviço: 
	<select>
		<option value="troca_de_oleo">Troca de Óleo</option>
		<option value="alinhamento">Alinhamento</option>
		<option value="servico_geral">Serviços Gerais </option>
		<option value="pintura_funilaria">Pintura Funilaria</option>	
	</select>	<br>
	<input type="hidden" name="origin" value="servico.php">
	<button type="submit" name="btn-servico">Enviar</button>
</form>


<?php include_once 'footer.php' ?>