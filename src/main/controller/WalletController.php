<?php
    namespace main\controller;
    require_once 'src/core/model/AccountsTable.php';
    require_once 'src/main/model/Customer.php';
    require_once 'src/core/model/WalletsTable.php';
    require_once 'src/core/model/UnitsTable.php';
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
            $listWallet = $this->getMyWallet();            
            $units = $this->getUnits();     
            require_once 'src/main/view/WalletView.php';
        }

        public function renderEditWallet() {
            // get customer from database
            $listWallet = $this->getMyWallet();

            require_once 'src/main/view/EditWalletView.php';
        }
        
        public function addWallet()
        {                       
            $wallet = array();
            $wallet['customer_id'] = $_SESSION['userid'];
            $wallet['name'] = $_POST['name'];
            $wallet['description'] = $_POST['description'];
            $wallet['type'] = $_POST['type'];
            $wallet['amount'] = $_POST['amount'];
            $wallet['unit_id'] = $_POST['unit']; 

            $wallet["id"] = \core\model\WalletsTable::insert($wallet); 
            return $wallet;
            //echo var_dump($wallet);
        }

        public function deleteWallet($id='') {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {                
                $result = \core\model\WalletsTable::delete($id);                
            }
        }
        private function getUnits() {
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
        private function getWalletInfo($id) {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {                
                $result = \core\model\WalletsTable::get($id);
                return new \main\model\Wallet($result);
            }            
        }

        public function updateWallet($id) {                
            $wallet = array();
            $wallet['customer_id'] = $_SESSION['e_userid'];
            $wallet['name'] = $post['e_name'];
            $wallet['description'] = $post['e_description'];
            $wallet['type'] = $post['e_type'];
            $wallet['amount'] = $post['e_amount'];
            $wallet['unit_id'] = $post['e_unit_id'];
            if (\core\model\WalletsTable::update($wallet, $id)) {
                    echo 'SUCCESS';
                } else {
                    echo 'FAILED';
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
