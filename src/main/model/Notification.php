<?php
    namespace main\model;

    class Notification { 
        private $id;
        private $type;
        private $customer_id;
        private $detail;
        private $created_at;

        // get functions
        public function getId() {
            return $this->id;
        }

        public function getType() {
            return $this->type;
        }

        public function getCustomerId() {
            return $this->customer_id;
        }

        public function getDetail() {
            return $this->detail;
        }

        public function getCreatedAt() {
            return $this->created_at;
        }

        //set functions
        public function setId($_id) {
            $this->id = $_id;
        }

        public function setType($_type) {
            $this->type = $_type;
        }

        public function setCustomerId($_customer_id) {
            $this->customer_id = $_customer_id;
        }

        public function setDetail($_detail) {
            $this->detail = $_detail;
        }

        public function setCreatedAt($_created_at) {
            $this->created_at = $_created_at;
        }

        /**
         * construct function has parameter as json
         */
        public function __construct($notification) {
            $this->id = $notification['id'];
            $this->type = $notification['type'];
            $this->customer_id = $notification['customer_id'];
            $this->detail = $notification['detail'];
            $this->created_at = $notification['created_at'];
        }
    }
?>