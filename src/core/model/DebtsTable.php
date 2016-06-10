<?php
namespace App\Model\Table;

use App\Model\Entity\Debt;

/**
 * Debts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Wallets
 * @property \Cake\ORM\Association\BelongsTo $Events
 */
class DebtsTable extends Table
{

    
    /**
     * insert Budget object as a record into budgets table in moneylover database
     * @param Budget $newBudget
     * @return id of that budget if insert into database successfully
     */
    
    public function insert(Debt $newDebt)
    {
            
        try {

            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO debts (customer_id, debt_type, amount, paid, description, time, wallet_id, event_id, partner, created_at ) VALUES (:customer_id, :debt_type, :amount, :paid, :description, :time, :wallet_id, :event_id, :partner, :created_at )");

            $stmt->bindParam(':customer_id', $newDebt->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':debt_type', $newDebt->getDebt_type(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $newDebt->getAmount());
            $stmt->bindParam(':paid', $newDebt->getPaid());
            $stmt->bindParam(':description', $newDebt->getDescription, PDO::PARAM_STR);
            $stmt->bindParam(':time', $newDebt->getTime());
            $stmt->bindParam(':wallet_id', $newDebt->getWallet_id(), PDO::PARAM_INT);
            $stmt->bindParam(':event_id', $newDebt->getEvent_id(), PDO::PARAM_INT);
            $stmt->bindParam(':partner', $newDebt->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $newDebt->getCreated_at());

            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
            
    }

    /**
     * Updates a debt object as a record on debts table in moneylover database
     * @param Debt $debt     
     */
    
    public function update(Debt $debt)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE request SET  debt_type =  :debt_type, amount = :amount, paid = :paid, description = :description, time = :time, partner = :partner, created_at = :created_at   WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $newDebt->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':debt_type', $newDebt->getDebt_type(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $newDebt->getAmount());
            $stmt->bindParam(':paid', $newDebt->getPaid());
            $stmt->bindParam(':description', $newDebt->getDescription, PDO::PARAM_STR);
            $stmt->bindParam(':time', $newDebt->getTime());            
            $stmt->bindParam(':partner', $newDebt->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $newDebt->getCreated_at());
            $stmt->execute();

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }
    /**
     * Deletes a debt object as a record from debts table in moneylover database
     * @param id of a debt     
     */    

    public function delete($debtId)
    {
        
        try {
                $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("DELETE FROM request WHERE id = :id");                
                $stmt->bindParam(':id', $debtId);
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
            $stmt = $conn->prepare("SELECT * FROM debts WHERE customer_id = :customer_id");
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
