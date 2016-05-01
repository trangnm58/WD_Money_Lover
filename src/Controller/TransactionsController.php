<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 */
class TransactionsController extends AppController
{

    /**
     * Add transaction into Database
     *
     * @param Transaction $newTransaction
     * @return Id of that transaction added
     */
    public function addTransaction(Transaction $newTransaction)
    {
        $transactionsTable = new TransactionsTable();
        if ($transactionsTable.insert($newTransaction)) {
            return $newTransaction.getId();
        } else {
            return fasle;
        }
    }

    /**
     * Updates transaction info
     *
     * @param Transaction $transaction
     * @return boolean variable, it is true if set successfully
     */
    public function updateWaletInfo(Wallet $transaction)
    {
        $transactionsTable = new TransactionsTable();
        if ($transactionsTable.update($transaction)) {
            return true;
        } else {
            return false;
        }     
    }
    /**
     * Removes a Transaction object as a record from transactions table in moneylover database
     * @param id of a transaction
     * @return id of transaction object removed successfully
     */
    public function removeTransaction($_id)
    {
        $transactionTable = new TransactionsTable();
        if ($transactionTable.remove($_id)) {
            return $_id;
        } else {
            return false;
        }
    }
    
}
