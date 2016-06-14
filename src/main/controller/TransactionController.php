<?php
    namespace main\controller;
	require_once 'src/core/model/WalletsTable.php';
	require_once 'src/core/model/CategorysTable.php';
	require_once 'src/core/model/UnitsTable.php';


    /**
    * HomeController
    */
    class TransactionController {
        public function render() {
			date_default_timezone_set('Asia/Bangkok');

			$currentMonth = date("m-Y");
			$currentMonth = date('m-Y', strtotime('-1 month'));
			
			$transactions = $this->getTransactionsByMonth($currentMonth);
			
			$categories = $this->getCategories();
			$wallets = $this->getWallets();
			$units = $this->getUnits();
			
        	require_once 'src/main/view/TransactionView.php';
        }
		
		public function getCategories() {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];

                $results = \core\model\CategorysTable::getCategorys($id);
				$categories = array();
				foreach ($results as $c) {
					$categories[] = new \main\model\Category($c);
				}
                return $categories;
            }
		}
		
		public function getWallets() {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];

                $results = \core\model\WalletsTable::getWallets($id);
				$wallets = array();
				foreach ($results as $w) {
					$wallets[] = new \main\model\Wallet($w);
				}
                return $wallets;
            }
		}
		
		public function getUnits() {
			if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];

                $results = \core\model\UnitsTable::getUnits();
				$units = array();
				foreach ($results as $u) {
					$units[] = new \main\model\Unit($u);
				}
                return $units;
            }
		}
		
		public function getTransactionsByMonth($currentMonth) {
			
		}
		
		public function addTransaction() {
			require_once 'src/core/model/TransactionsTable.php';
			session_start();
			$customer_id = $_SESSION["userid"];
            $amount = $_POST['money'];
            $unit_id = $_POST['unit'];
			$wallet_id = $_POST['wallet'];
			$category_id = $_POST['category'];
			$time = $_POST['date'];
			$description = $_POST['note'];

			$transaction = array();
			$transaction['customer_id'] = $customer_id;
			$transaction['amount'] = $amount;
			$transaction['unit_id'] = $unit_id;
			$transaction['wallet_id'] = $wallet_id;
			$transaction['category_id'] = $category_id;
			$transaction['time'] = $time;
			$transaction['description'] = $description;
			$id = \core\model\TransactionsTable::insert($transaction);
			$this->render();
		}
    }
