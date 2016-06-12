<?php
    namespace main\model;
    
    class Unit
    {

        private $id;
        private $name;
        private $exchange_rate;
        
        // Get Functions
        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getExchangeRate()
        {
            return $this->exchange_rate;
        }

        // Set Functions        
        public function setName($_name)
        {
            $this->name;
        }

        public function setExchangeRate($_exchange_rate)
        {
            $this->exchange_rate = $_exchange_rate;
        }

        // Construct function
        public function __construct(array $arrUnit)
        {
            $unit = json_encode($arrUnit);
            if (isset($unit.id) &&unit.id != null) {
                $this->id = $unit.id;
            }
            if (isset($unit.name) && $unit.name != null) {
                $this->name = $unit.name;
            }
            if (isset($unit.exchange_rate) && $unit.exchange_rate != null) {
                $this->exchange_rate = $unit.exchange_rate;
            }
        }

    }
?>