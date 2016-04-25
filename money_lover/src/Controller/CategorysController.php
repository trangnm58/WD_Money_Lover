<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorys Controller
 *
 * @property \App\Model\Table\CategorysTable $Categorys
 */
class CategorysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Accounts']
        ];
        $categorys = $this->paginate($this->Categorys);

        $this->set(compact('categorys'));
        $this->set('_serialize', ['categorys']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categorys->get($id, [
            'contain' => ['Groups', 'Accounts', 'Budgets', 'RecurringTransactions', 'Transactions']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categorys->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categorys->patchEntity($category, $this->request->data);
            if ($this->Categorys->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Categorys->Groups->find('list', ['limit' => 200]);
        $accounts = $this->Categorys->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('category', 'groups', 'accounts'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categorys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categorys->patchEntity($category, $this->request->data);
            if ($this->Categorys->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Categorys->Groups->find('list', ['limit' => 200]);
        $accounts = $this->Categorys->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('category', 'groups', 'accounts'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categorys->get($id);
        if ($this->Categorys->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
