

 <!-- Intro Section -->
  <section id="intro" class="intro-section">
      <div class="container">
          <div class="row">
            <?= $this->Html->link("Logout", array('controller' => 'pacientes','action' => 'logout')); ?>

              <div class="col-lg-12">
                  <h1> Exames </h1>
                  <?= $this->Html->link("Visualizar Exames", array('controller' => 'exames','action' => 'index_e'), array('class'=>'btn btn-default')); ?>

                  <?= $this->Html->link("Solicitar Exame", array('controller' => 'exames','action' => 'add_e'), array('class'=>'btn btn-default')); ?>
              </div>
              
          </div>
      </div>
  </section>
