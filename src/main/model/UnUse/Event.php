<?php
    namespace main\model;


    class Event
    {
        private $id;
        private $customer_id;
        private $name;
        private $ending_date;
        private $created_at;        

        // Get Functions
        public function getId()
        {
            return $this->id;
        }

        public function getcustomerId()
        {
            return $this->customer_id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getEndingDate()
        {
            return $this->ending_date;
        }

        public function getCreatedAt()
        {
            return $this->created_at;
        }

        // Set Functions        

        public function setCustomerId($_customer_id)
        {
            $this->customer_id = $_customer_id;
        }

        public function setName($_name)
        {
            $this->name = $_name;
        }

        public function setEndingDate($_ending_date)
        {
            $this->ending_date = $_ending_date;
        }

        public function setCreateAt($_created_at)
        {
            $this->created_at = $_created_at;
        }

        // Construct function
        public function __construct(array $arrEvent)
        {
            $event = json_encode($arrEvent);
            if (isset($event.id) && $event.id != null) {
                $this->id = $event.id;
            }
            if (isset($event.customer_id) && $event.customer_id != null) {
                $this->customer_id = $event.customer_id;
            }
            if (isset($event.name) && $event.name != null) {
                $this->name = $event.name;
            }
            if (isset($event.ending_date) && $event.ending_date != null) {
                $this->ending_date = $event.ending_date;
            }
            if (isset($event.created_at) && $event.created_at != null) {
                $this->created_at = $event.created_at;
            }
        }
    }
?>