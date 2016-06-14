<?php
    namespace core\model;
	use \PDO;
	require_once 'src/core/model/PDOData.php';	

    class WalletsTable {
        
        /**
         * insert Wallet object as a record into wallets table in moneylover database
         * @param Wallet $newWallet
         * @return Id off wallet inserted
         */
        
        public static function insert($wallet)
        {
            try {

                $conn = &PDOData::connect();
                $stmt = $conn->prepare('INSERT INTO wallets (customer_id, name, description, type, amount, unit_id) VALUES (:customer_id, :name, :description, :type, :amount, :unit_id);');
                $stmt->bindParam(':customer_id', $wallet["customer_id"]);
                $stmt->bindParam(':name', $wallet["name"]);
                $stmt->bindParam(':description', $wallet["description"]);
                $stmt->bindParam(':type', $wallet["type"]);
                $stmt->bindParam(':amount', $wallet["amount"]);
                $stmt->bindParam(':unit_id', $wallet["unit_id"]);
                if ($stmt->execute()) {
                    return $conn->lastInsertId();
                } else {
                    return  0;
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();                     
        }
        
        /**
         * Updates a Wallet object as a record on wallets table in moneylover database
         * @param Wallet $wallet     
         */   
        public static function update($wallet, $id)
        {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare("UPDATE wallets SET  name =  :name, description = :description, icon = :icon, amount = :amount, created_at = :created_at WHERE  id = :id ");
                
                $stmt->bindParam(':name', $wallet["name"]);
                $stmt->bindParam(':description', $wallet["description"]);
                $stmt->bindParam(':icon', $wallet["icon"]);
                $stmt->bindParam(':amount', $wallet["amount"]);
                $stmt->bindParam(':unit_id', $wallet["unit_id"]);                            
                $stmt->bindParam(':id', $id);
                return $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }
        /**
         * Deletes a Wallet object as a record from wallets table in moneylover database
         * @param id of a wallet
         * @return boolean variable, it is true if insert into database successfully
         */    

        public static function delete($walletId)
        {

            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare("DELETE FROM wallets WHERE id = :id");            
                $stmt->bindParam(':id', $walletId);
                if ($stmt->execute()) {
                    echo "SUCCESS";
                }else {
                    echo "FAILED";
                }                             
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        /**
         * Get info of a Wallet object as a record from wallets table in moneylover database
         * @param id of a wallet
         * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
         */
        public static function getWallets($customerId ='')
        {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare("SELECT * FROM wallets WHERE customer_id = :customer_id");
                $stmt->bindParam(':customer_id', $customerId);
                if($stmt->execute()) {
                    $result = array();
                    if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
                        return $result;
                       // $text = $row['name'];
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

        public static function get($id = '') {
            try {            
                $conn = &PDOData::connect();
                $stmt = $conn->prepare("SELECT * FROM wallets WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->execute();

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

    }
?>