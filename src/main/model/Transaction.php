<?php
    namespace main\model;

    class Transaction {
        private $id;
        private $customer_id;
        private $amount;
        private $unit_id;
        private $wallet_id;
        private $category_id;
        private $time;
        private $event_id;
        private $description;
        private $location;
        private $partner;
        private $created_at;

        // get Functions
        public function getId() {
            return $this->id;
        }

        public function getCustomerId() {
            return $this->customer_id;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function getUnitId() {
            return $this->unit_id;
        }

        public function getWalletId() {
            return $this->wallet_id;
        }

        public function getCategoryId() {
            return $this->category_id;
        }

        public function getTime() {
            return $this->time;
        }

        public function getEventId() {
            return $this->event_id;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getLocation() {
            return $this->location;
        }

        public function getPartner() {
            return $this->partner;
        }

        public function getCreatedAt() {
            return $this->created_at;
        }


        // Set Function
        public function setId($_id) {
            $this->id = $_id;
        }

        public function setCustomerId($_customer_id) {
            $this->customer_id = $_customer_id;
        }

        public function setAmount($_amount) {
            $this->amount = $_amount;
        }

        public function setUnitId($_unit_id) {
            $this->unit_id = $_unit_id;
        }

        public function setWalletId($_wallet_id) {
            $this->wallet_id = $_wallet_id;
        }

        public function setCategoryId($_category_id) {
            $this->category_id = $_category_id;
        }

        public function setTime($_time) {
            $this->time = $_time;
        }

        public function setEventId($_event_id) {
            $this->event_id = $_event_id;
        }

        public function setDescription($_description) {
            $this->description = $_description;
        }

        public function setLocation($_location) {
            $this->location = $_location;
        }

        public function setPartner($_partner) {
            $this->partner = $_partner;
        }

        public function setCreatedAt($_created_at) {
            $this->created_at = $_created_at;
        }


        public function __construct($transaction)
        {
            $this->id = $transaction['id'];
            $this->customer_id = $transaction['customer_id'];
            $this->amount = $transaction['amount'];
            $this->unit_id = $transaction['unit_id'];
            $this->wallet_id = $transaction['wallet_id'];
            $this->category_id = $transaction['category_id'];
            $this->time = $transaction['time'];
            $this->event_id = $transaction['event_id'];
            $this->description = $transaction['description'];
            $this->location = $transaction['location'];
            $this->partner = $transaction['partner'];
            $this->created_at = $transaction['created_at'];
        }
    }
?>
