<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Debt Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property bool $debt_type
 * @property float $amount
 * @property float $paid
 * @property string $description
 * @property \Cake\I18n\Time $time
 * @property int $wallet_id
 * @property \App\Model\Entity\Wallet $wallet
 * @property int $event_id
 * @property \App\Model\Entity\Event $event
 * @property string $partner
 * @property \Cake\I18n\Time $created_at
 */
class Debt extends Entity
{
    private $id;
    private $customer_id;
    private $debt_type;
    private $amount;
    private $paid;
    private $description;
    private $time;
    private $wallet_id;
    private $event_id;
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

    public function getDebt_type()
    {
        return $this->debt_type;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getPaid()
    {
        return $this->paid;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getWallet_id()
    {
        return $this->wallet_id;
    }

    public function getPartner()
    {
        return $this->partner;
    }

    public function getEvent_id()
    {
        return $this->event_id;
    }

    public function getCreated_at()
    {
        return $this->create_at;
    }

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setCustomer_id($_customer_id)
    {
        $this->customer_id = $_customer_id;
    }

    public function setDebt_type($_debt_type)
    {
        $this->debt_type = $_debt_type;
    }

    public function setAmount($_amount)
    {
        $this->amount = $_amount;
    }

    public function setPaid($_paid)
    {
        $this->paid = $_paid;
    }

    public function setDescription($_description)
    {
        $this->description = $_description;
    }

    public function setTime($_time)
    {
        $this->time = $_time;
    }

    public function setWallet_id($_wallet_id)
    {
        $this->wallet_id = $_wallet_id;
    }

    public function setEvent_id($_event_id)
    {
        $this->event_id = $_event_id;
    }

    public function setPartner($_partner)
    {
        $this->partner = $_partner;
    }

    public function setCreated_at($_created_at)
    {
        $this->created_at = $_created_at;
    }

    public function __construct(array $arrDebts)
    {
        $debts = json_encode($arrDebts);
        if (isset($debts.id) && $debts.id != null) {
            $this->id = $debts.id;
        }
        if (isset($debts.customer_id) && $debts.customer_id != null) {
            $this->customer_id = $debts.customer_id;
        }
        if (isset($debts.description)) {
            $this->description = $debts.description;
        }
        if (isset($debts.time) && $debts.time != null) {
            $this->time = $debts.time;
        }
        if (isset($debts.wallet_id) && $debts.wallet_id != null) {
            $this->wallet_id = $debts.wallet_id;
        }
        if (isset($debts.event_id) && $debts.partner != null) {
            $this->event_id = $debts.event_id;
        }
        if (isset($debts.partner)) {
            $this->partner = $debts.partner;
        }
        if (isset($debts.created_at) && $debts.created_at != null) {
            $this->create_at = $debts.created_at;
        }
    }

}
