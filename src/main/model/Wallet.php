<?php
    namespace main\model;

    class Wallet {
        private $id;
        private $customer_id;
        private $name;
        private $description;
        private $type;
        private $amount;
        private $unit_id;
        private $created_at;

        // get functions
        public function getId() {
            return $this->id;
        }

        public function getCustomerId() {
            return $this->customer_id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getType() {
            return $this->type;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function getUnitId() {
            return $this->unit_id;
        }

        public function getCreatedAt() {
            return $this->created_at;
        }

        //set functions
        public function setid($id) {
            $this->id = $id;
        }

        public function setcustomer_id($customer_id) {
            $this->customer_id = $customer_id;
        }

        public function setname($name) {
            $this->name = $name;
        }

        public function setdescription($description) {
            $this->description = $description;
        }

        public function settype($type) {
            $this->type = $type;
        }

        public function setamount($amount) {
            $this->amount = $amount;
        }

        public function setunit_id($unit_id) {
            $this->unit_id = $unit_id;
        }

        public function setcreated_at($created_at) {
            $this->created_at = $created_at;
        }


        /**
         * construct function has parameter as json
         */
        public function __construct($wallet)
        {
            $this->id = $wallet['id'];
            $this->customer_id = $wallet['customer_id'];
            $this->name = $wallet['name'];
            $this->description = $wallet['description'];
            $this->type = $wallet['type'];
            $this->amount = $wallet['amount'];
            $this->unit_id = $wallet['unit_id'];
            $this->created_at = $wallet['created_at'];
        }
    }
?>