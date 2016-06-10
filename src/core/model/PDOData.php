<?php
    namespace core\model;
    class PDOData {
        private static $conn;
        /**
        * Construct connection function
        */
        public static function &connect() {
            // Connect to database
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=moneylover', 'moneylover', '12345678');
                return self::$conn;
            } catch(PDOException $ex) { echo $ex->getMessage(); }
        }

        /**
        * Disconnect function
        */
        public static function disconnect() {
            // Disonnect to database
            try {
                self::$conn = null;
            } catch(PDOException $ex) { echo $ex->getMessage(); }
        }
    }
