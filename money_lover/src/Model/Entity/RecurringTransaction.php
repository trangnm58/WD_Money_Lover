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
