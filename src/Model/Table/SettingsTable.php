<?php
namespace App\Model\Table;

use App\Model\Entity\Setting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 */
class SettingsTable extends Table
{
    
    /**
     * insert Setting object as a record into settings table in moneylover database
     * @param Setting $setting
     * return id of setting inserted
     */    
    public function insert(Setting $setting)
    {
           
        $customerId = $check;
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO settings (customer_id, displayed_amount, language, date_format, first_day_of_week, first_day_of_month, first_month_of_year, update_at) VALUES (:customer_id, :displayed_amount, :language, :date_format, :first_day_of_week, :first_day_of_month, :first_month_of_year, :update_at)");

            $stmt->bindParam(':customer_id', $setting->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':displayed_amount', $setting->getDisplayed_amount(), PDO::PARAM_STR);
            $stmt->bindParam(':language', $setting->getLanguage(), PDO::PARAM_STR);
            $stmt->bindParam(':date_format()', $setting->getDate_format(), PDO::PARAM_STR);
            $stmt->bindParam(':first_day_of_week', $setting->getFirst_day_of_week(),PDO::PARAM_INT);
            $stmt->bindParam(':first_day_of_month', $setting->getFirst_day_of_month(),PDO::PARAM_INT);
            $stmt->bindParam(':first_month_of_year', $setting->getFirst_month_of_year(), PDO::PARAM_INT);
            $stmt->bindParam(':update_at', $setting->getUpdate_at());
            
            $stmt->execute();

            return $conn->lastInsertId();
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;            
    }

    /**
     * Updates a setting object as a record on settings table in moneylover database
     * @param Setting $setting    
     */
    

    public function update(Event $event)
    {
            
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("UPDATE setings SET  displayed_amount =  :displayed_amount, language = :language, date_format = :date_format, first_day_of_week = :first_day_of_week, first_day_of_month = :first_day_of_month, first_month_of_year = :first_month_of_year, update_at = :update_at WHERE customer_id = :customer_id");

            $stmt->bindParam(':customer_id', $setting->getCustomer_id(), PDO::PARAM_INT);
            $stmt->bindParam(':displayed_amount', $setting->getDisplayed_amount(), PDO::PARAM_STR);
            $stmt->bindParam(':language', $setting->getLanguage(), PDO::PARAM_STR);
            $stmt->bindParam(':date_format()', $setting->getDate_format(), PDO::PARAM_STR);
            $stmt->bindParam(':first_day_of_week', $setting->getFirst_day_of_week(),PDO::PARAM_INT);
            $stmt->bindParam(':first_day_of_month', $setting->getFirst_day_of_month(),PDO::PARAM_INT);
            $stmt->bindParam(':first_month_of_year', $setting->getFirst_month_of_year(), PDO::PARAM_INT);
            $stmt->bindParam(':update_at', $setting->getUpdate_at());
            $stmt->execute();

            echo "SUCCESS";
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            $conn = null;
    }

    /**
     * Deletes a setting object as a record from settings table in moneylover database
     * @param id of a setting     
     */
    
    public function delete($customerId)
    {
                
        try {
            $conn = new PDO("mysql:host=localhost;dbname=moneylover", 'moneylover', '12345678');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM settings WHERE customer_id = :customer_id");            
            $stmt->bindParam(':id', $customerId);
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
            $stmt = $conn->prepare("SELECT * FROM settings WHERE customer_id = :customer_id");
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
