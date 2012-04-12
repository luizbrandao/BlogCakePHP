<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuario salvo com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível criar o usuário. Por favor, tente mais tarde.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário alterado com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não foi possível alterar o usuário. Por favor, tente mais tarde.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário apagado com sucesso.'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Não foi possível apagar o usuário. Por favor, tente mais tarde.'));
        $this->redirect(array('action' => 'index'));
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Session->setFlash(__('Usuário ou senha inválidos, tente novamente.'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
}