<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\TransactionsController;
/**
 * Debts Controller
 *
 * @property \App\Model\Table\DebtsTable $Debts
 */
class DebtsController extends AppController
{

    /**
     * Add Debt into debts table, transaction into transactions table and update money for debt into Database
     *
     * @param Debt $newDebt
     * @return Id of debt
     */
	public function addDebt(Debt $newDebt)
	{
		$debtTable = new DebtsTable();
		if ($debtTable.insert($newDebt)) {
            $des            = $newDebt.getId() + " "  + $newDebt.getPartner() + + " vay " + $newDebt.getAmount() + "VND";
            $transControl   = new TransactionsController();
            $tran           = new Transaction();
            $walletControl    = new WalletsController();

            $tran.setCustomer_id($newDebt.getCustomer_id());
            $tran.setAmount($newDebt.getAmount());            
            $tran.setDescription($des);

            $transControl.addTransaction($tran);
            
            $wallet       = $walletControl.findWallet($newDebt.getCustomer_id());
            $newWalletAmount  = $wallet.getAmount() - $newDebt.getAmount();
            $wallet.setAmount($newWalletAmount);

            $walletControl.updateWaletInfo($wallet);

			return $newDebt.getId();
		} else {
			return false;
		}
	}

    /**
     * Updates Debt info
     *
     * @param DEbt $debt
     * @return boolean variable, it is true if set successfully
     */
    public function updateDebtInfo(Debt $debt)
    {
        $debtTable = new DebtsTable();

        if ($debtTable.update($debt)) {            
            return true;
        } else {
            return false;
        }     
    }
    /**
     * view all debt of each customer following customer_id as debt list
     * @param customer_id
     * @return array of debt
     * 
     */

    public function viewDebts($customer_id)
    {
    	$conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $query      = "SELECT id FROM debts where customer_id = $_customer_id";
            $result     = mysql_query($query,$conn);
            $arrId_Debt = array();
            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            	array_push($arrId_Debt, $row);
            }

            mysql_free_result($result);
            return $arrId_Debt;
        }
    }
    /**
     * Pay for debt and update money of customer 
     * @param $paid as money which paid and $_id that is id of customer
     * @return true if update all information for customer successfully
     *
     */

    public function payment($paid, $_id)
    {
        $debt   = $this->findDebt($_id);
        $amount = $debt.getAmount() - $paid();
        if ($amount == 0) {
            $this->remove($_id);
        } else {
            $debt.setAmount($amount);
            $customer = new Customer();
            $customer.setAmount($paid + $customer.getAmount);
            $customerTable = new CustomersTable($customer);
            $customerTable.update($customer);
            return $this->updateDebtInfo($debt);
        }
    
    }
    /**
     * remove debt on database
     * @param  $_id is id if debt
     *     
     */
    public function remove($_id)
    {
        $debtTable = new DebtsTable();
        if ($debtTable.remove($_id)) {

            $custControl    = new CustomersController();
            $customer       = $custControl.findCustomer($newDebt.getCustomer_id());
            $newCustAmount  = $customer.getAmount() + $newDebt.getAmount();
            $customer.setAmount($newCustAmount);
            $custControl.updateCustomerInfo($customer);           
        }
    }

}
