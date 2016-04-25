<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $icon
 * @property int $group_id
 * @property \App\Model\Entity\Group $group
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Category extends Entity
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
