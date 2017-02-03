<!--<span class="notice success">
	<?= $this->Html->link("Procedimentos", array('controller'=>'procedimentos', 'action'=>'index')); ?>
</span>

<span class="notice success">
	<?= $this->Html->link("Pacientes", array('controller'=>'pacientes', 'action'=>'index')); ?>
</span>


<span class="notice success">
	<?= $this->Html->link("Exames", array('controller'=>'exames', 'action'=>'index')); ?>
</span>

-->

<!--botao sair-->

<!--<?= $this->Html->link("sair", array('controller' => 'usuarios','action' => 'logout')); ?>-->




    <!-- Intro Section -->
    <section id="intro" class="intro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
										<h1>Seja Bem-Vindo </h1>
                    <h2>Cadastre-se e solicite seus exames online</h2>
										<?= $this->Html->link("Procedimentos disponíveis", array('controller' => 'procedimentos','action' => 'index_p'), array('class'=>'btn btn-default')); ?>
                    <?= $this->Html->link("Registre-se", array('controller' => 'pacientes','action' => 'add'), array('class'=>'btn btn-default')); ?>
                </div>
            </div>
        </div>
    </section>
