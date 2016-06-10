<?php
namespace App\Model\Table;

use App\Model\Entity\Budget;


/**
 * Budgets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Categorys
 * @property \Cake\ORM\Association\BelongsTo $Wallets
 */
class BudgetsTable extends Table
{

    
    /**
     * insert Budget object as a record into budgets table in moneylover database
     * @param Budget $newBudget
     * @return id of budget inserted if insert into database successfully
     */    

    public function insert(Budget $budget)
    {            
        try {
        $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO budgets (customer_id, goal, spent, from_date, to_date, category_id, wallet_id, created_at) VALUES (:customer_id, :goal, :spent, :from_date, :to_date, :category_id, :wallet_id, :created_at)");

            $stmt->bindParam(':customer_id', $budget->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':goal', $budget->getGoal());
            $stmt->bindParam(':spent', $budget->getSpent());
            $stmt->bindParam(':from_date', $budget->getFrom_date());
            $stmt->bindParam(':to_date', $budget->getTo_date());
            $stmt->bindParam(':category_id', $budget->getCategory_id(), PDO::PARAM_INT);
            $stmt->bindParam(':wallet_id', $budget->getWallet_id(), PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $budget->getCreated_at());

            $stmt->execute();

            return $conn->lastInsertId();
            }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
               

    /**
     * Updates a budget object as a record on budgets table in moneylover database
     * @param Budget $budget    
     */
  

    public function update(Budget $budget)
        {
            
            try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("UPDATE budgets SET  goal =  :goal, spent = :spent, from_date = :from_date, to_date = :to_date, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");
                
                $stmt->bindParam(':goal', $budget->getGoal());
                $stmt->bindParam(':spent', $budget->getSpent());
                $stmt->bindParam(':from_date', $budget->getFrom_date());
                $stmt->bindParam(':to_date', $budget->getTo_date());                                
                $stmt->bindParam(':created_at', $budget->getCreated_at());
                $stmt->bindParam(':customer_id', $budget->getCustomer_id(), PDO::PARAM_INT);

                $stmt->execute();

                return true;
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $conn = null;
        }

    

    public function getMyBudget($customerId)
    {
        
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylovero", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM budgets WHERE customer_id = :customer_id");
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

    /**
     * Deletes a budget object as a record from budgets table in moneylover database
     * @param id of a budget     
     */    
    public function delete($budgetId)
        {
            
            try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("DELETE FROM budgets WHERE id = :id");                
                $stmt->bindParam(':id', $budgetId);
                $stmt->execute();

                return true;
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;            
        }
}
