<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity.
 *
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property string $displayed_amount
 * @property string $language
 * @property string $date_format
 * @property int $first_day_of_week
 * @property int $first_day_of_month
 * @property int $first_month_of_year
 * @property \Cake\I18n\Time $update_at
 */
class Setting extends Entity
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
        'customer_id' => false,
    ];
}
