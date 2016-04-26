<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Budgets Controller
 *
 * @property \App\Model\Table\BudgetsTable $Budgets
 */
class BudgetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Categorys', 'Wallets']
        ];
        $budgets = $this->paginate($this->Budgets);

        $this->set(compact('budgets'));
        $this->set('_serialize', ['budgets']);
    }

    /**
     * View method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $budget = $this->Budgets->get($id, [
            'contain' => ['Customers', 'Categorys', 'Wallets']
        ]);

        $this->set('budget', $budget);
        $this->set('_serialize', ['budget']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $budget = $this->Budgets->newEntity();
        if ($this->request->is('post')) {
            $budget = $this->Budgets->patchEntity($budget, $this->request->data);
            if ($this->Budgets->save($budget)) {
                $this->Flash->success(__('The budget has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The budget could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Budgets->Customers->find('list', ['limit' => 200]);
        $categorys = $this->Budgets->Categorys->find('list', ['limit' => 200]);
        $wallets = $this->Budgets->Wallets->find('list', ['limit' => 200]);
        $this->set(compact('budget', 'customers', 'categorys', 'wallets'));
        $this->set('_serialize', ['budget']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $budget = $this->Budgets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $budget = $this->Budgets->patchEntity($budget, $this->request->data);
            if ($this->Budgets->save($budget)) {
                $this->Flash->success(__('The budget has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The budget could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Budgets->Customers->find('list', ['limit' => 200]);
        $categorys = $this->Budgets->Categorys->find('list', ['limit' => 200]);
        $wallets = $this->Budgets->Wallets->find('list', ['limit' => 200]);
        $this->set(compact('budget', 'customers', 'categorys', 'wallets'));
        $this->set('_serialize', ['budget']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Budget id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $budget = $this->Budgets->get($id);
        if ($this->Budgets->delete($budget)) {
            $this->Flash->success(__('The budget has been deleted.'));
        } else {
            $this->Flash->error(__('The budget could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
