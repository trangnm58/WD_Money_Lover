<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $icon
 * @property int $group_id
 * @property \App\Model\Entity\Group $group
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\RecurringTransaction[] $recurring_transactions
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Category extends Entity
{
    private $id;
    private $name;
    private $icon;
    private $group_id;
    private $customer_id;

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

    public function getGroup_id()
    {
        return $this->group_id;
    }

    public function getCustomer_id()
    {
        return $this->customer_id;
    }

    // Set function
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setName($_name)
    {
        $this->id = $_name;
    }

    public function setIcon($_icon)
    {
        $this->icon = $_icon;
    }

    public function setGroup_id($_group_id)
    {
        $this->group_id = $_group_id;
    }

    public function setCustomer_id($_customer_id)
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
