<?php
    namespace main\model;

    class Customer {
        private $id;
        private $username;
        private $email;
        private $name;
        private $gender;
        private $dob;
        private $default_wallet;
        private $address;
        private $city;
        private $country;
        private $phone;
        private $university;
        private $highschool;
        private $job;
        private $company;

        // Get functions
        public function getId() {
            return $this->id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getName() {
            return $this->name;
        }

        public function getGender() {
            return $this->gender;
        }

        public function getDob() {
            return $this->dob;
        }

        public function getdefaultWallet() {
            return $this->default_wallet;
        }

        public function getAddress() {
            return $this->address;
        }

        public function getCity() {
            return $this->city;
        }

        public function getCountry() {
            return $this->country;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function getUniversity() {
            return $this->university;
        }

        public function getHighschool() {
            return $this->highschool;
        }

        public function getJob() {
            return $this->job;
        }

        public function getCompany() {
            return $this->company;
        }

        // Set functions        
        public function setId($_id) {
            $this->id = $_id;
        }

        public function setUsername($_username) {
            $this->username = $_username;
        }

        public function setEmail($_email) {
            $this->email = $_email;
        }

        public function setName($_name) {
            $this->name = $_name;
        }

        public function setGender($_gender) {
            $this->gender = $_gender;
        }

        public function setDob($_dob) {
            $this->dob = $_dob;
        }

        public function setDefaultWallet($_default_wallet) {
            $this->default_wallet = $_default_wallet;
        }

        public function setAddress($_address) {
            $this->address = $_address;
        }

        public function setCity($_city) {
            $this->city = $_city;
        }

        public function setCountry($_country) {
            $this->country = $_country;
        }

        public function setphone($_phone) {
            $this->phone = $_phone;
        }

        public function setUniversity($_university) {
            $this->university = $_university;
        }

        public function setHighschool($_highschool) {
            $this->highschool = $_highschool;
        }

        public function setJob($_job) {
            $this->job = $_job;
        }

        public function setCompany($_company) {
            $this->company = $_company;
        }

        // Construct function
        public function __construct($customer) {
            $this->id = $customer['id'];
            $this->username = $customer['username'];
            $this->email = $customer['email'];
            $this->name = $customer['name'];
            $this->gender = $customer['gender'];
            $this->dob = $customer['dob'];
            $this->default_wallet = $customer['default_wallet'];
            $this->address = $customer['address'];
            $this->city = $customer['city'];
            $this->country = $customer['country'];
            $this->phone = $customer['phone'];
            $this->university = $customer['university'];
            $this->highschool = $customer['highschool'];
            $this->job = $customer['job'];
            $this->company = $customer['company'];
        }
    }
