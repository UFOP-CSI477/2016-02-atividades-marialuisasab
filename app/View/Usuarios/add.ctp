<h1>Adicionar Usuário</h1>

<?php

echo $this->Form->create('Usuario');

echo $this->Form->input('nome');

echo $this->Form->input('login');

echo $this->Form->input('senha');

echo $this->Form->input('tipo');

echo $this->Form->input('id');

echo $this->Form->end('Salvar');


 ?>
