<?php
    namespace main\model;

    class Customer {
        private $id;
        private $account_id;
        private $username;
        private $email;
        private $first_name;
        private $last_name;
        private $gender;
        private $dob;

        // Get functions
        public function getId() {
            return $this->id;
        }

        public function getAccountId() {
            return $this->account_id;
        }

        public function getUserName() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getFirstName() {
            return $this->first_name;
        }

        public function getLastName() {
            return $this->last_name;
        }

        public function getFullName() {
            return $this->first_name.$this->last_name;
        }

        public function getGender() {
            return $this->gender;
        }

        public function getDob() {
            return $this->dob;
        }

        // Set functions        

        public function setAccountId($_account_id) {
            $this->account_id = $_account_id;
        }

        public function setUserName($_username) {
            $this->username = $_username;
        }

        public function setEmail($_email) {
            $this->email = $_email;
        }

        public function setFristName($_first_name) {
            $this->first_name = $_first_name;
        }

        public function setLastName($_last_name) {
            $this->last_name = $_last_name;
        }

        public function setGender($_gender) {
            $this->gender = $_gender;
        }

        public function setDob($_dob) {
            $this->dob = $_dob;
        }

        // Construct function
        public function __construct($customer) {
            $this->id = $customer['id'];
            $this->account_id = $customer['account_id'];
            $this->username = $customer['username'];
            $this->email = $customer['email'];
            $this->first_name = $customer['first_name'];
            $this->last_name = $customer['last_name'];
            $this->gender = $customer['gender'];
            $this->dob = $customer['dob'];
        }
    }
