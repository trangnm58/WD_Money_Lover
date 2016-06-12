<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/RecurringTransaction.php';

    /**
     * RecurringTransactions Model
     *
     */
    class RecurringTransactionsTable
    {

        

        /**
         * insert RecurringTransaction object as a record into recurring_transactions table in moneylover database
         * @param RecurringTransaction $recurrTran
         * @return id of that recurringtransaction if insert into database successfully
         */
      
        public function insert(RecurringTransaction $recurrTran)
        {
            
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO recurring_transactions (customer_id, amount, unit_id, wallet_id, category_id, description, repeat_type, from_date, to_date, every, monthly, weekly, created_at) VALUES (:customer_id, :amount, :unit_id, :wallet_id, :category_id, :description, :repeat_type, :from_date, :to_date, :every, :monthly, :weekly, :created_at)");

                
    		$stmt->bindParam(':customer_id', $$recurrTran->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $recurrTran->getAmount());
            $stmt->bindParam(':unit_id', $recurrTran->getUnitId(), PDO::PARAM_INT);
            $stmt->bindParam(':wallet_id', $recurrTran->getWalletId(), PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $recurrTran->getCategoryId(), PDO::PARAM_INT);
            $stmt->bindParam(':description', $recurrTran->getDescription(), PDO::PARAM_STR);
            

            $stmt->bindParam(':repeat_type', $recurrTran->getRepeatType(), PDO::PARAM_INT);
            $stmt->bindParam(':from_date', $recurrTran->getFromDate());
            $stmt->bindParam(':every', $recurrTran->getEvery(), PDO::PARAM_INT);

            $stmt->bindParam(':every', $recurrTran->getEvery());
            $stmt->bindParam(':monthly', $recurrTran->getMonthly());
            $stmt->bindParam(':weekly', $recurrTran->getWeekly());
            $stmt->bindParam(':created_at', $recurrTran->getCreatedAt());
            $stmt->execute();

            $recurTranId = $conn->lastInsertId();

            PDOData::disconnect();
            return $recurTranId;
            
        }

        /**
         * Updates a RecurringTransaction object as a record on recurring_transactions table in moneylover database
         * @param RecurringTransaction $recurrTran     
         */
        

        public function update(RecurringTransaction $recurrTran)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE recurring_transactions SET  amount = :amount, description = :description, repeat_type = :repeat_type, from_date = :from_date, every = :every, monthly = :monthly, weekly = :weekly, created_at = :created_at   WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':amount', $recurrTran->getAmount());                      
            $stmt->bindParam(':description', $recurrTran->getDescription(), PDO::PARAM_STR);            
            $stmt->bindParam(':repeat_type', $recurrTran->getRepeatType(), PDO::PARAM_INT);
            $stmt->bindParam(':from_date', $recurrTran->getFromDate());
            $stmt->bindParam(':every', $recurrTran->getEvery(), PDO::PARAM_INT);           
            $stmt->bindParam(':monthly', $recurrTran->getMonthly());
            $stmt->bindParam(':weekly', $recurrTran->getWeekly());
            $stmt->bindParam(':created_at', $recurrTran->getCreatedAt());
            $stmt->bindParam(':customer_id', $$recurrTran->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':id', $recurrTran->getId());

            $stmt->execute();
            
            PDOData::disconnect(); 
            echo "SUCCESS";           
        }
        /**
         * Deletes a RecurringTransaction object as a record from recurring_transactions table in moneylover database
         * @param id of a RecurringTransaction     
         */    
        public function delete($recurrTranId)
        {
            
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM recurring_transactions WHERE id = :id");                
            $stmt->bindParam(':id', $recurrTranId);
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";
        }

        public function getRecurringTransactions($customerId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM recurring_transactions WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();

            return json_encode($result);
                    
        }

        public function filter($recurTranId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM recurring_transactions WHERE id = :id");
            $stmt->bindParam(':id', $recurTranId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();

            return json_encode($result);
                    
        }
    }
?>