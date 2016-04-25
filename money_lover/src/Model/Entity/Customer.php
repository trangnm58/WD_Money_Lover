<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 *
 * @property int $id
 * @property int $account_id
 * @property \App\Model\Entity\Account $account
 * @property string $username
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property bool $gender
 * @property \Cake\I18n\Time $dob
 * @property int $wallet_id
 * @property \App\Model\Entity\Wallet[] $wallets
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Category[] $categorys
 * @property \App\Model\Entity\Debt[] $debts
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Setting[] $settings
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Customer extends Entity
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
