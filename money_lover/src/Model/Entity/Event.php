<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity.
 *
 * @property int $id
 * @property int $account_id
 * @property \App\Model\Entity\Account $account
 * @property string $name
 * @property \Cake\I18n\Time $ending_date
 * @property \Cake\I18n\Time $created_at
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Event extends Entity
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
