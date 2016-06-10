<?php
namespace App\Model\Table;

use App\Model\Entity\Unit;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Units Model
 *
 * @property \Cake\ORM\Association\HasMany $RecurringTransactions
 * @property \Cake\ORM\Association\HasMany $Transactions
 * @property \Cake\ORM\Association\HasMany $Wallets
 */
class UnitsTable extends Table
{
    
        /**
     * insert Unit object as a record into units table in moneylover database
     * @param Unit $unit
     * @return id of that unit if insert into database successfully
     */
    public function insert(Unit $unit)
    {                
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO units (name, exchange_rate) VALUES (:name, :exchange_rate)");
           
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':exchange_rate', $event->getExchange_rate());           
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }

    /**
     * Updates a unit object as a record on units table in moneylover database
     * @param Unit $unit    
     */
   
    public function update(Unit $unit)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE units SET  name =  :name, exchange_rate = :exchange_rate WHERE  id = :id ");

            $
            $stmt->bindParam(':name', $unit->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':exchange_rate', $unit->getExchange_rate());
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
     * Deletes a debt object as a record from debts table in moneylover database
     * @param id of a debt     
     */    
    public function delete($unitId)
    {
                
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM units WHERE id = :id");            
            $stmt->bindParam(':id', $unitId);
            $stmt->execute();

            echo "SUCCESS";
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
        
    }
}
