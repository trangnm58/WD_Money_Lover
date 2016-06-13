<?php
    namespace core\model;
	use \PDO;
	require_once 'src/core/model/PDOData.php';
	require_once 'src/main/model/Wallet.php';

    class WalletsTable {
        
        /**
         * insert Wallet object as a record into wallets table in moneylover database
         * @param Wallet $newWallet
         * @return Id off wallet inserted
         */
        
        public function insert(Wallet $wallet)
        {
                       
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO wallets (customer_id, name, description, icon, amount, unit_id, created_at) VALUES (:customer_id, :name, :description, :icon, :amount, :unit_id, :created_at)");

            $stmt->bindParam(':customer_id', $wallet->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $wallet->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':description', $wallet->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':icon', $wallet->getIcon(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $wallet->getAmount());
            $stmt->bindParam(':unit_id', $wallet->getUnitId(), PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $wallet->getCreatedAt());                
            $stmt->execute();

            $walletId = $conn->lastInsertId();

            PDOData::disconnect();

            return $walletId;
                     
        }
        
        /**
         * Updates a Wallet object as a record on wallets table in moneylover database
         * @param Wallet $wallet     
         */   
        public function update(Wallet $wallet)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE wallets SET  name =  :name, description = :description, icon = :icon, amount = :amount, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $wallet->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $wallet->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':description', $wallet->getDescription(),PDO::PARAM_STR);
            $stmt->bindParam(':icon', $wallet->getIcon(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $wallet->getAmount());
            $stmt->bindParam(':unit_id', $wallet->getUnitId());            
            $stmt->bindParam(':created_at', $wallet->getCreatedAt());
            $stmt->bindParam(':id', $wallet->getId());
            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";
            
        }
        /**
         * Deletes a Wallet object as a record from wallets table in moneylover database
         * @param id of a wallet
         * @return boolean variable, it is true if insert into database successfully
         */    

        public function delete($walletId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM wallets WHERE id = :id");            
            $stmt->bindParam(':id', $walletId);
            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";
        }

        /**
         * Get info of a Wallet object as a record from wallets table in moneylover database
         * @param id of a wallet
         * @return array as json has properties: id, account_id, name, description, icon, amount, unit_id and created_at
         */
        public function getInfo($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM wallets WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            
            PDOData::disconnect();

            return $result;
        }

        public function filter($walletId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM wallets WHERE id = :id");
            $stmt->bindParam(':id', $walletId);
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