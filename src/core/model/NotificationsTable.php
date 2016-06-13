<?php
    namespace core\model;
	use \PDO;
	require_once 'src/core/model/PDOData.php';
	require_once 'src/main/model/Notification.php';

    class NotificationsTable {
        /**
         * Deletes a Notification object as a record from otifications table in moneylover database
         * @param id of a notification
         * @return boolean variable, it is true if insert into database successfully
         */

        public static function delete($notificationId)
        {
			try {
				$conn = &PDOData::connect();
				$stmt = $conn->prepare("DELETE FROM notifications WHERE id = :id");            
				$stmt->bindParam(':id', $notificationId);
				$stmt->execute();

				PDOData::disconnect();
			} catch(PDOException $e) {
                return false;
            }
            return true;
        }

        /**
         * Get info of a Notification object as a record from notifications table in moneylover database
         * @param id of a notification
         * @return array of Notification objects
         */
        public static function getNotifications($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM notifications WHERE customer_id = :customer_id ORDER BY created_at;");
            $stmt->bindParam(':customer_id', $customerId);
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