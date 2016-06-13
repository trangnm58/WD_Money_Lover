<?php
    namespace main\model;

    class Category {
        private $id;
        private $name;
        private $type;
        private $customer_id;

        // get functions
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getType() {
            return $this->type;
        }

        public function getCustomerId() {
            return $this->customer_id;
        }

        // Set function
        public function setId($id) {
            $this->id = $id;
        }

        public function setName($_name) {
            $this->name = $_name;
        }

        public function setType($_type) {
            $this->type = $_type;
        }

        public function setCustomerId($_customer_id) {
            $this->customer_id = $_customer_id;
        }

        public function __construct($category) {        
            $this->id = $category['id'];
            $this->name = $category['name'];
            $this->type = $category['type'];
            $this->customer_id = $category['customer_id'];
        }
    }
?>