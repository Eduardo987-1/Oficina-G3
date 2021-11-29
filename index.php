<?php include_once 'header.php' ?>

<?php 
  include_once 'actions/Comentario.php';
  $comentario = new Comentario();
  $resultado = $comentario->getComentario();
 ?>
          <section>
         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://www.mte-thomson.com.br/wp-content/uploads/2021/07/Manutencao_Preventiva-2.jpg" class="d-block w-100" style="object-fit: cover;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Oficina especializada</h5>
                  <p>Agende serviços de reparação automotiva com segurança e qualidade.
Afinal, o seu carro merece ser cuidado por profissionais qualificados e recomendados!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://www.industriahoje.com.br/wp-content/uploads/2016/06/manuten%C3%A7%C3%A3o-de-moto.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Contamos com uma equipe altamente qualificada e equipamentos de ponta para cuidar dos reparos do seu veículo.</h5>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <!-- ALERTS -->
            <?php include_once 'alerts.php' ?>
          <!-- /ALERTS -->
    <section>
      <div class="container" id="servicos">
        <div class="row">
          <div class="col-12 text-center"><h1><Strong>Serviços</Strong></h1>
            <br>
          </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="https://cdn.autopapo.com.br/box/uploads/2018/12/06144839/troca-de-oleo-motor-carro-shutterstock.jpg" class="card-img-top img-fluid" alt="...">
                    
                    <div class="card-body text-center">
                        <h5 class="card-title">Troca de Óleo</h5>
                        <p class="card-text">A viscosidade do óleo evita o atrito entre as peças, sem o desgaste no sistema mecânico.</p><br>
                        
                        <a href="login.php" class="btn btn-primary">Clique aqui</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
              <div class="card">
                  <img src="https://quatrorodas.abril.com.br/wp-content/uploads/2018/12/MKIV8963cc.psd_.jpg?quality=70&strip=i" class="card-img-top" alt="...">
                  
                  <div class="card-body text-center">
                      <h5 class="card-title">Alinhamento</h5>
                      <p class="card-text">A falta de alinhamento, ou o alinhamento parcial causa desgaste irregular dos pneus e deixam o volante torto.</p>
                      
                      <a href="login.php" class="btn btn-primary">Clique aqui</a>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card">
                <img src="https://blog.nakata.com.br/wp-content/uploads/2018/11/251606-tarefa-para-3010-ate-17h-como-identificar-um-servico-mecanico-de-qualidade-768x513.jpg" class="card-img-top" alt="...">
                
                <div class="card-body text-center">
                    <h5 class="card-title">Serviços Gerais</h5>
                    <p class="card-text">A manutenção preventiva do veículo diminui os riscos de ficar parado, quebrado no trânsito ou na estrada.</p>
                    
                    <a href="login.php" class="btn btn-primary">Clique aqui</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card">
              <img src="https://cdn.shopify.com/s/files/1/2617/8854/articles/funilaria_e_pintura_3500x.jpg?v=1586978323" class="card-img-top" alt="...">
              
              <div class="card-body text-center">
                  <h5 class="card-title">Pintura Funilaria</h5>
                  <p class="card-text">A oficina de funilaria e pintura conta com uma ampla estrutura para atender as demandas com rapidez e competência.</p>
                  
                  <a href="login.php" class="btn btn-primary">Clique aqui</a>
              </div>
          </div>
      </div>
        </div>
      </div>
      
     </section>
     <br>
     <section style="height: 70vh;" id="comentarios">
       <!--COMENTARIOS AQUI-->
       <div class="container" >
        <div class="row">
          <h1 class="text-center"><strong>Comentários</strong></h1>
          <div class="col">
            <form action="actions.php?class_name=Comentario&action=index&tabela=comentario&redirect=index.php" method="POST"> 
            Nome: <input type="text" name="nome" class="form-control" placeholder="Nome completo">
            Comentário:<input type="text" name="comentario" class="form-control" placeholder="Seu comentário">
            <input type="hidden" name="data" value="<?= date("Y-m-d H:i:s");  ?>">
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
        </div>
        <div class="col">
          <?php foreach ($resultado as $key => $value): ?>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1"><?= $value['nome']; ?></h5>
                  <small><?= $value['data']; ?></small>
                </div>
                <p class="mb-1"><?= $value['comentario']; ?></p>
              </a>
          <?php endforeach; ?>
        </div>
        </div>
          
          
        </div>
       </section>
       <section>
         <!--Endereço-->
         <div class="container" id="endereco">
          <div class="row">
            <h1 class="text-center"><strong>Endereço</strong></h1>
            <br>
            <div class="col">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.1990545136678!2d-38.57710688592992!3d-3.7668161444221475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7c74c01797285bb%3A0xa8888be05f940563!2sCentro%20Universit%C3%A1rio%20Est%C3%A1cio%20-%20Campus%20Parangaba!5e0!3m2!1spt-BR!2sbr!4v1636395402645!5m2!1spt-BR!2sbr" 
              width="460" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col">
          <p style="font-size: 19px;"><i class="fas fa-home me-3"></i>Av. Senador Fernandes Távora, 137 - Jóquei Clube, Fortaleza - CE, 60510-111</p>
          <p style="font-size: 19px;" >
            <i class="fas fa-envelope me-3"></i>
            estacio@estacio.com.br
          </p>
          <p style="font-size: 19px;"><i class="fas fa-phone me-3"></i>0800 880 6767</p>
            </div>
         </div>
          </div>
       </section>
       <br><br>
       <section id="grupo">
        <div class="container">
          <h1 class="text-center"><strong>Equipe</strong></h1>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <img src="jonas2.jpg" class="rounded" alt="..." width="300" height="300">
                <h4 class="text-center">Carlos Jonas</h4>
              </div>
              </div>
            <div class="col">
              <div class="text-center">
                <img src="milton.jpg" class="rounded" alt="..." width="300" height="300">
                <h4 class="text-center">Milton Paiva</h4>
              </div>
            </div>
            <div class="col">
              <div class="text-center">
                <img src="edu.jpg" class="rounded" alt="..." width="300" height="300">
                <h4 class="text-center">Eduardo Sousa</h4>
              </div>
            </div>
          </div>
        </div>
        
       </section>
       
<?php include_once 'footer.php' ?>