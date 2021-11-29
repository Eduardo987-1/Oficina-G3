<?php include_once 'header.php' ?>
<div class="container">
	<div class="row">
		<div style="height: 200px;"class="col-md-6 offset-md-3">
             <br><br><br><br>
					<!-- ALERTS -->
					<?php include_once 'alerts.php' ?>
					<!-- /ALERTS -->

					<h1 class="text-center">Página de Cadastro</h1>

					<form action="actions.php?class_name=Insert&action=index&tabela=usuarios&redirect=login.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="nome" class="form-control" placeholder="Nome completo" aria-label="Nome completo">
                        </div>
					<div class="mb-3">
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
                </div>
					<div class="mb-3">
					<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
					</div>
                    <input type="hidden" name="origin" value="cadastro.php">
					<button type="submit" class="btn btn-primary">Cadastrar</button>
					</form>
	</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<?php include_once 'footer.php' ?>