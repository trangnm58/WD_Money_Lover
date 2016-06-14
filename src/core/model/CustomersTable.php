<?php
    namespace core\model;
    use \PDO;
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
                $stmt = $conn->prepare('INSERT INTO customers (id, username, email) VALUES (:id, :username, :email);');

                $stmt->bindParam(':id', $customer['id']);
                $stmt->bindParam(':username', $customer['username']);
                $stmt->bindParam(':email', $customer['email']);

                return $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // get($id = '')
        // INPUT: $id is id of customer want to get
        // HOW-TO-DO: iget customer data
        // OUTPUT: associative array
        public static function get($id = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('SELECT * FROM customers WHERE id = :id;');

                $stmt->bindParam(':id', $id);

                if ($stmt->execute()) {
                    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        return $result;
                    } else {
                        return array();
                    }
                } else {
                    return array();
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // updateBacicInformation($info, $id)
        // INPUT: $id is id of customer want to update
        // $info has name, dob, gender
        // HOW-TO-DO: update this basic information
        // OUTPUT: boolean success or not
        public static function updateBacicInformation($info, $id) {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('UPDATE customers AS c SET name=IFNULL(:name, c.name), gender=IFNULL(:gender, c.gender), dob=IFNULL(:dob, c.dob) WHERE id = :id;');

                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':name', $info['name']);
                $stmt->bindParam(':gender', $info['gender']);
                $stmt->bindParam(':dob', $info['dob']);

                return $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }
    }
