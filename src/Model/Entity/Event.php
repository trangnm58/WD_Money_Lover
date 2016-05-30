<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property string $name
 * @property \Cake\I18n\Time $ending_date
 * @property \Cake\I18n\Time $created_at
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Event extends Entity
{
    private $id;
    private $customer_id;
    private $name;
    private $ending_date;
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

    public function getcustomer_id()
    {
        return $this->customer_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEnding_date()
    {
        return $this->ending_date;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    // Set Functions
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setCustomer_id($_customer_id)
    {
        $this->customer_id = $_customer_id;
    }

    public function setName($_name)
    {
        $this->name = $_name;
    }

    public function setEnding_date($_ending_date)
    {
        $this->ending_date = $_ending_date;
    }

    public function setCreate_at($_created_at)
    {
        $this->created_at = $_created_at;
    }

    // Construct function
    public function __construct(array $arrEvent)
    {
        $event = json_encode($arrEvent);
        if (isset($event.id) && $event.id != null) {
            $this->id = $event.id;
        }
        if (isset($event.customer_id) && $event.customer_id != null) {
            $this->customer_id = $event.customer_id;
        }
        if (isset($event.name) && $event.name != null) {
            $this->name = $event.name;
        }
        if (isset($event.ending_date) && $event.ending_date != null) {
            $this->ending_date = $event.ending_date;
        }
        if (isset($event.created_at) && $event.created_at != null) {
            $this->created_at = $event.created_at;
        }
    }
}
