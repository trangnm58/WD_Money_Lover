<?php
namespace App\Model\Table;

use App\Model\Entity\Wallet;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wallets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Units
 * @property \Cake\ORM\Association\HasMany $Budgets
 * @property \Cake\ORM\Association\HasMany $Debts
 * @property \Cake\ORM\Association\HasMany $RecurringTransactions
 * @property \Cake\ORM\Association\HasMany $Transactions
 */
class WalletsTable extends Table
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

        $this->table('wallets');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Budgets', [
            'foreignKey' => 'wallet_id'
        ]);
        $this->hasMany('Debts', [
            'foreignKey' => 'wallet_id'
        ]);
        $this->hasMany('RecurringTransactions', [
            'foreignKey' => 'wallet_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'wallet_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->integer('icon')
            ->allowEmpty('icon');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmpty('created_at');

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
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        return $rules;
    }

    /**
     * insert Wallet object as a record into wallets table in moneylover database
     * @param Wallet $newWallet
     * @return boolean variable, it is true if insert into database successfully
     */
    public function insert(Wallet $newWallet)
    {
        if (is_int($newWallet.getAccount_Id()) && is_string($newWallet.getName()) && is_string($newWallet.getDescription()) && is_int($newWallet.getIcon()) && is_int($newWallet.getAmount()) && is_int($newWallet.getUnit_id())) {
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
            if (!$conn) {
            return false;
            } else {
                $sql = "INSERT INTO wallets VALUES ('',$newWallet.getAccount_Id(),$newWallet.getName(),$newWallet.getDescription(),$newWallet.getIcon(),$newWallet.getAmount(), $newWallet.getUnit_id(),$newWallet.getCreated_at())";
                if (mysqli_query($conn,$sql)) {
                $last_id = $conn->insert_id;
                $conn->close();
                return true;
                } else {
                    return false;
                }
            }
        }
        
    }

    /**
     * Updates a Wallet object as a record on wallets table in moneylover database
     * @param Wallet $newWallet
     * @return boolean variable, it is true if insert into database successfully
     */
    public function update(Wallet $newWallet)
    {
        if (is_int($newWallet.getAccount_Id()) && is_string($newWallet.getName()) && is_string($newWallet.getDescription()) && is_int($newWallet.getIcon()) && is_int($newWallet.getAmount()) && is_int($newWallet.getUnit_id())) {            
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");

            if (!$conn) {
           
            return false;
            }
            else {
                $sql = "UPDATE wallets SET account_id = $newWallet.getAccount_Id(), name = $newWallet.getName(),
                description = $newWallet.getDescription(),icon = $newWallet.getIcon(),amount = $newWallet.getAmount(),
                unit_id = $newWallet.getUnit_id(), created_at = $newWallet.getCreated_at() where id = $newWallet.getId()";
        

                if (mysqli_query($conn,$sql)) {            
                    $conn->close();
                    return true;
                } else {
                    return false;
                }
            }
        }

    }

    /**
     * Deletes a Wallet object as a record from wallets table in moneylover database
     * @param id of a wallet
     * @return boolean variable, it is true if insert into database successfully
     */
    public function remove($_id)
    {
        $conn = mysqli_connect("localhost", "moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $sql = "DELETE from wallets WHERE id = $_id";
            if (mysqli_query($conn, $sql)) {
                $conn.close();
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Get info of a Wallet object as a record from wallets table in moneylover database
     * @param id of a wallet
     * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
     */
    public function getData($_id)
    {

        $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $query = "SELECT * FROM wallets where id = $_id";
            $result = mysql_query($query,$conn);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $arrW = array('id' =>$row["id"] , 'account_id' =>$row["account_id"] , 'name' =>$row["name"] , 'description' =>$row["description"] , 'icon' =>$row["icon"] , 'amount' =>$row["amount"] , 'unit_id' =>$row["unit_id"] , 'created_at' =>$row["created_at"]);
                return $arrW;
            }
        }
    }

}