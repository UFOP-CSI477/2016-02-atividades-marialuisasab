<h1> Visualizar Pacientes </h1>


<table>
  <tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Login </th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>

  <?php foreach ($pacientes as $e): ?>
    <tr>
      <td><?= $e['Paciente']['id']; ?></td>
      <td><?= $e['Paciente']['nome'];?></td>
      <td><?= $e['Paciente']['login'];?></td>
      <td><?= $this->Html->link("Editar",array('controller' => 'pacientes', 'action' => 'edit', $e['Paciente']['id'])); ?></td>
      <td><?= $this->Html->link("Excluir",array('controller' => 'pacientes', 'action' => 'delete', $e['Paciente']['id'])); ?></td>
    </tr>
  <?php endforeach;?>
</table>
