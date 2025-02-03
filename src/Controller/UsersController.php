<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $user = $this->Users->findById($id)->firstOrFail();
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error('Usuário não encontrado.');
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
    
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
    
            if ($this->Users->save($user)) {
                $this->Flash->success('Usuário cadastrado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao cadastrar usuário.');
        }
    
        $this->set(compact('user')); 
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    if (!$id) {
        $this->Flash->error('ID inválido.');
        return $this->redirect(['action' => 'index']);
    }

    try {
        $user = $this->Users->findById($id)->firstOrFail(); // 🔹 Busca o usuário ou gera erro
    } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
        $this->Flash->error('Usuário não encontrado.');
        return $this->redirect(['action' => 'index']);
    }

    if ($this->request->is(['patch', 'post', 'put'])) {
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if ($this->Users->save($user)) {
            $this->Flash->success('Alterações realizadas com sucesso!');
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error('Erro ao realizar alterações. Tente novamente.');
    }

    $this->set(compact('user'));
}


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Usuário deletado com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao deletar usuário,tente novamente mais tarde,se persistir,constate o suporte.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
