<?php
    namespace main\controller;
	use \DateTime;
	require_once 'src/core/model/WalletsTable.php';
	require_once 'src/core/model/CategorysTable.php';
	require_once 'src/core/model/UnitsTable.php';
	require_once 'src/main/model/Wallet.php';
	require_once 'src/main/model/Category.php';


    /**
    * HomeController
    */
    class TransactionController {
        public function render() {
			date_default_timezone_set('Asia/Bangkok');

			$currentDate = new DateTime();

			$transactions = $this->getTransactionsByMonth($currentDate->format("m"), $currentDate->format("Y"));
			
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
		
		public function getTransactionsByMonth($month, $year) {
			require_once 'src/core/model/TransactionsTable.php';
			session_start();
			$customer_id = $_SESSION["userid"];

			$results = \core\model\TransactionsTable::getTransactionsByMonth($customer_id, $month, $year);

			$transactions = array();
			foreach ($results as $t) {
					$temp = array();
					$temp["transaction"] = $t;
					$temp["wallet"] = \core\model\WalletsTable::get($t["wallet_id"]);
					$temp["category"] = \core\model\CategorysTable::get($t["category_id"]);
					$temp["unit"] = \core\model\UnitsTable::get($t["unit_id"]);
					$transactions[] = $temp;
				}
			return $transactions;
		}
		
		public function getTransaction($param) {
			if ($param == array()) {
				// get all current month
			} elseif ($param[0] == "month") {
				// get thang param[1] cua nam param[2]
				$transactions = $this->getTransactionsByMonth($param[1], $param[2]);

				echo json_encode($transactions);
			} elseif ($param[0] == "category") {
				// thi get theo category theo param[1];
			}
		}

		public function addTransaction() {
			require_once 'src/core/model/TransactionsTable.php';

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

			// substract amount in wallet
			// get wallet
			$wallet = \core\model\WalletsTable::get($wallet_id);
			$new_amount = $wallet["amount"] - $amount;
			// update amount of wallet
			$w = \core\model\WalletsTable::updateAmount($wallet_id, $new_amount);
			// return new transaction's id
			$transaction['id'] = \core\model\TransactionsTable::insert($transaction);
			echo json_encode($transaction);
		}
		
		public function deleteTransaction() {
			require_once 'src/core/model/TransactionsTable.php';
			$id = $_POST['id'];
			echo \core\model\TransactionsTable::delete($id);
		}
    }
