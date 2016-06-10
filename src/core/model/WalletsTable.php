<?php
namespace App\Model\Table;

use App\Model\Entity\Wallet;

/**
 * Wallets Model
 *
 */
class WalletsTable extends Table
{
    
    /**
     * insert Wallet object as a record into wallets table in moneylover database
     * @param Wallet $newWallet
     * @return Id off wallet inserted
     */
    
    public function insert(Wallet $wallet)
    {
                   
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO wallets (customer_id, name, description, icon, amount, unit_id, created_at) VALUES (:customer_id, :name, :description, :icon, :amount, :unit_id, :created_at)");

            $stmt->bindParam(':customer_id', $wallet->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $wallet->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':description', $wallet->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':icon', $wallet->getIcon(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $wallet->getAmount());
            $stmt->bindParam(':unit_id', $wallet->getUnit_id(), PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $wallet->getCreated_at());                
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }
    
    /**
     * Updates a Wallet object as a record on wallets table in moneylover database
     * @param Wallet $wallet     
     */   
    public function update(Wallet $wallet)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE wallets SET  name =  :name, description = :description, icon = :icon, amount = :amount, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $wallet->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $wallet->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':description', $wallet->getDescription(),PDO::PARAM_STR);
            $stmt->bindParam(':icon', $wallet->getIcon(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $wallet->getAmount());
            $stmt->bindParam(':unit_id', $wallet->getUnit_id());            
            $stmt->bindParam(':created_at', $wallet->getCreated_at());
            $stmt->bindParam(':id', $wallet->getId());
            $stmt->execute();

            echo "SUCCESS";
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
    }
    /**
     * Deletes a Wallet object as a record from wallets table in moneylover database
     * @param id of a wallet
     * @return boolean variable, it is true if insert into database successfully
     */    

    public function delete($walletId)
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

    /**
     * Get info of a Wallet object as a record from wallets table in moneylover database
     * @param id of a wallet
     * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
     */
     public function getInfo($customerId)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM wallets WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
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