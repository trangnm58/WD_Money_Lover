<?php
    namespace main\model;
    
    class Unit {
        private $id;
        private $name;
        private $exchange_rate;
        
        // Get Functions
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getExchangeRate() {
            return $this->exchange_rate;
        }

        // Set Functions        
        public function setName($_name) {
            $this->name;
        }

        public function setExchangeRate($_exchange_rate) {
            $this->exchange_rate = $_exchange_rate;
        }

        // Construct function
        public function __construct($unit){
            $this->id = $unit['id'];
            $this->name = $unit['name'];
            $this->exchange_rate = $unit['exchange_rate'];
        }
    }
?>