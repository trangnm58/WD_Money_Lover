<?php
namespace App\Model\Table;

use App\Model\Entity\Unit;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Units Model
 *
 * @property \Cake\ORM\Association\HasMany $RecurringTransactions
 * @property \Cake\ORM\Association\HasMany $Transactions
 * @property \Cake\ORM\Association\HasMany $Wallets
 */
class UnitsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('units');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('RecurringTransactions', [
            'foreignKey' => 'unit_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'unit_id'
        ]);
        $this->hasMany('Wallets', [
            'foreignKey' => 'unit_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->numeric('exchange_rate')
            ->requirePresence('exchange_rate', 'create')
            ->notEmpty('exchange_rate');

        return $validator;
    }
}
