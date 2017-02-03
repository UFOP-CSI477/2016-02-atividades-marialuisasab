<h1> Lista de Exames </h1>



<table>
  <tr>
    <th>Código</th>
    <th>Procedimento</th>
    <th>Data prevista</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>
  <?php foreach ($exames as $e): ?>

    <tr>
      <td><?= $e['Exame']['id']; ?></td>
      <td><?= $e['Procedimento']['nome']; ?></td>
      <td><?= $e['Exame']['data'];?></td>
      <td><?= $this->Html->link("Editar",array('controller' => 'procedimentos', 'action' => 'edit', $e['Procedimento']['id'])); ?></td>
      <td><?= $this->Html->link("Excluir",array('controller' => 'procedimentos', 'action' => 'delete', $e['Procedimento']['id'])); ?></td>

    </tr>

  <?php endforeach;?>


</table>
