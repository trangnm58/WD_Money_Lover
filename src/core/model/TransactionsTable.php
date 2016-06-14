<?php
    namespace core\model;
	use \PDO;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Transaction.php';

    class TransactionsTable
    {
        /**
         * insert Transaction object as a record into transactions table in moneylover database
         * @param array $transaction
         * @return Id of transaction inserted
         */
        public static function insert($transaction)
        {
			try {
				$conn = &PDOData::connect();
				$stmt = $conn->prepare(
					"INSERT INTO transactions (customer_id, amount, unit_id, wallet_id, category_id, time, description)
					VALUES (:customer_id, :amount, :unit_id, :wallet_id, :category_id, :time, :description);"
				);

				$stmt->bindParam(':customer_id', $transaction["customer_id"], PDO::PARAM_INT);
				$stmt->bindParam(':amount', $transaction["amount"]);
				$stmt->bindParam(':unit_id', $transaction["unit_id"], PDO::PARAM_INT);
				$stmt->bindParam(':wallet_id', $transaction["wallet_id"], PDO::PARAM_INT);
				$stmt->bindParam(':category_id', $transaction["category_id"], PDO::PARAM_INT);
				$stmt->bindParam(':time', $transaction["time"]);
				$stmt->bindParam(':description', $transaction["description"], PDO::PARAM_STR);

				if ($stmt->execute()) {
                    return $conn->lastInsertId();
                } else {
                    return 0;
                }
			} catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
				return false;
            }
			PDOData::disconnect();
        }

        /**
         * Updates a Transaction object as a record on transactions table in moneylover database
         * @param Transaction $transaction     
         */
        public static function update(Transaction $transaction)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare(
				"UPDATE transactions SET
					amount = :amount,
					time = :time,
					description = :description,
					created_at = :created_at
				WHERE  id = :id and customer_id = :customer_id"
			);

            $stmt->bindParam(':customer_id', $transaction->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':amount', $transaction->getAmount());
            $stmt->bindParam(':time', $transaction->getTime());
            $stmt->bindParam(':description', $transaction->getDescription(), PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $transaction->getCreatedAt());

            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";
        }

        /**
         * Get info of a Transaction object as a record from transactions table in moneylover database
         * @param id of a transaction
         * @return array as json has properties: id, customer_id, amount,unit_id, wallet_id, category_id, event_id, description, location, partner, created_at
         */
        public static function getTransactions($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM transactions WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
        }

        public static function get($transactionId)
        {
			try {            
                $conn = &PDOData::connect();
                $stmt = $conn->prepare("SELECT * FROM transactions WHERE id = :id");
                $stmt->bindParam(':id', $transactionId);
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

        /**
         * Deletes a Transaction object as a record from transactions table in moneylover database
         * @param id of a transaction    
         */
        public static function delete($transactionId)
        {
			try {
				$conn = &PDOData::connect();
				$stmt = $conn->prepare("DELETE FROM transactions WHERE id = :id");  
				$stmt->bindParam(':id', $transactionId);
				$stmt->execute();

				PDOData::disconnect();
			} catch(PDOException $e) {
                return false;
            }
            return true;
        }
		
		/**
		 * Get all transactions in month-year
		 */
		public static function getTransactionsByMonth($customerId, $month, $year) {
			$conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM transactions WHERE customer_id = :customer_id AND MONTH(time) = :month AND YEAR(time) = :year ORDER BY time DESC;");

			$stmt->bindParam(':customer_id', $customerId, PDO::PARAM_INT);
            $stmt->bindParam(':month', $month, PDO::PARAM_INT);
			$stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->execute();

			$result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return $result;
		}
    }
?>
