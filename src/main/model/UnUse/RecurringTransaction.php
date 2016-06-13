<?php
    namespace main\model;

    class RecurringTransaction
    {

        private $id;
        private $customer_id;
        private $amount;
        private $unit_id;
        private $wallet_id;
        private $category_id;
        private $description;
        private $repeat_type;
        private $from_date;
        private $to_date;
        private $every;
        private $monthly;
        private $weekly;
        private $created_at;        
        

        // Get Functions
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

        public function getDescription()
        {
            return $this->description;
        }

        public function getRepeatType()
        {
            return $this->repeat_type;
        }

        public function getFromDate()
        {
            return $this->from_date;
        }

        public function getToDate()
        {
            return $this->to_date;
        }

        public function getEvery()
        {
            return $this->every;
        }
        public function getMonthly()
        {
            return $this->monthly;
        }

        public function getWeekly()
        {
            return $this->weekly;
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

        public function setDescription($_description)
        {
            $this->description = $_description;
        }

        public function setRepeatType($_repeat_id)
        {
            $this->repeat_type = $_repeat_id;
        }

        public function setFromDate($_from_date)
        {
            $this->from_date = $_from_date;
        }

        public function setToDate($_to_date)
        {
            $this->to_date = $_to_date;
        }

        public function setEvery($_every)
        {
            $this->every = $_every;
        }

        public function setMonthly($_monthly)
        {
            $this->monthly = $_monthly;
        }

        public function setWeekly($_weekly)
        {
            $this->weekly = $_weekly;
        }

        public function setCreatedAt($_created_at)
        {
            $this->created_at = $_created_at;
        }

        public function __construct(array $arrRecurTrans)
        {
            $recurringTransaction = json_encode($arrRecurTrans);
            if (isset($recurringTransaction.id) && $recurringTransaction.id != null ) {
                $this->id = $recurringTransaction.id;
            }
            if (isset($recurringTransaction.customer_id) && $recurringTransaction.customer_id != null) {
                $this->customer_id = $recurringTransaction.customer_id;
            }
            if (isset($recurringTransaction.amount) && $recurringTransaction.amount != null) {
                $this->amount = $recurringTransaction.amount;
            }
            if (isset($recurringTransaction.unit_id) && $recurringTransaction.unit_id != null) {
                $this->unit_id = $recurringTransaction.unit_id;
            }
            if (isset($recurringTransaction.wallet_id) && $recurringTransaction.wallet_id) {
                $this->wallet_id = $recurringTransaction.wallet_id;
            }
            if (isset($recurringTransaction.category_id) && $recurringTransaction.category_id != null) {
                $this->category_id = $recurringTransaction.category_id;
            }
            if (isset($recurringTransaction.description)) {
                $this->description = $recurringTransaction.description;
            }
            if (isset($recurringTransaction.repeat_type) && $recurringTransaction.repeat_type != null) {
                $this->repeat_type = $recurringTransaction.repeat_type;
            }
            if (isset($recurringTransaction.from_date)) {
                $this->from_date = $recurringTransaction.from_date;
            }
            if (isset($recurringTransaction.to_date)) {
                $this->to_date = $recurringTransaction.to_date;
            }
            if (isset($recurringTransaction.every) && $recurringTransaction.every != null) {
                $this->every = $recurringTransaction.every;
            }
            if (isset($recurringTransaction.monthly)) {
                $this->monthly = $recurringTransaction.monthly;
            }
            if (isset($recurringTransaction.weekly)) {
                $this->weekly = $recurringTransaction.weekly;
            }
            if (isset($recurringTransaction.created_at) && $recurringTransaction.created_at != null) {
                $this->created_at = $recurringTransaction.created_at;
            }
        }

    }
?>
