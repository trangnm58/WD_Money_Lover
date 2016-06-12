<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Customer.php';

    class CustomersTable extends Table
    {

    	/**
         * insert Customer object as a record into customers table in moneylover database
         * @param Customer $newCustomer
         * @return id of that customer if insert into database successfully
         */   

        public function insert(Customer $newCustomer)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO request (account_id, username, email, first_name, last_name, gender, dob) VALUES (:account_id, :username, :email, :first_name, :last_name, :gender, :dob)");

            $stmt->bindParam(':account_id', $newCustomer->getAccountId(),PDO::PARAM_INT);
            $stmt->bindParam(':username', $newCustomer->getUsername(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $newCustomer->getEmail(),PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $newCustomer->getFirstName(),PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $newCustomer->getLastName(), PDO::PARAM_STR);
            $stmt->bindParam(':gender', $newCustomer->getGender(), PDO::PARAM_INT);
            $stmt->bindParam(':dob', $newCustomer->getDob());

            $stmt->execute();
            $customerId = $conn->lastInsertId();

            PDOData::disconnect();

            return $customerId;
                     
        }
        /**
         * Updates a Customer object as a record on customers table in moneylover database
         * @param Customer $newCustomer     
         */
        
        public function update(Customer $customer)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE request SET  username =  :username, email = :email, first_name = :first_name, last_name = :last_name, gender = :gender, dob = :dob WHERE  id = :id ");
                    
            $stmt->bindParam(':id', $customer->getId(), PDO::PARAM_INT);
            $stmt->bindParam(':username', $customer->getUsername(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $customer->getEmail(),PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $customer->getFirstName(),PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $customer->getLastName(), PDO::PARAM_STR);
            $stmt->bindParam(':gender', $customer->getGender(), PDO::PARAM_INT);
            $stmt->bindParam(':dob', $customer->getDob());
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";       
        }

        /**
         * Deletes a Wallet object as a record from wallets table in moneylover database
         * @param id of a customer     
         */
        public function delete($accountId)
        {           
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM customers WHERE account_id = :account_id");                
            $stmt->bindParam(':account_id', $accountId, PDO::PARAM_INT);
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";        
        }

        /**
         * Get info of a Wallet object as a record from wallets table in moneylover database
         * @param id of a customer     
         */

        public function getCustomers($accountId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM customers WHERE account_id = :account_id");
            $stmt->bindParam(':account_id', $accountId, PDP::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);            
        }
        public function filter($customerId)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM customers WHERE id = :id");
            $stmt->bindParam(':id', $customerId, PDP::PARAM_INT);
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