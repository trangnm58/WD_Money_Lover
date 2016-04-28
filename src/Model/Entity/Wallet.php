<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wallet Entity.
 *
 * @property int $id
 * @property int $account_id
 * @property string $name
 * @property string $description
 * @property int $icon
 * @property float $amount
 * @property int $unit_id
 * @property datetime $created_at
 */
class Wallet extends Entity
{

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

    private $id;
    private $account_id;
    private $name;
    private $description;
    private $icon;
    private $amount;
    private $unit_id;
    private $created_at;

    // get functions
    public function getId()
    {
        return $this->id;
    }
    
    public function getAccount_id()
    {
        return $this->account_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getUnit_id()
    {
        return $this->unit_id;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function getWallet()
    {
        $arrWallet = array('id' =>$this->id , 'account_id' =>$this->account_id , 'name' =>$this->name , 'description' => $this->description , 'icon' =>$this->icon , 'amount' =>$this->amount , 'unit_id' =>$this->unit_id , 'created_at' =>$this->created_at);
        return $arrWallet;
    }
    //set functions
    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function setAccount_id($_account_id)
    {
        $this->account_id = $_account_id;
    }

    public function setName($_name)
    {
        $this->name = $_name;
    }
    
    public function setDescription($_description)
    {
        $this->description = $_description;
    } 

    public function setIcon($_icon)
    {
        $this->icon = $_icon;
    } 

    public function setAmount($_amount)
    {
        $this->amount = $_amount;
    }

    public function setUnit_id($_unit_id)
    {
        $this->unit_id = $_unit_id;
    }

    public function setCreated_at($_created_at)
    {
        $this->created_at = $_created_at;
    }

    /**
     * construct function has parameter as json
     * JSON [{"id":$_id,"account_id":$_account,"name":$_name,"description":$_des,"icon":$_icon,"amount":$_amount},"unit_id":$_unit_id,"created_at":$_created_at]
     */
    public function __construct(array $arrWallet)
    {
        $wallet = json_encode($arrWalletr);

        if (isset($wallet.id) && $wallet.id != null) {
            $this->id = $wallet.id;
        }
        if (isset( $wallet.account_id ) && $wallet.account_id != null) {
            $this->account_id = $wallet.account_id;
        }
        if (isset( $wallet.name )) {
            $this->name = $wallet.name;
        }
        if (isset( $wallet.description)) {
            $this->description = $wallet.description;
        }
        if (isset($wallet.icon)) {
            $this->icon = $wallet.icon;
        }
        if (isset($wallet.amount) && $wallet.amount != null) {
            $this->amount = $wallet.amount;
        }
        if (isset($wallet.unit_id)&& $wallet.unit_id != null) {
            $this.unit_id = $wallet.unit_id;
        }
        if (isset($wallet.created_at) && $wallet.created_at !=null) {
            $this.created_at = $wallet.created_at;
        }
    }
}