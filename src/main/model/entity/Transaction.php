<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property float $amount
 * @property int $unit_id
 * @property \App\Model\Entity\Unit $unit
 * @property int $wallet_id
 * @property \App\Model\Entity\Wallet $wallet
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property \Cake\I18n\Time $time
 * @property int $event_id
 * @property \App\Model\Entity\Event $event
 * @property string $description
 * @property string $location
 * @property string $partner
 * @property \Cake\I18n\Time $created_at
 */
class Transaction extends Entity
{

    private $id;
    private $customer_id;
    private $amount;
    private $unit_id;
    private $wallet_id;
    private $time;
    private $event_id;
    private $description;
    private $location;
    private $partner;
    private $created_at;

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

    public function getId()
    {
        return $this->id;
    }

    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getUnit_id()
    {
        return $this->unit_id;
    }

    public function getWallet_id()
    {
        return $this->wallet_id;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getEvent_id()
    {
        return $this->event_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->partner;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    // Set Function
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setCustomer_id($_customer_id)
    {
        $this->customer_id = $_customer_id;
    }

    public function setAmount($_amount)
    {
        $this->amount = $_amount;
    }

    public function setUnit_id($_unit_id)
    {
        $this->unit_id = $_unit_id;
    }

    public function setWallet_id($_wallet_id)
    {
        $this->wallet_id = $_wallet_id;
    }

    public function setCategory_id($_category_id)
    {
        $this->category_id = $_category_id;
    }

    public function time($_time)
    {
        $this->time - $_time;
    }

    public function setEvent_id($_event_id)
    {
        $this->event_id = $_event_id;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
    }

    public function setLocation($_location)
    {
        $this->location = $_location;
    }

    public function setPartner($_partner)
    {
        $this->partner = $_partner;        
    }

    public function setCreate_at($_created_at)
    {
        $this->created_at = $_created_at;        
    }

    public function __construct(array $arrTransaction)
    {
        $transaction = json_encode($arrTransaction);

        if (isset($transaction.id) && $transaction.id != null) {
            $this->id = $transaction.id;
        }
        if (isset($transaction.customer_id) && $transaction.customer_id != null) {
            $this->customer_id = $category.customer_id;
        }
        if (isset($transaction.unit_id) && $transaction.unit_id != null) {
            $this->unit_id = $transaction.unit_id;
        }
        if (isset($transaction.wallet_id) && $transaction.wallet_id != null) {
            $this->wallet_id = $transaction.wallet_id;
        }
        if (isset($transaction.category_id) && $transaction.category_id != null) {
            $this->customer_id = $transaction.category_id;
        }
        if (isset($transaction.time) && $transaction.time != null) {
            $this->time = $transaction.time;
        }
        if (isset($transaction.event_id) && $transaction.event_id != null) {
            $this->event_id = $transaction.event_id;
        }
        if (isset($transaction.description)) {
            $this->description = $transaction.description;
        }
        if (isset($transaction.location)) {
            $this->location = $transaction.location;
        }
        if (isset($transaction.partner)) {
            $this->partner = $transaction.partner;
        }
    }
    
}
