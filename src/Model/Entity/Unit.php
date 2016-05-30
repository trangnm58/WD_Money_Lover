<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Unit Entity.
 *
 * @property int $id
 * @property string $name
 * @property float $exchange_rate
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Wallet[] $wallets
 */
class Unit extends Entity
{

    private $id;
    private $name;
    private $exchange_rate;
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

    public function getName()
    {
        return $this->name;
    }

    public function getExchange_rate()
    {
        return $this->exchange_rate;
    }

    // Set Functions
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setName($_name)
    {
        $this->name;
    }

    public function setExchange_rate($_exchange_rate)
    {
        $this->exchange_rate = $_exchange_rate;
    }

    // Construct function
    public function __construct(array $arrUnit)
    {
        $unit = json_encode($arrUnit);
        if (isset($unit.id) &&unit.id != null) {
            $this->id = $unit.id;
        }
        if (isset($unit.name) && $unit.name != null) {
            $this->name = $unit.name;
        }
        if (isset($unit.exchange_rate) && $unit.exchange_rate != null) {
            $this->exchange_rate = $unit.exchange_rate;
        }
    }

}
