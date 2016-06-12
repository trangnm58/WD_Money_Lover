<?php
    namespace main\model;


    class Debt
    {
        private $id;
        private $customer_id;
        private $debt_type;
        private $amount;
        private $paid;
        private $description;
        private $time;
        private $wallet_id;
        private $event_id;
        private $partner;
        private $created_at;

        public function getId()
        {
            return $this->id;
        }

        public function getCustomerId()
        {
            return $this->customer_id;
        }

        public function getDebtType()
        {
            return $this->debt_type;
        }

        public function getAmount()
        {
            return $this->amount;
        }

        public function getPaid()
        {
            return $this->paid;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function getTime()
        {
            return $this->time;
        }

        public function getWalletId()
        {
            return $this->wallet_id;
        }

        public function getPartner()
        {
            return $this->partner;
        }

        public function getEventId()
        {
            return $this->event_id;
        }

        public function getCreatedAt()
        {
            return $this->create_at;
        }

        public function setCustomerId($_customer_id)
        {
            $this->customer_id = $_customer_id;
        }

        public function setDebtType($_debt_type)
        {
            $this->debt_type = $_debt_type;
        }

        public function setAmount($_amount)
        {
            $this->amount = $_amount;
        }

        public function setPaid($_paid)
        {
            $this->paid = $_paid;
        }

        public function setDescription($_description)
        {
            $this->description = $_description;
        }

        public function setTime($_time)
        {
            $this->time = $_time;
        }

        public function setWalletId($_wallet_id)
        {
            $this->wallet_id = $_wallet_id;
        }

        public function setEventId($_event_id)
        {
            $this->event_id = $_event_id;
        }

        public function setPartner($_partner)
        {
            $this->partner = $_partner;
        }

        public function setCreatedAt($_created_at)
        {
            $this->created_at = $_created_at;
        }

        public function __construct(array $arrDebts)
        {
            $debts = json_encode($arrDebts);
            if (isset($debts.id) && $debts.id != null) {
                $this->id = $debts.id;
            }
            if (isset($debts.customer_id) && $debts.customer_id != null) {
                $this->customer_id = $debts.customer_id;
            }
            if (isset($debts.description)) {
                $this->description = $debts.description;
            }
            if (isset($debts.time) && $debts.time != null) {
                $this->time = $debts.time;
            }
            if (isset($debts.wallet_id) && $debts.wallet_id != null) {
                $this->wallet_id = $debts.wallet_id;
            }
            if (isset($debts.event_id) && $debts.partner != null) {
                $this->event_id = $debts.event_id;
            }
            if (isset($debts.partner)) {
                $this->partner = $debts.partner;
            }
            if (isset($debts.created_at) && $debts.created_at != null) {
                $this->create_at = $debts.created_at;
            }
        }

    }
?>