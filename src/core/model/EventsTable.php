<?php
namespace App\Model\Table;

use App\Model\Entity\Event;


/**
 * Events Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Debts
 * @property \Cake\ORM\Association\HasMany $Transactions
 */
class EventsTable extends Table
{

    

    /**
     * insert Event object as a record into events table in moneylover database
     * @param Event $event
     * @return id of event if insert into database successfully
     */
        

    public function insert(Event $event)
    {
                   
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO events (customer_id, name, ending_date, created_at) VALUES (:customer_id, :name, :ending_date, :created_at)");

            $stmt->bindParam(':customer_id', $event->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':ending_date', $event->getEnding_date());
            $stmt->bindParam(':created_at', $event->getCreated_at());                
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }

    /**
     * Updates a event object as a record on events table in moneylover database
     * @param Event $event     
     */    

    public function update(Event $event)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE events SET  name =  :name, ending_date = :ending_date, created_at = :created_at WHERE  id = :id and customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $event->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':ending_date', $event->getEnding_date());
            $stmt->bindParam(':created_at', $event->getCreated_at());
            $stmt->bindParam(':id', $event->getId());
            $stmt->execute();

            echo "SUCCESS";
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
    }

    /**
     * Deletes a event object as a record from events table in moneylover database
     * @param id of a event     
     */    

    public function delete($eventId)
    {
                
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM events WHERE id = :id");            
            $stmt->bindParam(':id', $eventId);
            $stmt->execute();

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
        
    }

    public function getInfo($customerId)
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM events WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            echo json_encode($result);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
            
    }
}
