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
