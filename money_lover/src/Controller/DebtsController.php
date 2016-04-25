<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Debts Controller
 *
 * @property \App\Model\Table\DebtsTable $Debts
 */
class DebtsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Wallets', 'Events']
        ];
        $debts = $this->paginate($this->Debts);

        $this->set(compact('debts'));
        $this->set('_serialize', ['debts']);
    }

    /**
     * View method
     *
     * @param string|null $id Debt id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $debt = $this->Debts->get($id, [
            'contain' => ['Customers', 'Wallets', 'Events']
        ]);

        $this->set('debt', $debt);
        $this->set('_serialize', ['debt']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $debt = $this->Debts->newEntity();
        if ($this->request->is('post')) {
            $debt = $this->Debts->patchEntity($debt, $this->request->data);
            if ($this->Debts->save($debt)) {
                $this->Flash->success(__('The debt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The debt could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Debts->Customers->find('list', ['limit' => 200]);
        $wallets = $this->Debts->Wallets->find('list', ['limit' => 200]);
        $events = $this->Debts->Events->find('list', ['limit' => 200]);
        $this->set(compact('debt', 'customers', 'wallets', 'events'));
        $this->set('_serialize', ['debt']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Debt id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $debt = $this->Debts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $debt = $this->Debts->patchEntity($debt, $this->request->data);
            if ($this->Debts->save($debt)) {
                $this->Flash->success(__('The debt has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The debt could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Debts->Customers->find('list', ['limit' => 200]);
        $wallets = $this->Debts->Wallets->find('list', ['limit' => 200]);
        $events = $this->Debts->Events->find('list', ['limit' => 200]);
        $this->set(compact('debt', 'customers', 'wallets', 'events'));
        $this->set('_serialize', ['debt']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Debt id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $debt = $this->Debts->get($id);
        if ($this->Debts->delete($debt)) {
            $this->Flash->success(__('The debt has been deleted.'));
        } else {
            $this->Flash->error(__('The debt could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
