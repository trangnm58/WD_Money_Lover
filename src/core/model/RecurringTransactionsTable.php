<?php
namespace App\Model\Table;

use App\Model\Entity\RecurringTransaction;

/**
 * RecurringTransactions Model
 *
 */
class RecurringTransactionsTable extends Table
{

    

    /**
     * insert RecurringTransaction object as a record into recurring_transactions table in moneylover database
     * @param RecurringTransaction $recurrTran
     * @return id of that recurringtransaction if insert into database successfully
     */
  
    public function insert(RecurringTransaction $recurrTran)
    {
        
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $stmt = $conn->prepare("INSERT INTO recurring_transactions (customer_id, amount, unit_id, wallet_id, category_id, description, repeat_type, from_date, to_date, every, monthly, weekly, created_at) VALUES (:customer_id, :amount, :unit_id, :wallet_id, :category_id, :description, :repeat_type, :from_date, :to_date, :every, :monthly, :weekly, :created_at)");

            
			$stmt->bindParam(':customer_id', $$recurrTran->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $recurrTran->getAmount());
            $stmt->bindParam(':unit_id', $recurrTran->getUnit_id(), PDO::PARAM_INT);
            $stmt->bindParam(':wallet_id', $recurrTran->getWallet_id(), PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $recurrTran->getCategory_id(), PDO::PARAM_INT);
            $stmt->bindParam(':description', $recurrTran->getDescription(), PDO::PARAM_STR);
            $stmt->execute();

            $stmt->bindParam(':repeat_type', $recurrTran->getRepeat_type(), PDO::PARAM_INT);
            $stmt->bindParam(':from_date', $recurrTran->getFrom_date());
            $stmt->bindParam(':every', $recurrTran->getEvery(), PDO::PARAM_INT);

            $stmt->bindParam(':every', $recurrTran->getEvery());
            $stmt->bindParam(':monthly', $recurrTran->getMonthly());
            $stmt->bindParam(':weekly', $recurrTran->getWeekly());
            $stmt->bindParam(':created_at', $recurrTran->getCreated_at());
            return $conn->lastInsertId();
            }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
        
    }

    /**
     * Updates a RecurringTransaction object as a record on recurring_transactions table in moneylover database
     * @param RecurringTransaction $recurrTran     
     */
    

    public function update(RecurringTransaction $recurrTran)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE recurring_transactions SET  amount = :amount, description = :description, repeat_type = :repeat_type, from_date = :from_date, every = :every, monthly = :monthly, weekly = :weekly, created_at = :created_at   WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':amount', $recurrTran->getAmount());                      
            $stmt->bindParam(':description', $recurrTran->getDescription(), PDO::PARAM_STR);            
            $stmt->bindParam(':repeat_type', $recurrTran->getRepeat_type(), PDO::PARAM_INT);
            $stmt->bindParam(':from_date', $recurrTran->getFrom_date());
            $stmt->bindParam(':every', $recurrTran->getEvery(), PDO::PARAM_INT);           
            $stmt->bindParam(':monthly', $recurrTran->getMonthly());
            $stmt->bindParam(':weekly', $recurrTran->getWeekly());
            $stmt->bindParam(':created_at', $recurrTran->getCreated_at());
            $stmt->bindParam(':customer_id', $$recurrTran->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':id', $recurrTran->getId());

            $stmt->execute();
            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
    /**
     * Deletes a RecurringTransaction object as a record from recurring_transactions table in moneylover database
     * @param id of a RecurringTransaction     
     */    
    public function delete($recurrTranId)
    {
        
        try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("DELETE FROM recurring_transactions WHERE id = :id");                
                $stmt->bindParam(':id', $recurrTranId);
                $stmt->execute();

                echo "SUCCESS";
            }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
        
    }

    public function getInfo($customerId)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM recurring_transactions WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
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
