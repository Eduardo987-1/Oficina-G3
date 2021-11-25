<?php include_once 'header.php' ?>
<div class="container">
	<div class="row">
		<div style="height: 200px;" 
			 class="col-md-6 offset-md-3">
             <br><br><br><br>
					<h1 class="text-center">Página de Cadastro</h1>

					<form action="" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                        </div>
					<div class="mb-3">
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">   
                </div>
					<div class="mb-3">
					<input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					</form>
	</div>
</div>


<?php include_once 'footer.php' ?>