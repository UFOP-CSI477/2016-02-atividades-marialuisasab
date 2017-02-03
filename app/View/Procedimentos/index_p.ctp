<h1> Visualizar Procedimentos </h1>




<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <th>Preço </th>
    <th>Tipo de usuário</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>
  <?php foreach ($procedimentos as $e): ?>

    <tr>
      <td><?= $e['Procedimento']['id']; ?></td>
      <td><?= $this->Html->link($e['Procedimento']['nome'], array('controller'=> 'procedimentos', 'action'=>'view'));?></td>
      <td><?= $e['Procedimento']['preco'];?></td>
      <td><?= $e['Procedimento']['usuario_id'];?></td>
      <td><?= $this->Html->link("Editar",array('controller' => 'procedimentos', 'action' => 'edit', $e['Procedimento']['id'])); ?></td>
      <td><?= $this->Html->link("Excluir",array('controller' => 'procedimentos', 'action' => 'delete', $e['Procedimento']['id'])); ?></td>

    </tr>
  <?php endforeach;?>
</table>
