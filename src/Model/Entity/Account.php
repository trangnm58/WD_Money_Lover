<?php


/**
 * Account Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property datetime $created_at
 * @property string $tokenhash
 * @property bool $activate
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
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     */
    protected $_hidden = [
        'password'
    ];
}
