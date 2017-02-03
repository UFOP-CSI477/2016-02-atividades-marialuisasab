<h1>Solicitar Exames</h1>

<?php

echo $this->Form->create('Exame');

echo $this->Form->hidden('paciente_id', array('value'=>$paciente));

echo $this->Form->input('procedimento_id');

echo $this->Form->date('data');

echo $this->Form->end('Salvar');


 ?>
