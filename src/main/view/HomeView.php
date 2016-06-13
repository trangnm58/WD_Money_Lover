<?php

	function getNotifications() {
		require_once 'src/core/model/NotificationsTable.php';

		if (isset($_SESSION['username'])
			&& isset($_SESSION['userid'])) {
			$id = $_SESSION['userid'];
			$results = \core\model\NotificationsTable::getNotifications($id);
			$notis = array();
			foreach ($results as $n) {
				$notis[] = new \main\model\Notification($n);
			}
			return $notis;
		}
	}
	
	$notis = getNotifications();
	require_once 'src/main/template/main-layout.php';
