<?php
namespace App\Model\Table;

use App\Model\Entity\Category;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Categorys Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Budgets
 * @property \Cake\ORM\Association\HasMany $RecurringTransactions
 * @property \Cake\ORM\Association\HasMany $Transactions
 */
class CategorysTable extends Table
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

        $this->table('categorys');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Budgets', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('RecurringTransactions', [
            'foreignKey' => 'category_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'category_id'
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
            ->integer('icon')
            ->requirePresence('icon', 'create')
            ->notEmpty('icon');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        return $rules;
    }

    /**
     * insert Category object as a record into categorys table in moneylover database
     * @param Category $newCategory
     * @return boolean variable, it is true if insert into database successfully
     */
    public function insert(Category $category)
    {
        if (is_string($category.getName() && is_int($category.getIcon()) && is_int($category.getGroup_id())
            && is_int($category.getCustomer_id())) {
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
            if (!$conn) {
            return false;
            } else {
                $sql = "INSERT INTO categorys VALUES ('',$category.getName(),$category.getIcon(),$category.getGroup_id(),$category.getCustomer_id())";
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
     * Updates a Category object as a record on categoryss table in moneylover database
     * @param Category $newCategory
     * @return boolean variable, it is true if insert into database successfully
     */
    public function update(Category $newcategory)
    {
        if (is_string($newcategory.getName() && is_int($newcategory.getIcon()) && is_int($newcategory.getGroup_id())
            && is_int($newcategory.getCustomer_id())) {
            $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
            if (!$conn) {
            return false;
            } else {
                $sql = "UPDATE categorys SET name = $newcategory.getName(), icon = $newcategory.getIcon(), group_id = $newcategory.getGroup_id(), customer_id = $newcategory.getCustomer_id()) WHERE id = $newcategory.getId()";
                if (mysqli_query($conn,$sql)) {            
                    $conn->close();
                    return true;
                }  else {
                    return false;
                }
            }

        }
    }

    /**
     * Deletes a Category object as a record from categorys table in moneylover database
     * @param id of a category
     * @return boolean variable, it is true if delete from database successfully
     */
    public function remove($_id)
    {
        $conn = mysqli_connect("localhost", "moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $sql = "DELETE from categorys WHERE id = $_id";
            if (mysqli_query($conn, $sql)) {
                $conn.close();
                return true;
            } else {
                return false;
            }

        }
        
    }

    /**
     * Get info of a Category object as a record from categorys table in moneylover database
     * @param id of a category
     * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
     */
    public function getData($_id)
    {

        $conn = new mysqli_connect("localhost","moneylover","12345678","moneylover");
        if (!$conn) {
            return false;
        } else {
            $query = "SELECT * FROM categorys where id = $_id";
            $result = mysql_query($query,$conn);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                 $arrCate = array('id' =>$row["id"] , 'name' =>$row["name"] , 'icon' =>$row["icon"] , 'group_id' =>$row["group_id"] , 'customer_id' =>$row["customer_id"]);
                 return $arrCate;
            }
        }
    }

}
