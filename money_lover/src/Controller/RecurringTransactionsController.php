<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecurringTransactions Controller
 *
 * @property \App\Model\Table\RecurringTransactionsTable $RecurringTransactions
 */
class RecurringTransactionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Units', 'Wallets', 'Categorys']
        ];
        $recurringTransactions = $this->paginate($this->RecurringTransactions);

        $this->set(compact('recurringTransactions'));
        $this->set('_serialize', ['recurringTransactions']);
    }

    /**
     * View method
     *
     * @param string|null $id Recurring Transaction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recurringTransaction = $this->RecurringTransactions->get($id, [
            'contain' => ['Accounts', 'Units', 'Wallets', 'Categorys']
        ]);

        $this->set('recurringTransaction', $recurringTransaction);
        $this->set('_serialize', ['recurringTransaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recurringTransaction = $this->RecurringTransactions->newEntity();
        if ($this->request->is('post')) {
            $recurringTransaction = $this->RecurringTransactions->patchEntity($recurringTransaction, $this->request->data);
            if ($this->RecurringTransactions->save($recurringTransaction)) {
                $this->Flash->success(__('The recurring transaction has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recurring transaction could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->RecurringTransactions->Accounts->find('list', ['limit' => 200]);
        $units = $this->RecurringTransactions->Units->find('list', ['limit' => 200]);
        $wallets = $this->RecurringTransactions->Wallets->find('list', ['limit' => 200]);
        $categorys = $this->RecurringTransactions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('recurringTransaction', 'accounts', 'units', 'wallets', 'categorys'));
        $this->set('_serialize', ['recurringTransaction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Recurring Transaction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recurringTransaction = $this->RecurringTransactions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recurringTransaction = $this->RecurringTransactions->patchEntity($recurringTransaction, $this->request->data);
            if ($this->RecurringTransactions->save($recurringTransaction)) {
                $this->Flash->success(__('The recurring transaction has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The recurring transaction could not be saved. Please, try again.'));
            }
        }
        $accounts = $this->RecurringTransactions->Accounts->find('list', ['limit' => 200]);
        $units = $this->RecurringTransactions->Units->find('list', ['limit' => 200]);
        $wallets = $this->RecurringTransactions->Wallets->find('list', ['limit' => 200]);
        $categorys = $this->RecurringTransactions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('recurringTransaction', 'accounts', 'units', 'wallets', 'categorys'));
        $this->set('_serialize', ['recurringTransaction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Recurring Transaction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recurringTransaction = $this->RecurringTransactions->get($id);
        if ($this->RecurringTransactions->delete($recurringTransaction)) {
            $this->Flash->success(__('The recurring transaction has been deleted.'));
        } else {
            $this->Flash->error(__('The recurring transaction could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
