<?php
    namespace main\model;

    class Category {
        private $id;
        private $name;
        private $icon;
        private $customer_id;

        // get functions
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getIcon() {
            return $this->icon;
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

        public function setIcon($_icon) {
            $this->icon = $_icon;
        }

        public function setCustomerId($_customer_id) {
            $this->customer_id = $_customer_id;
        }

        public function __construct($category) {        
            $this->id = $category['id'];
            $this->name = $category['name'];
            $this->icon = $category['icon'];
            $this->customer_id = $category['customer_id'];
        }
    }
?>