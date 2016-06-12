<?php
    namespace main\model;

    class Category
    {
        private $id;
        private $name;
        private $icon;
        private $group_id;
        private $customer_id;


        // get functions
        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getIcon()
        {
            return $this->icon;
        }

        public function getGroupId()
        {
            return $this->group_id;
        }

        public function getCustomerId()
        {
            return $this->customer_id;
        }

        // Set function

        public function setName($_name)
        {
            $this->id = $_name;
        }

        public function setIcon($_icon)
        {
            $this->icon = $_icon;
        }

        public function setGroupId($_group_id)
        {
            $this->group_id = $_group_id;
        }

        public function setCustomerId($_customer_id)
        {
            $this->customer_id = $_customer_id;
        }

        public function __construct(array $arrCategory)
        {        
            $category = json_encode($arrCategory);

            if (isset($category.id) && $category.id != null) {
                $this->id = $category.id;
            }
            if (isset($category.name) && $category.name != null) {
                $this->name = $category.name;
            }
            if (isset($category.icon) && $category.icon != null) {
                $this->icon = $category.icon;
            }
            if (isset($category.group_id) && $category.group_id) {
                $this->group_id = $category.group_id;
            }
            if (isset($category.customer_id)) {
                $this->customer_id = $category.customer_id;
            }
        }

    }
?>