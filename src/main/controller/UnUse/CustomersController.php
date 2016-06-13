<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{
	public function addCustomer(Customer $newCustomer)
	{
		$custTable = new CustomersTable();
		$custTable.insert($newCustomer);		
	}
    
    public function updateCustomer(Customer $customer)
    {
    	$custTable = new CustomersTable();
    	if ($categorysTable.update($customer)) {
    		return true;
    	} else {
    		return false;
    	}
    }
}
