<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wallet Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property string $name
 * @property string $description
 * @property int $icon
 * @property float $amount
 * @property int $unit_id
 * @property \App\Model\Entity\Unit $unit
 * @property \Cake\I18n\Time $created_at
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Wallet extends Entity
{

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
}
