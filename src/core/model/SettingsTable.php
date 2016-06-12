<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';
    require_once 'src/main/model/Setting.php';

    class SettingsTable
    {
        
        /**
         * insert Setting object as a record into settings table in moneylover database
         * @param Setting $setting
         * return id of setting inserted
         */    
        public function insert(Setting $setting)
        {
               
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("INSERT INTO settings (customer_id, displayed_amount, language, date_format, first_day_of_week, first_day_of_month, first_month_of_year, update_at) VALUES (:customer_id, :displayed_amount, :language, :date_format, :first_day_of_week, :first_day_of_month, :first_month_of_year, :update_at)");

            $stmt->bindParam(':customer_id', $setting->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':displayed_amount', $setting->getDisplayedAmount(), PDO::PARAM_STR);
            $stmt->bindParam(':language', $setting->getLanguage(), PDO::PARAM_STR);
            $stmt->bindParam(':date_format()', $setting->getDateFormat(), PDO::PARAM_STR);
            $stmt->bindParam(':first_day_of_week', $setting->getFirstDayOfWeek(),PDO::PARAM_INT);
            $stmt->bindParam(':first_day_of_month', $setting->getFirstDayOfMonth(),PDO::PARAM_INT);
            $stmt->bindParam(':first_month_of_year', $setting->getFirstMonthOfYear(), PDO::PARAM_INT);
            $stmt->bindParam(':update_at', $setting->getUpdateAt());
                
            $stmt->execute();

            $settingId = $conn->lastInsertId();

            PDOData::disconnect();

            return $settingId;            
        }

        /**
         * Updates a setting object as a record on settings table in moneylover database
         * @param Setting $setting    
         */
        

        public function update(Event $event)
        {
                
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("UPDATE setings SET  displayed_amount =  :displayed_amount, language = :language, date_format = :date_format, first_day_of_week = :first_day_of_week, first_day_of_month = :first_day_of_month, first_month_of_year = :first_month_of_year, update_at = :update_at WHERE customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $setting->getCustomerId(), PDO::PARAM_INT);
            $stmt->bindParam(':displayed_amount', $setting->getDisplayedAmount(), PDO::PARAM_STR);
            $stmt->bindParam(':language', $setting->getLanguage(), PDO::PARAM_STR);
            $stmt->bindParam(':date_format', $setting->getDateFormat(), PDO::PARAM_STR);
            $stmt->bindParam(':first_day_of_week', $setting->getFirstDayOfWeek(),PDO::PARAM_INT);
            $stmt->bindParam(':first_day_of_month', $setting->getFirstDayOfMonth(),PDO::PARAM_INT);
            $stmt->bindParam(':first_month_of_year', $setting->getFirstMonthOfYear(), PDO::PARAM_INT);
            $stmt->bindParam(':update_at', $setting->getUpdateAt());
            $stmt->execute();

            PDOData::disconnect();
            echo "SUCCESS";
            
        }

        /**
         * Deletes a setting object as a record from settings table in moneylover database
         * @param id of a setting     
         */
        
        public function delete($customerId)
        {
                    
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("DELETE FROM settings WHERE customer_id = :customer_id");            
            $stmt->bindParam(':id', $customerId);
            $stmt->execute();


            PDOData::disconnect();
            echo "SUCCESS";
            
            
        }

        public function getSettings($customerId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM settings WHERE customer_id = :customer_id");
            $stmt->bindParam(':customer_id', $customerId);
            $stmt->execute();

            $result = array();
            while ($row = $stmt->fetch()) {
                $result[] = $row;
            }


            PDOData::disconnect();
            return json_encode($result);            
        }

        public function filter($settingId)
        {
            $conn = &PDOData::connect();
            $stmt = $conn->prepare("SELECT * FROM settings WHERE id = :id");
            $stmt->bindParam(':id', $settingId, PDO::PARAM_INT);
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