<?php
	namespace main\controller;
	require_once 'src/core/model/NotificationsTable.php';

    /**
    * HomeController
    */
    class HomeController {
        public function render() {
			require_once 'src/main/controller/TransactionController.php';			
			$notis = $this->getNotifications();

			$controller = new \main\controller\TransactionController();
			$controller->render($notis);
        }
		
		public function getNotifications() {
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
    }
