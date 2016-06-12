<?php

    namespace main\model;
    class Account extends Entity
    {
        private $id;
        private $username;
        private $email;
        private $password;
        private $created_at;
        private $tokenhash;
        private $activate;

        // get Functions
        public function getId()
        {
            return $this->id;
        }

        public function getUserName()
        {
            return $this->username;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getCreatedAt()
        {
            return $this->created_at;
        }

        public function getTokenHash()
        {
            return $this->tokenhash;
        }
        
        public function getActivate()
        {
            return $this->activate;
        }


        // set Function
        public function setUserName($_username)
        {
            $this->username = $_username;
        }

        public function setEmail($_email)
        {
            $this->email = $_email;
        }

        public function setPassWord($_password)
        {
            $this->password = $_password;
        }

        public function setCreatedAt($_created_at)
        {
            $this->created_at = $_created_at;
        }

        public function setTokenHash($_tokenhash)
        {
            $this->tokenhash = $_tokenhash;
        }

        public function setActivate($_activate)
        {
            $this->activate = $_activate;
        }
    }
?>