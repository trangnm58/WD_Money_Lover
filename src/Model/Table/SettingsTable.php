<?php
namespace App\Model\Table;

use App\Model\Entity\Setting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class SettingsTable extends Table
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

        $this->table('settings');
        $this->displayField('customer_id');
        $this->primaryKey('customer_id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
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
            ->requirePresence('displayed_amount', 'create')
            ->notEmpty('displayed_amount');

        $validator
            ->requirePresence('language', 'create')
            ->notEmpty('language');

        $validator
            ->requirePresence('date_format', 'create')
            ->notEmpty('date_format');

        $validator
            ->integer('first_day_of_week')
            ->requirePresence('first_day_of_week', 'create')
            ->notEmpty('first_day_of_week');

        $validator
            ->integer('first_day_of_month')
            ->requirePresence('first_day_of_month', 'create')
            ->notEmpty('first_day_of_month');

        $validator
            ->integer('first_month_of_year')
            ->requirePresence('first_month_of_year', 'create')
            ->notEmpty('first_month_of_year');

        $validator
            ->dateTime('update_at')
            ->requirePresence('update_at', 'create')
            ->notEmpty('update_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        return $rules;
    }
}
