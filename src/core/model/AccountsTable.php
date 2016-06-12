<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Account.php';

    /**
     * Class to interact with accounts table
     * insert
     * get
     * filter
     * update
     * delete
     */
    class AccountsTable
    {
        // insert
        public function insert(Account $account)
        {                        
            $conn = &PDOData::connect();

                // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO accounts (username, email, password, created_at,tokenhash, activate) VALUES (:username, :email, :password, :created_at,:tokenhash, :activate)");
           $stmt->bindParam(':username', $account->getUserName(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $account->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':password', $account->getPassword(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $account->getCreatedAt());
            $stmt->bindParam(':tokenhash', $account->getTokenHash(), PDO::PARAM_STR);
            $stmt->bindParam(':activate', $account->getActivate(), PDO::PARAM_INT);
            $stmt->execute();

            PDOData::disconnect();
            return $conn->lastInsertId();
        }
        // get

        public function getAccount($customerId)
        {
            $conn = &PDOData::connect();            
            $stmt = $conn->prepare("SELECT * FROM accounts WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                    
        }
        // filter
        public function filter($accountId)
        {
            $conn = &PDOData::connect();            
                // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM budgets WHERE id = :id");
            $stmt->bindParam(':id', $accountId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                    
        }
        // update
        public function update(Account $account)
        {
            $conn = &PDOData::connect();

            $stmt = $conn->prepare("UPDATE accounts SET  username =  :username, email = :email, password = :password, tokenhash = :tokenhash, activate = :activate WHERE  id = :id and customer_id = :customer_id");
                    
           $stmt->bindParam(':username', $account->getUserName(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $account->getEmail(), PDO::PARAM_STR);
            $stmt->bindParam(':password', $account->getPassword(), PDO::PARAM_STR);            
            $stmt->bindParam(':tokenhash', $account->getTokenHash(), PDO::PARAM_STR);
            $stmt->bindParam(':activate', $account->getActivate(), PDO::PARAM_INT);
            $stmt->execute();

            PDOData::disconnect();

            return true;
            
        }
        // delete
        public function delete($accountId)
        {
        
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM accounts WHERE id = :id");                
            $stmt->bindParam(':id', $accountId);
            $stmt->execute();

            PDOData::disconnect();
            return true;             
        }
    }
