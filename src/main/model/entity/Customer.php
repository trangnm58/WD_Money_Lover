<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 *
 * @property int $id
 * @property int $account_id
 * @property \App\Model\Entity\Account $account
 * @property string $username
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property bool $gender
 * @property \Cake\I18n\Time $dob
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Category[] $categorys
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Wallet[] $wallets
 */
class Customer extends Entity
{

	private $id;
	private $account_id;
	private $username;
	private $email;
	private $first_name;
	private $last_name;
	private $gender;
	private $dob;


    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    // Get functions
    public function getId()
    {
    	return $this->id;
    }

    public function getAccount_id()
    {
    	return $this->account_id;
    }

    public function getUsername()
    {
    	return $this->username;
    }

    public function getEmail()
    {
    	return $this->email;
    }

    public function getFirst_name()
    {
    	return $this->first_name;
    }

    public function getLast_name()
    {
    	return $this->last_name;
    }

    public function getGender()
    {
    	return $this->gender;
    }

    public function getDob()
    {
    	return $this->dob;
    }

    // Set functions
    public function setId($_id)
    {
    	$this->id = $_id;
    }

    public function setAccount_id($_account_id)
    {
    	$this->account_id = $_account_id;
    }

    public function setUsername($_username)
    {
    	$this->username = $_username;
    }

    public function setEmail($_email)
    {
    	$this->email = $_email;
    }

    public function setFrist_name($_first_name)
    {
    	$this->first_name = $_first_name;
    }

    public function setLast_name($_last_name)
    {
    	$this->last_name = $_last_name;
    }

    public function setGender($_gender)
    {
    	$this->gender = $_gender;
    }

    public function setDob($_dob)
    {
    	$this->dob = $_dob;
    }

    // Construct function

    public function __construct(array $arrCustomer)
    {
    	$customer = json_encode($arrCustomer);
    	if (isset($customer.id) && $customer != null) {
    		$this->id = $customer.id;
    	}
    	if (isset($customer.account_id) && $customer.account_id != null) {
    		$this->account_id = $customer.account_id;
    	}
    	if (isset($customer.username) && $customer.username != null) {
    		$this->username = $customer.username;
    	}
    	if (isset($customer.email) && $customer.email != null) {
    		$this->email = $customer.email;
    	}
    	if (isset($customer.first_name) && $customer.first_name != null) {
    		$this->first_name = $customer.first_name;
    	}
    	if (isset($customer.last_name) && $customer.last_name != null) {
    		$this->last_name = $customer.last_name;
    	}
    	if (isset($customer.gender) ) {
    		$this->gender = $customer.gender;
    	}
    	if (isset($customer.dob)) {
    		$this->dob = $customer.dob;
    	}
    }
}
