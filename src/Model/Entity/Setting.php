<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity.
 *
 * @property int $customer_id
 * @property \App\Model\Entity\Customer $customer
 * @property string $displayed_amount
 * @property string $language
 * @property string $date_format
 * @property int $first_day_of_week
 * @property int $first_day_of_month
 * @property int $first_month_of_year
 * @property \Cake\I18n\Time $update_at
 */
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
        'customer_id' => false,
    ];

    // Get functions
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getDisplayed_amount()
    {
        return $this->displayed_amount;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getDate_format()
    {
        return $this->date_format;
    }

    public function getFirst_day_of_week()
    {
        return $this->first_day_of_week;
    }

    public function getFirst_day_of_month()
    {
        return $this->first_day_of_month;
    }

    public function getFirst_month_of_year()
    {
        return $this->first_month_of_year;
    }

    public function getUpdate_at()
    {
        return $this->update_at;
    }

    // Set Functions
    public function setCustomer_id($_customer_id)
    {
        $this->customer_id = $_customer_id;
    }

    public function setDisplayed_amount($_displayed_amount)
    {
        $this->displayed_amount = $_displayed_amount;
    }

    public function setLanguage($_language)
    {
        $this->language = $_language;
    }

    public function setDate_format($_date_format)
    {
        $this->date_format = $_date_format;
    }

    public function setFirst_day_of_week($_first_day_of_week)
    {
        $this->first_day_of_week = $_first_day_of_week;
    }

    public function setFirst_day_of_month($_first_day_of_month)
    {
        $this->first_day_of_month = $_first_day_of_month;
    }

    public function setFirst_month_of_year($_first_month_of_year)
    {
        $this->first_month_of_year = $_first_month_of_year;
    }

    public function setUpdate_at($_update_at)
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
