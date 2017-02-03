<section id="intro" class="intro-section">
    <div class="container">
        <div class="row">

          <?= $this->Html->link("Logout", array('controller' => 'usuarios','action' => 'logout')); ?>
            <div class="col-lg-12">
                <h1> Procedimentos </h1>
                <?= $this->Html->link("Listar Procedimentos", array('controller' => 'procedimentos','action' => 'index_p'), array('class'=>'btn btn-default')); ?>
                <?= $this->Html->link("Cadastrar Procedimento", array('controller' => 'procedimentos','action' => 'add'), array('class'=>'btn btn-default')); ?>
            </div>

            <div class="col-lg-12">
                <h1> Pacientes </h1>
                <?= $this->Html->link("Listar Pacientes", array('controller' => 'pacientes','action' => 'index'), array('class'=>'btn btn-default')); ?>
                <?= $this->Html->link("Cadastrar Paciente", array('controller' => 'pacientes','action' => 'add'), array('class'=>'btn btn-default')); ?>
            </div>
            <div class="col-lg-12">
                <h1> Usuários </h1>
                <?= $this->Html->link("Editar dados pessoais", array('controller' => 'usuarios','action' => 'edit'), array('class'=>'btn btn-default')); ?>
                <?= $this->Html->link("Cadastrar Usuário", array('controller' => 'usuarios','action' => 'add'), array('class'=>'btn btn-default')); ?>
                <?= $this->Html->link("Listar Usuarios", array('controller' => 'usuarios','action' => 'index'), array('class'=>'btn btn-default')); ?>

            </div>
            <div class="col-lg-12">
                <h1> Exames </h1>
                <?= $this->Html->link("Listar Exames", array('controller' => 'exames','action' => 'index_e'), array('class'=>'btn btn-default')); ?>
                <?= $this->Html->link("RELATÓRIO GERAL", array('controller' => 'exames','action' => 'relatorioGeral'), array('class'=>'btn btn-default')); ?>

            </div>
        </div>
    </div>
</section>
