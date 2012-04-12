<!-- File: /app/View/Posts/index.ctp  (links para edição adicionados) -->
<h1>Blog posts</h1>
<p><?php echo $this->Html->link("Adicionar Post", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Ação</th>
        <th>Criado</th>
    </tr>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
            </td>
            <td>
                <?php echo $this->Form->postLink(
                    'Apagar',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Tem certeza que desejar apagar?')
                )?>
                <?php echo $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id']));?>
            </td>
            <td><?php echo $post['Post']['created']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>