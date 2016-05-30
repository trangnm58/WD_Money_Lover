<?php
namespace App\Model\Table;

use App\Model\Entity\Customer;

class CustomersTable extends Table
{

	/**
     * insert Customer object as a record into customers table in moneylover database
     * @param Customer $newCustomer
     * @return id of that customer if insert into database successfully
     */   

    public function insert(Customer $newCustomer)
    {
        
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO request (account_id, username, email, first_name, last_name, gender, dob) VALUES (:account_id, :username, :email, :first_name, :last_name, :gender, :dob)");

            $stmt->bindParam(':account_id', $newCustomer->getAccount_Id(),PDO::PARAM_INT);
            $stmt->bindParam(':username', $newCustomer->getUsername(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $newCustomer->getEmail(),PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $newCustomer->getFirst_name(),PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $newCustomer->getLast_name(), PDO::PARAM_STR);
            $stmt->bindParam(':gender', $newCustomer->getGender(), PDO::PARAM_INT);
            $stmt->bindParam(':dob', $newCustomer->getDob());

            $stmt->execute();

            return $conn->lastInsertId();
            }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $conn = null;            
    }
    /**
     * Updates a Customer object as a record on customers table in moneylover database
     * @param Customer $newCustomer     
     */
    
    public function update(Customer $customer)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE request SET  username =  :username, email = :email, first_name = :first_name, last_name = :last_name, gender = :gender, dob = :dob WHERE  id = :id ");
                
            $stmt->bindParam(':id', $customer->getId(), PDO::PARAM_INT);
            $stmt->bindParam(':username', $customer->getUsername(), PDO::PARAM_STR);
            $stmt->bindParam(':email', $customer->getEmail(),PDO::PARAM_STR);
            $stmt->bindParam(':first_name', $customer->getFirst_name(),PDO::PARAM_STR);
            $stmt->bindParam(':last_name', $customer->getLast_name(), PDO::PARAM_STR);
            $stmt->bindParam(':gender', $customer->getGender(), PDO::PARAM_INT);
            $stmt->bindParam(':dob', $customer->getDob());

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }

    /**
     * Deletes a Wallet object as a record from wallets table in moneylover database
     * @param id of a customer     
     */
    public function delete($accountId)
    {           
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM customers WHERE account_id = :account_id");                
            $stmt->bindParam(':account_id', $accountId, PDO::PARAM_INT);
            $stmt->execute();

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
        }
    }

    /**
     * Get info of a Wallet object as a record from wallets table in moneylover database
     * @param id of a customer     
     */

    public function getInfo($accountId)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM customers WHERE account_id = :account_id");
            $stmt->bindParam(':account_id', $accountId, PDP::PARAM_INT);
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
