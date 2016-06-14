<?php
    namespace main\controller;
    require_once 'src/core/model/AccountsTable.php';
    require_once 'src/main/model/Customer.php';
    require_once 'src/core/model/WalletsTable.php';
    /**
    * HomeController
    */
    class WalletController {
        public function render() {
			//date_default_timezone_set('Asia/Bangkok');

			//$month = date("m-Y");
        	$content = 'src/main/template/wallet.php';
			$cssFileName = 'wallet.css?v=1.0.0';
            $scriptFileName = 'wallet.js?v=1.0.0';


            //$wallet = $this->getWalletInfo();
            $test = ["a" => 1, "b" =>2];
            $listWallet = $this->getMyWallet();
            $this->addWallet();
            //$wallet = $this->getWalletInfo(2);
			
        	require_once 'src/main/view/WalletView.php';
        }
		
		public function addWallet()
        {
            session_start();

            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                // Get password from post data
                $post = json_decode(file_get_contents('php://input'), true);
                $amount = $post['amount'];
                $unitId = $post['unitId'];
                $name = $post['walletName'];
                $description = $post['description'];
                $customerId = $_SESSION['userid'];
                $icon = $post['icon'];
                
                $wallet = array(
                    'customer_id' => $customerId,
                    'name' => $name,
                    'description' => $description,
                    'icon' => $icon,
                    'amount' => $amount,
                    'unit_id' => $unitId
                );
                if (\core\model\WalletsTable::insert($wallet) != -1) {
                    echo "SUCCESS";

                    $this->render();
                } else {
                    echo "FAILED";
                }

            } else {
                echo "FAILED";
            }                    
        }

        private function getWalletInfo($id) {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                

                $result = \core\model\WalletsTable::get($id);
                return new \main\model\Wallet($result);
            }            ;
        }

        private function updateWallet($id) {
        	if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                

                $result = \core\model\WalletsTable::get($id);
                return new \main\model\Wallet($result);
            }
        }
        private function getMyWallet() {
        	if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];

                $result = \core\model\WalletsTable::getWallets($id);
                foreach ($result as &$each_row):
                if($each_row['unit_id'] ==1)  {
                	$each_row['unit_name'] = 'USD';
                	$each_row['exchange'] = 1;
                } else {
                	$each_row['unit_name'] = 'VND';
                	$each_row['exchange'] = 0.000045;
                }
                endforeach;         
                return $result;
               // return new \main\model\Customer($result);
            }

        }
    }