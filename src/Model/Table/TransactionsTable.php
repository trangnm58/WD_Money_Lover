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
     * insert Transaction object as a record into transactions table in moneylover database
     * @param Transaction $transaction
     * @return Id of transaction inserted
     */
  
    public function insert(Transaction $transaction)
    {
                   
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO transactions (customer_id, amount, unit_id, wallet_id, time, event_id, description, location, partner, created_at) VALUES (:customer_id, :amount, :unit_id, :wallet_id, :time, :event_id, :description, :location, :partner, :created_at)");

            $stmt->bindParam(':customer_id', $transaction->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $transaction->getAmount());
            $stmt->bindParam(':unit_id', $transaction->getUnit_id(), PDO::PARAM_INT);
            $stmt->bindParam(':wallet_id', $transaction->getWallet_id(), PDO::PARAM_INT);
            $stmt->bindParam(':time', $transaction->getTime());
            $stmt->bindParam(':event_id', $transaction->getEvent_id(), PDO::PARAM_INT);
            $stmt->bindParam(':description', $transaction->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':location', $transaction->getLocation(), PDO::PARAM_STR);
            $stmt->bindParam(':partner', $transaction->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $transaction->getCreated_at());
                            
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }

    /**
     * Updates a Transaction object as a record on transactions table in moneylover database
     * @param Transaction $transaction     
     */
    
    public function update(Transaction $transaction)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE transactions SET  amount =  :amount, time = :time, description = :description, location = :location, partner = :partner, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $transaction->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $transaction->getAmount());
            
           
            $stmt->bindParam(':time', $transaction->getTime());
            
            $stmt->bindParam(':description', $transaction->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':location', $transaction->getLocation(), PDO::PARAM_STR);
            $stmt->bindParam(':partner', $transaction->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $transaction->getCreated_at());
                            
            $stmt->execute();
            echo "SUCCESS";
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
    }
    /**
     * Get info of a Transaction object as a record from transactions table in moneylover database
     * @param id of a transaction
     * @return array as json has properties: id, customer_id, amount,unit_id, wallet_id, category_id, event_id, description, location, partner, created_at
     */
    public function getInfo($customerId)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM transactions WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            echo json_encode($result);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
            
    }
}

    /**
     * Deletes a Transaction object as a record from transactions table in moneylover database
     * @param id of a transaction    
     */
    public function delete($transactionId)
    {
                
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM transactions WHERE id = :id");            
            $stmt->bindParam(':id', $transactionId);
            $stmt->execute();

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
        
    }
    }
}
