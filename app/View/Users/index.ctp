<h1>Gerenciamento de Usuários</h1>
<p><?php echo $this->Html->link("Adicionar Usuário", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Nome de Usuário</th>
        <th>Ação</th>
        <th>Criado</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($user['User']['username'], array('action' => 'view', $user['User']['id']));?>
            </td>
            <td>
                <?php echo $this->Form->postLink(
                    'Apagar',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Tem certeza que desejar apagar?')
                )?>
                <?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']));?>
            </td>
            <td><?php echo $user['User']['created']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>