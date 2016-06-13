<?php
    namespace core\model;
	use \PDO;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Unit.php';

    class UnitsTable {
        /**
         * Get Unit object as a record from units table in moneylover database      
		 * @param id of a customer
         * @return Unit object
         */
        public static function getUnits()
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM units");
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return $result;
        }


        /**
         * insert Unit object as a record into units table in moneylover database
         * @param Unit $unit
         * @return id of that unit if insert into database successfully
         */
        public static function insert(Unit $unit)
        {                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO units (name, exchange_rate) VALUES (:name, :exchange_rate)");
               
            $stmt->bindParam(':name', $event->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':exchange_rate', $event->getExchange_rate());           
            $stmt->execute();

            $unitId = $conn->lastInsertId();
            PDOData::disconnect();

            return $unitId;
        }

        public static function filter($unitId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM units WHERE id = :id");
            $stmt->bindParam(':id', $unitId, PDO::PARAM_INT);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }

            PDOData::disconnect();
            return json_encode($result);
        }

        /**
         * Updates a unit object as a record on units table in moneylover database
         * @param Unit $unit    
         */
       
        public static function update(Unit $unit)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE units SET  name =  :name, exchange_rate = :exchange_rate WHERE  id = :id ");

            $stmt->bindParam(':name', $unit->getName(),PDO::PARAM_STR);
            $stmt->bindParam(':exchange_rate', $unit->getExchangeRate());
            $stmt->bindParam(':id', $event->getId());
            $stmt->execute();

            PDOData::disconnect();

            echo "SUCCESS";
        }

        /**
         * Deletes a debt object as a record from debts table in moneylover database
         * @param id of a debt     
         */    
        public static function delete($unitId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM units WHERE id = :id");            
            $stmt->bindParam(':id', $unitId);
            $stmt->execute();
            PDOData::disconnect();

            echo "SUCCESS";
        }
    }
?>