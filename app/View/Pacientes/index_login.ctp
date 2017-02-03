<h1>Acesso ao Sistema - Paciente</h1>

<?= $this->Html->link("Cadastre-se", array('controller' => 'pacientes','action' => 'add')); ?>


<?php
  echo $this->Form->create('Paciente', array('controller'=>'pacientes', 'url'=>'login'));
  echo $this->Form->input('login');
  echo $this->Form->password('senha');

  echo $this->Form->end('Acessar');
