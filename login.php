<?php include_once 'header.php' ?>
<br><br><br><br>
<div class="container">
	<div class="row">
		<div style="height: 200px;" 
			 class="col-md-6 offset-md-3">
					<h1 class="text-center">Página de login</h1>

					<form action="actions.php?class_name=Login&action=index&tabela=usuarios&redirect=servico.php" method="POST">
					<div class="mb-3">
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
					</div>
					<div class="mb-3">
					<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
					</div>
					<input type="hidden" name="origin" value="login.php">
					<button type="submit" name="btn-logar" class="btn btn-primary">Login</button>
					</form>
					<p>Você precisa estar cadastrado para fazer login caso você não seja cadastrado clique <a href="cadastro.php">Aqui</a></p></div>
	</div>
</div>
<br><br><br><br><br><br><br><br><br><br>

		
		   
	 








   
	
 

		
	



<?php include_once 'footer.php' ?>