<!-- File: /app/View/Users/edit.ctp -->

<h1>Edit Post</h1>
<?php
    echo $this->Form->create('User', array('action' => 'edit'));
    echo $this->Form->input('username');
    echo $this->Form->input('password', array('rows' => '3'));
    echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Alterar Usuario');