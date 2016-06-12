<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Debt.php';

    class DebtsTable
    {

        
        /**
         * insert Budget object as a record into budgets table in moneylover database
         * @param Budget $newBudget
         * @return id of that budget if insert into database successfully
         */
        
        public function insert(Debt $newDebt)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO debts (customer_id, debt_type, amount, paid, description, time, wallet_id, event_id, partner, created_at ) VALUES (:customer_id, :debt_type, :amount, :paid, :description, :time, :wallet_id, :event_id, :partner, :created_at )");

            $stmt->bindParam(':customer_id', $newDebt->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':debt_type', $newDebt->getDebtType(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $newDebt->getAmount());
            $stmt->bindParam(':paid', $newDebt->getPaid());
            $stmt->bindParam(':description', $newDebt->getDescription, PDO::PARAM_STR);
            $stmt->bindParam(':time', $newDebt->getTime());
            $stmt->bindParam(':wallet_id', $newDebt->getWalletId(), PDO::PARAM_INT);
            $stmt->bindParam(':event_id', $newDebt->getEventId(), PDO::PARAM_INT);
            $stmt->bindParam(':partner', $newDebt->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $newDebt->getCreatedAt());

            $stmt->execute();
            $newDebtId = $conn->lastInsertId();

            PDOData::disconnect();
            return $newDebtId;
        }

        /**
         * Updates a debt object as a record on debts table in moneylover database
         * @param Debt $debt     
         */
        
        public function update(Debt $debt)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE request SET  debt_type =  :debt_type, amount = :amount, paid = :paid, description = :description, time = :time, partner = :partner, created_at = :created_at   WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $newDebt->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':debt_type', $newDebt->getDebtType(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $newDebt->getAmount());
            $stmt->bindParam(':paid', $newDebt->getPaid());
            $stmt->bindParam(':description', $newDebt->getDescription, PDO::PARAM_STR);
            $stmt->bindParam(':time', $newDebt->getTime());            
            $stmt->bindParam(':partner', $newDebt->getPartner(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $newDebt->getCreatedAt());
            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";            
        }
        /**
         * Deletes a debt object as a record from debts table in moneylover database
         * @param id of a debt     
         */    

        public function delete($debtId)
        {
            
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM request WHERE id = :id");                
            $stmt->bindParam(':id', $debtId);
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";
            
            
        }


        public function getDebts($customerId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM debts WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();

            return json_encode($result);
                    
        }

        public function filter($debtId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM debts WHERE id = :id");
            $stmt->bindParam(':id', $debtId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();

            return json_encode($result);
                    
        }
    }
