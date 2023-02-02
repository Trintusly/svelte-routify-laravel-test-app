<?php 

namespace App\Http\Traits\Site;

use App\Models\Misc\SiteAction;

trait Security {

    public function getIPAddress() {

        return (empty($_SERVER["HTTP_CF_CONNECTING_IP"])) ? $_SERVER["REMOTE_ADDR"] : $_SERVER["HTTP_CF_CONNECTING_IP"];

    }

	public function logSiteAction($action = null, $value = null) {
		return SiteAction::create([
			'ip' 		 => $this->getIPAddress(),
			'action' 	 => $action,
			'value' 	 => $value,
			'user_agent' => $_SERVER['HTTP_USER_AGENT']
		]);
	}

}
