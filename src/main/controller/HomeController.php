<?php
	namespace main\controller;

    /**
    * HomeController
    */
    class HomeController {
        public function render() {
			require_once 'src/main/controller/TransactionController.php';			

			$controller = new \main\controller\TransactionController();
			$controller->render();
        }
		
		public function deleteNoti() {
			require_once 'src/core/model/NotificationsTable.php';
			
			$notificationId = $_POST['id'];
			$n = \core\model\NotificationsTable::delete($notificationId);
			echo $n;
		}
    }
