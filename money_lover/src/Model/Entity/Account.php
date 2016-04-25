<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\Time $created_at
 * @property string $tokenhash
 * @property bool $activate
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Category[] $categorys
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Wallet[] $wallets
 */
class Account extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
