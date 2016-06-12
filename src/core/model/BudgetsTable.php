<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Butget.php';

    class BudgetsTable
    {

        
        /**
         * insert Budget object as a record into budgets table in moneylover database
         * @param Budget $newBudget
         * @return id of budget inserted if insert into database successfully
         */    

        public function insert(Budget $budget)
        {                        
            $conn = &PDOData::connect();

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

            PDOData::disconnect();
            return $conn->lastInsertId();
                        
            

            
        }
                   

        /**
         * Updates a budget object as a record on budgets table in moneylover database
         * @param Budget $budget    
         */
      

        public function update(Budget $budget)
        {
            $conn = &PDOData::connect();
              
                    // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE budgets SET  goal =  :goal, spent = :spent, from_date = :from_date, to_date = :to_date, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");
                    
            $stmt->bindParam(':goal', $budget->getGoal());
            $stmt->bindParam(':spent', $budget->getSpent());
            $stmt->bindParam(':from_date', $budget->getFromDate());
            $stmt->bindParam(':to_date', $budget->getToDate());                                
            $stmt->bindParam(':created_at', $budget->getCreatedAt());
                    $stmt->bindParam(':customer_id', $budget->getCustomerId(), PDO::PARAM_INT);

            $stmt->execute();
            PDOData::disconnect();

            return true;
            
        }

        public function filter($BudgetId)
        {
            $conn = &PDOData::connect();            
            $stmt = $conn->prepare("SELECT * FROM budgets WHERE id = :id");
            $stmt->bindParam(':id', $BudgetId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                    
        }
        

        public function getMyBudget($customerId)
        {
            $conn = &PDOData::connect();            
            $stmt = $conn->prepare("SELECT * FROM budgets WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                    
        }

        /**
         * Deletes a budget object as a record from budgets table in moneylover database
         * @param id of a budget     
         */    
        public function delete($budgetId)
        {
        
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM budgets WHERE id = :id");                
            $stmt->bindParam(':id', $budgetId);
            $stmt->execute();

            PDOData::disconnect();
            return true;
                        
        }
    }
