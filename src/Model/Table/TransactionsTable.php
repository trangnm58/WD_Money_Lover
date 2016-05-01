<?php
namespace App\Model\Table;

use App\Model\Entity\Transaction;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Units
 * @property \Cake\ORM\Association\BelongsTo $Wallets
 * @property \Cake\ORM\Association\BelongsTo $Categorys
 * @property \Cake\ORM\Association\BelongsTo $Events
 */
class TransactionsTable extends Table
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

        $this->table('transactions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Wallets', [
            'foreignKey' => 'wallet_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Categorys', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->dateTime('time')
            ->requirePresence('time', 'create')
            ->notEmpty('time');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('partner');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        return $validator;
    }

    /**
     * insert Transaction object as a record into transactions table in moneylover database
     * @param Transaction $transaction
     * @return boolean variable, it is true if insert into database successfully
     */
    public function insert(Transaction $transaction)
    {
         if (is_int($transaction.getCustomer_id()) && is_float($transaction.getAmount()) && is_int($transaction.getUnit_id())
            &&  is_int($transaction.getWallet_id()) && is_int($transaction.getCategory_id()) && is_int($transaction.getEvent_id())
            && is_string($transaction.getDescription()) && is_string($transaction.getLocation()) && is_string($transaction.getPartner())
            && checkdate(date("m",$transaction.getCreated_at()),date("d",$transaction.getCreated_at()),date("y",$transaction.getCreated_at()))) {
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
            if (!$conn) {
            return false;
            } else {
                $sql = "INSERT INTO transactions VALUES ('',$transaction.getCustomer_id(),$transaction.getAmount(),$transaction.getUnit_id(),
                $transaction.getWallet_id(),$transaction.getCategory_id(),"00:00:00",$transaction.getEvent_id(),$transaction.getDescription(),
                $transaction.getLocation(),$transaction.getCreated_at())";
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
     * Updates a Transaction object as a record on transactions table in moneylover database
     * @param Transaction $transaction
     * @return boolean variable, it is true if update on database successfully
     */
    public function update(Transaction $transaction)
    {
        if (is_int($transaction.getCustomer_id()) && is_float($transaction.getAmount()) && is_int($transaction.getUnit_id())
            &&  is_int($transaction.getWallet_id()) && is_int($transaction.getCategory_id()) && is_int($transaction.getEvent_id())
            && is_string($transaction.getDescription()) && is_string($transaction.getLocation()) && is_string($transaction.getPartner())
            && checkdate(date("m",$transaction.getCreated_at()),date("d",$transaction.getCreated_at()),date("y",$transaction.getCreated_at()))) {            
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");

            if (!$conn) {
                return false;
            } else {
                $sql = "UPDATE transactions SET ('',$transaction.getCustomer_id(),$transaction.getAmount(),$transaction.getUnit_id(),
                $transaction.getWallet_id(),$transaction.getCategory_id(),"00:00:00",$transaction.getEvent_id(),$transaction.getDescription(),
                $transaction.getLocation(),$transaction.getCreated_at())";
        
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
     * Get info of a Transaction object as a record from transactions table in moneylover database
     * @param id of a transaction
     * @return array as json has properties: id, customer_id, amount,unit_id, wallet_id, category_id, event_id, description, location, partner, created_at
     */
    public function getData($_id)
    {

        $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $query = "SELECT * FROM transactions where id = $_id";
            $result = mysql_query($query,$conn);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                 $arrTrans = array('id' =>$row["id"] , 'customer_id' =>$row["customer_id"] , 'amount' =>$row["amount"] , 'unit_id' =>$row["unit_id"] , 'wallet_id' =>$row["wallet_id"], 'category_id' =>$row["category_id"], 'time' =>$row["event_id"], 'description' =>$row["description"], 'location' =>$row["location"],'partner' =>$row["partner"], 'created_at' =>$row["created_at"]);
                 return $arrTrans;
            }
        }
    }

    /**
     * Deletes a Transaction object as a record from transactions table in moneylover database
     * @param id of a transaction
     * @return boolean variable, it is true if delete from database successfully
     */
    public function remove($_id)
    {
        $conn = mysqli_connect("localhost", "moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $sql = "DELETE from transactions WHERE id = $_id";
            if (mysqli_query($conn, $sql)) {
                $conn.close();
                return true;
            } else {
                return false;
            }

        }
    }
}
