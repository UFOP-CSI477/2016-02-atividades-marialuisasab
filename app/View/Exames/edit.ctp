<h1>Solicitar Exames</h1>

<?php

echo $this->Form->create('Exame');

echo $this->Form->input('id');

echo $this->Form->input('paciente_id');

echo $this->Form->input('procedimento_id');

echo $this->Form->date('data');

echo $this->Form->input('paciente_id',$pacientes);

echo $this->Form->end('Salvar');

?>
