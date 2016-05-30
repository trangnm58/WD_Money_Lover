<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Budget Entity.
 *
 * @property int $id
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property float $goal
 * @property float $spent
 * @property \Cake\I18n\Time $from_date
 * @property \Cake\I18n\Time $to_date
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $wallet_id
 * @property \App\Model\Entity\Wallet $wallet
 * @property \Cake\I18n\Time $created_at
 */
class Budget extends Entity
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
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    // Get Functions
    public function getId()
    {
        return $this->id;
    }

    public function getCustomer_id()
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

    public function getFrom_date()
    {
        return $this->from_date;
    }

    public function getTo_date()
    {
        return $this->to_date;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function getWallet_id()
    {
        return $this->wallet_id;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    // Set Functions
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setCustomer_id($_customer_id)
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

    public function setFrom_date($_from_date)
    {
        $this->from_date = $_from_date;
    }

    public function setTo_date($_to_date)
    {
        $this->to_date = $_to_date;
    }

    public function setCategory_id($_category_id)
    {
        $this->category_id = $_category_id;
    }

    public function setWallet_id($_wallet_id)
    {
        $this->wallet_id = $_wallet_id;
    }

    public function setCreate_at($_created_at)
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
