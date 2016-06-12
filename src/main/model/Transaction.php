<?php
    namespace main\model;


    class Transaction
    {

        private $id;
        private $customer_id;
        private $amount;
        private $unit_id;
        private $wallet_id;
        private $time;
        private $event_id;
        private $description;
        private $location;
        private $partner;
        private $created_at;

        // get Functions
        public function getId()
        {
            return $this->id;
        }

        public function getCustomerId()
        {
            return $this->customer_id;
        }

        public function getAmount()
        {
            return $this->amount;
        }

        public function getUnitId()
        {
            return $this->unit_id;
        }

        public function getWalletId()
        {
            return $this->wallet_id;
        }

        public function getCategoryId()
        {
            return $this->category_id;
        }

        public function getTime()
        {
            return $this->time;
        }

        public function getEventId()
        {
            return $this->event_id;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getLocation()
        {
            return $this->partner;
        }

        public function getCreatedAt()
        {
            return $this->created_at;
        }

        // Set Function        

        public function setCustomerId($_customer_id)
        {
            $this->customer_id = $_customer_id;
        }

        public function setAmount($_amount)
        {
            $this->amount = $_amount;
        }

        public function setUnitId($_unit_id)
        {
            $this->unit_id = $_unit_id;
        }

        public function setWalletId($_wallet_id)
        {
            $this->wallet_id = $_wallet_id;
        }

        public function setCategoryId($_category_id)
        {
            $this->category_id = $_category_id;
        }

        public function time($_time)
        {
            $this->time - $_time;
        }

        public function setEventId($_event_id)
        {
            $this->event_id = $_event_id;
        }

        public function setDescription($_description)
        {
            $this->description = $_description;
        }

        public function setLocation($_location)
        {
            $this->location = $_location;
        }

        public function setPartner($_partner)
        {
            $this->partner = $_partner;        
        }

        public function setCreateAt($_created_at)
        {
            $this->created_at = $_created_at;        
        }

        public function __construct(array $arrTransaction)
        {
            $transaction = json_encode($arrTransaction);

            if (isset($transaction.id) && $transaction.id != null) {
                $this->id = $transaction.id;
            }
            if (isset($transaction.customer_id) && $transaction.customer_id != null) {
                $this->customer_id = $category.customer_id;
            }
            if (isset($transaction.unit_id) && $transaction.unit_id != null) {
                $this->unit_id = $transaction.unit_id;
            }
            if (isset($transaction.wallet_id) && $transaction.wallet_id != null) {
                $this->wallet_id = $transaction.wallet_id;
            }
            if (isset($transaction.category_id) && $transaction.category_id != null) {
                $this->customer_id = $transaction.category_id;
            }
            if (isset($transaction.time) && $transaction.time != null) {
                $this->time = $transaction.time;
            }
            if (isset($transaction.event_id) && $transaction.event_id != null) {
                $this->event_id = $transaction.event_id;
            }
            if (isset($transaction.description)) {
                $this->description = $transaction.description;
            }
            if (isset($transaction.location)) {
                $this->location = $transaction.location;
            }
            if (isset($transaction.partner)) {
                $this->partner = $transaction.partner;
            }
        }
        
    }
?>
