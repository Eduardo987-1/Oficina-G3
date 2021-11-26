<?php require_once 'header.php' ?>
	
	
	<h1>Página de login</h1>

	<form action="actions.php?class_name=Login&action=index&tabela=usuarios&redirect=servico.php" method="POST">
		Email: <input type="email" name="email"> <br>
		Senha: <input type="password" name="senha"> <br>
		<input type="hidden" name="origin" value="login.php">
		<button type="submit" name="btn-logar">Entrar</button>
	</form>

	<p>Você precisa estar cadastrado para fazer login caso você não seja cadastrado clique <a href="cadastro.php">aqui</a></p>


<?php include_once 'footer.php' ?>