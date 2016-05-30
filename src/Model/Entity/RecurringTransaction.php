<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecurringTransaction Entity.
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
 * @property string $description
 * @property int $repeat_type
 * @property \Cake\I18n\Time $from_date
 * @property \Cake\I18n\Time $to_date
 * @property int $every
 * @property bool $monthly
 * @property string $weekly
 * @property \Cake\I18n\Time $created_at
 */
class RecurringTransaction extends Entity
{

    private $id;
    private $customer_id;
    private $amount;
    private $unit_id;
    private $wallet_id;
    private $category_id;
    private $description;
    private $repeat_type;
    private $from_date;
    private $to_date;
    private $every;
    private $monthly;
    private $weekly;
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

    // Get Functions
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getRepeat_type()
    {
        return $this->repeat_type;
    }

    public function getFrom_date()
    {
        return $this->from_date;
    }

    public function getTo_date()
    {
        return $this->to_date;
    }

    public function getEvery()
    {
        return $this->every;
    }
    public function getMonthly()
    {
        return $this->monthly;
    }

    public function getWeekly()
    {
        return $this->weekly;
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

    public function setDescription($_description)
    {
        $this->description = $_description;
    }

    public function setRepeat_type($_repeat_id)
    {
        $this->repeat_type = $_repeat_id;
    }

    public function setFrom_date($_from_date)
    {
        $this->from_date = $_from_date;
    }

    public function setTo_date($_to_date)
    {
        $this->to_date = $_to_date;
    }

    public function setEvery($_every)
    {
        $this->every = $_every;
    }

    public function setMonthly($_monthly)
    {
        $this->monthly = $_monthly;
    }

    public function setWeekly($_weekly)
    {
        $this->weekly = $_weekly;
    }

    public function setCreated_at($_created_at)
    {
        $this->created_at = $_created_at;
    }

    public function __construct(array $arrRecurTrans)
    {
        $recurringTransaction = json_encode($arrRecurTrans);
        if (isset($recurringTransaction.id) && $recurringTransaction.id != null ) {
            $this->id = $recurringTransaction.id;
        }
        if (isset($recurringTransaction.customer_id) && $recurringTransaction.customer_id != null) {
            $this->customer_id = $recurringTransaction.customer_id;
        }
        if (isset($recurringTransaction.amount) && $recurringTransaction.amount != null) {
            $this->amount = $recurringTransaction.amount;
        }
        if (isset($recurringTransaction.unit_id) && $recurringTransaction.unit_id != null) {
            $this->unit_id = $recurringTransaction.unit_id;
        }
        if (isset($recurringTransaction.wallet_id) && $recurringTransaction.wallet_id) {
            $this->wallet_id = $recurringTransaction.wallet_id;
        }
        if (isset($recurringTransaction.category_id) && $recurringTransaction.category_id != null) {
            $this->category_id = $recurringTransaction.category_id;
        }
        if (isset($recurringTransaction.description)) {
            $this->description = $recurringTransaction.description;
        }
        if (isset($recurringTransaction.repeat_type) && $recurringTransaction.repeat_type != null) {
            $this->repeat_type = $recurringTransaction.repeat_type;
        }
        if (isset($recurringTransaction.from_date)) {
            $this->from_date = $recurringTransaction.from_date;
        }
        if (isset($recurringTransaction.to_date)) {
            $this->to_date = $recurringTransaction.to_date;
        }
        if (isset($recurringTransaction.every) && $recurringTransaction.every != null) {
            $this->every = $recurringTransaction.every;
        }
        if (isset($recurringTransaction.monthly)) {
            $this->monthly = $recurringTransaction.monthly;
        }
        if (isset($recurringTransaction.weekly)) {
            $this->weekly = $recurringTransaction.weekly;
        }
        if (isset($recurringTransaction.created_at) && $recurringTransaction.created_at != null) {
            $this->created_at = $recurringTransaction.created_at;
        }
    }

}
