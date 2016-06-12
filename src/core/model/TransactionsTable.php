<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Transaction.php';

    class TransactionsTable
    {
        

        /**
         * insert Transaction object as a record into transactions table in moneylover database
         * @param Transaction $transaction
         * @return Id of transaction inserted
         */
      
        public function insert(Transaction $transaction)
        {
                       
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO transactions (customer_id, amount, unit_id, wallet_id, time, event_id, description, location, partner, created_at) VALUES (:customer_id, :amount, :unit_id, :wallet_id, :time, :event_id, :description, :location, :partner, :created_at)");

            $stmt->bindParam(':customer_id', $transaction->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $transaction->getAmount());
            $stmt->bindParam(':unit_id', $transaction->getUnitId(), PDO::PARAM_INT);
            $stmt->bindParam(':wallet_id', $transaction->getWalletId(), PDO::PARAM_INT);
            $stmt->bindParam(':time', $transaction->getTime());
            $stmt->bindParam(':event_id', $transaction->getEventId(), PDO::PARAM_INT);
            $stmt->bindParam(':description', $transaction->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':location', $transaction->getLocation(), PDO::PARAM_STR);
            $stmt->bindParam(':partner', $transaction->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $transaction->getCreatedAt());
                                
            $stmt->execute();
            $transactionId = $conn->lastInsertId();

            PDOData::disconnect();

            return $transactionId;
                      
        }

        /**
         * Updates a Transaction object as a record on transactions table in moneylover database
         * @param Transaction $transaction     
         */
        
        public function update(Transaction $transaction)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE transactions SET  amount =  :amount, time = :time, description = :description, location = :location, partner = :partner, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $transaction->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $transaction->getAmount());
               
            $stmt->bindParam(':time', $transaction->getTime());
                
            $stmt->bindParam(':description', $transaction->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':location', $transaction->getLocation(), PDO::PARAM_STR);
            $stmt->bindParam(':partner', $transaction->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $transaction->getCreatedAt());
                                
            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";
                
        }
        /**
         * Get info of a Transaction object as a record from transactions table in moneylover database
         * @param id of a transaction
         * @return array as json has properties: id, customer_id, amount,unit_id, wallet_id, category_id, event_id, description, location, partner, created_at
         */
        public function getTransactions($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM transactions WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
        }
    
        public function filter($transactionId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM transactions WHERE id = :id");
            $stmt->bindParam(':id', $transactionId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
        }

        /**
         * Deletes a Transaction object as a record from transactions table in moneylover database
         * @param id of a transaction    
         */
        public function delete($transactionId)
        {
                    
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM transactions WHERE id = :id");            
            $stmt->bindParam(':id', $transactionId);
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";
        }
    }
?>