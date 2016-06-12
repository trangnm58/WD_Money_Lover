<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Event.php';


    class EventsTable
    {

        /**
         * insert Event object as a record into events table in moneylover database
         * @param Event $event
         * @return id of event if insert into database successfully
         */
            

        public function insert(Event $event)
        {
                       
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO events (customer_id, name, ending_date, created_at) VALUES (:customer_id, :name, :ending_date, :created_at)");

            $stmt->bindParam(':customer_id', $event->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':ending_date', $event->getEndingDate());
            $stmt->bindParam(':created_at', $event->getCreatedAt());                
            $stmt->execute();

            $eventId = $conn->lastInsertId();

            PDOData::disconnect();
            return $eventId;
                        
        }

        /**
         * Updates a event object as a record on events table in moneylover database
         * @param Event $event     
         */    

        public function update(Event $event)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE events SET  name =  :name, ending_date = :ending_date, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $event->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':ending_date', $event->getEndingDate());
            $stmt->bindParam(':created_at', $event->getCreatedAt());
            $stmt->bindParam(':id', $event->getId());
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";
                
        }

        /**
         * Deletes a event object as a record from events table in moneylover database
         * @param id of a event     
         */    

        public function delete($eventId)
        {
                    
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM events WHERE id = :id");            
            $stmt->bindParam(':id', $eventId);
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";          
        }

        public function getEvents($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM events WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
                
        }

        public function filter($eventId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM events WHERE id = :id");
            $stmt->bindParam(':id', $eventId, PDO::PARAM_INT);
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