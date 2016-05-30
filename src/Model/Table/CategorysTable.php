<?php
namespace App\Model\Table;

use App\Model\Entity\Category;


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
     * insert Category object as a record into categorys table in moneylover database
     * @param Category $newCategory
     * @return id of category
     */
    
    public function insert(Category $category)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO request (name, icon, group_id, customer_id) VALUES (:name, :icon, :group_id, :customer_id)");

            $stmt->bindParam(':name', $category.getName());
            $stmt->bindParam(':icon', $category.getIcon());
            $stmt->bindParam(':group_id', $category.getGroup_id());
            $stmt->bindParam(':customer_id', $category.getCustomer_id());
                
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
    }

    /**
     * Updates a Category object as a record on categoryss table in moneylover database
     * @param Category $newCategory     
     */    

    public function update(Category $category)
        {
        
            try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("UPDATE request SET  name =  :from_address, icon = :icon, group_id = :group_id, WHERE  id = :id and customer_id = :customer_id");
                $stmt->bindParam(':name', $category.getName());
                $stmt->bindParam(':id', $category.getId());
                $stmt->bindParam(':icon', $category.getIcon());
                $stmt->bindParam(':group_id', $category.getGroup_id());
                $stmt->bindParam(':customer_id', $category.getCustomer_id());
                $stmt->execute();

                return true;
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    /**
     * Deletes a Category object as a record from categorys table in moneylover database
     * @param id of a category     
     */
    
    public function delete($categoryId)
        {
        
            try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("DELETE FROM categorys WHERE id = :id");                
                $stmt->bindParam(':id', $categoryId);
                $stmt->execute();

                return true;
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;            
        }

    /**
     * Get info of a Category object as a record from categorys table in moneylover database
     * @param id of a category
     * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
     */
    public function getInfo($customerId)
    {

        try {

            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM categorys WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            return json_encode($result);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
            
    }

}
