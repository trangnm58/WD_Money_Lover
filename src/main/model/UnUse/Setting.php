<?php
    namespace main\model;

    class Setting extends Entity
    {

        private $customer_id;
        private $displayed_amount;
        private $language;
        private $date_format;
        private $first_day_of_week;
        private $first_day_of_month;
        private $first_month_of_year;
        private $update_at;
        
        // Get functions
        public function getCustomerId()
        {
            return $this->customer_id;
        }

        public function getDisplayedAmount()
        {
            return $this->displayed_amount;
        }

        public function getLanguage()
        {
            return $this->language;
        }

        public function getDateFormat()
        {
            return $this->date_format;
        }

        public function getFirstDayOfWeek()
        {
            return $this->first_day_of_week;
        }

        public function getFirstDayOfMonth()
        {
            return $this->first_day_of_month;
        }

        public function getFirstMonthOfYear()
        {
            return $this->first_month_of_year;
        }

        public function getUpdateAt()
        {
            return $this->update_at;
        }

        // Set Functions
        public function setCustomerId($_customer_id)
        {
            $this->customer_id = $_customer_id;
        }

        public function setDisplayedAmount($_displayed_amount)
        {
            $this->displayed_amount = $_displayed_amount;
        }

        public function setLanguage($_language)
        {
            $this->language = $_language;
        }

        public function setDateFormat($_date_format)
        {
            $this->date_format = $_date_format;
        }

        public function setFirstDayOfWeek($_first_day_of_week)
        {
            $this->first_day_of_week = $_first_day_of_week;
        }

        public function setFirstDayOfMonth($_first_day_of_month)
        {
            $this->first_day_of_month = $_first_day_of_month;
        }

        public function setFirstMonthOfYear($_first_month_of_year)
        {
            $this->first_month_of_year = $_first_month_of_year;
        }

        public function setUpdateAt($_update_at)
        {
            $this->update_at = $_update_at;
        }

        public function __construct(array $arrSetting)
        {
            $setting = json_encode($arrSetting);
            if (isset($setting.customer_id) && $setting.customer_id != null) {
                $this->customer_id = $setting.customer_id;
            }
            if (isset($setting.displayed_amount) && $setting.displayed_amount != null) {
                $this->displayed_amount = $setting.displayed_amount;
            }
            if (isset($setting.language) && $setting.language != null) {
                $this->language = $setting.language;
            }
            if (isset($setting.date_format) && $setting.date_format) {
                $this->date_format = $setting.date_format;
            }
            if (isset($setting.first_day_of_week) && $setting.first_day_of_week != null) {
                $this->first_day_of_week = $setting.first_day_of_week;
            }
            if (isset($setting.first_day_of_month) && $setting.first_day_of_month) {
                $this->first_day_of_month = $setting.first_day_of_month;
            }
            if (isset($setting.first_month_of_year) && $setting.first_month_of_year != null) {
                $this->first_month_of_year = $setting.first_month_of_year;
            }
            if (isset($setting.update_at) && $setting.update_at) {
                $this->update_at = $setting.update_at;
            }
        }

    }
?>