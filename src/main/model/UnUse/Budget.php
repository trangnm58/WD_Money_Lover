<?php
	namespace main\model;

	class Budget
	{

	    private $id;
	    private $customer_id;
	    private $goal;
	    private $spent;
	    private $from_date;
	    private $to_date;
	    private $category_id;
	    private $wallet_id;
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

	    public function getGoal()
	    {
	        return $this->goal;
	    }

	    public function getSpent()
	    {
	        return $this->spent;
	    }

	    public function getFromDate()
	    {
	        return $this->from_date;
	    }

	    public function getToDate()
	    {
	        return $this->to_date;
	    }

	    public function getCategoryId()
	    {
	        return $this->category_id;
	    }

	    public function getWalletId()
	    {
	        return $this->wallet_id;
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

	    public function setGoal($_goal)
	    {
	        $this->goal = $_goal;
	    }

	    public function setSpent($_spent)
	    {
	        $this->spent = $_spent;
	    }

	    public function setFromDate($_from_date)
	    {
	        $this->from_date = $_from_date;
	    }

	    public function setToDate($_to_date)
	    {
	        $this->to_date = $_to_date;
	    }

	    public function setCategoryId($_category_id)
	    {
	        $this->category_id = $_category_id;
	    }

	    public function setWalletId($_wallet_id)
	    {
	        $this->wallet_id = $_wallet_id;
	    }

	    public function setCreatedAt($_created_at)
	    {
	        $this->created_at = $_created_at;
	    }

	    // Construct Functions
	    public function __construct(array $arrBudget)
	    {
	        $budget = json_encode($arrBudget);
	        if (isset($budget.id) && $budget.id != null) {
	            $this->id = $budget.id;
	        }
	        if (isset($budget.customer_id) && $budget.customer_id != null) {
	            $this->customer_id = $budget.customer_id;
	        }
	        if (isset($budget.goal) && $budget.goal != null) {
	            $this->goal = $budget.goal;
	        }
	        if (isset($budget.spent) && $budget.spent != null) {
	            $this->spent = $budget.spent;
	        }
	        if (isset($budget.from_date) && $budget.from_date != null) {
	            $this->from_date = $budget.from_date;                
	        }
	        if (isset($budget.to_date) && $budget.to_date != null) {
	            $this->to_date = $budget.to_date;
	        }
	        if (isset($budget.category_id)) {
	            $this->category_id = $budget.category_id;
	        }
	        if (isset($budget.wallet_id)) {
	            $this->wallet_id = $budget.wallet_id;
	        }
	        if (isset($budget.created_at) & $budget.created_at != null) {
	            $this->created_at = $budget.created_at;
	        }

	    }

	}
?>