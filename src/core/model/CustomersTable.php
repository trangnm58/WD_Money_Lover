<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';

    /**
     * Class to interact with customers table
     *
     * API
     * insert($customer = array())
     */
    class CustomersTable {
        // insert($customer = array())
        // INPUT: associative array
        // require username, email, account_id
        // HOW-TO-DO: insert a new customer record
        public static function insert($customer = array()) {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('INSERT INTO customers (account_id, username, email) VALUES (:account_id, :username, :email);');

                $stmt->bindParam(':account_id', $customer['account_id']);
                $stmt->bindParam(':username', $customer['username']);
                $stmt->bindParam(':email', $customer['email']);

                return $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }
    }
