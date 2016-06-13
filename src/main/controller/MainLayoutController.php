<?php
	namespace main\controller;

    /**
    * MainLayoutController
    */
    class MainLayoutController {
		public function deleteNoti() {
			require_once 'src/core/model/NotificationsTable.php';
			
			$notificationId = $_POST['id'];
			$n = \core\model\NotificationsTable::delete($notificationId);
			echo $n;
		}
    }
