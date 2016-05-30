<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController
{
	public function settingDefault(Setting $newSetting)
	{
		$settingTable = new SettingsTable();
		if ($settingTable.insert($newSetting)) {			
			return $newSetting.getId();
		} else {
			return false;
		}
	}
    
    public function updateSettingInfo(Setting $newSetting)
    {
    	$settingTable = new SettingsTable();
    	if ($settingTable.update($newSetting)) {
    		return true;
    	} else {
    		return false;
    	}
    }

}
