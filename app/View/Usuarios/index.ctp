<h1> Visualizar Usuários </h1>




<table>
  <tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Login </th>
    <th>Tipo de usuário</th>
    <th>Excluir</th>
  </tr>
  <?php foreach ($usuarios as $e): ?>

    <tr>
      <td><?= $e['Usuario']['id']; ?></td>
      <td><?= $e['Usuario']['nome']; ?></td>
      <td><?= $e['Usuario']['login'];?></td>
      <td><?= $e['Usuario']['tipo'];?></td>
      <td><?= $this->Html->link("Excluir",array('controller' => 'usuarios', 'action' => 'delete', $e['Usuario']['id'])); ?></td>

    </tr>
  <?php endforeach;?>
</table>
