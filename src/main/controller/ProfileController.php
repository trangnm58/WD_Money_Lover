<?php
    namespace main\controller;
    require_once 'src/main/model/Customer.php';
    require_once 'src/core/model/AccountsTable.php';
    
    /**
    * ProfileController
    */
    class ProfileController {
        public function render() {
            $content = 'src/main/template/profile.php';
            $cssFileName = 'profile.css?v=1.0.0';
            $scriptFileName = 'profile.js?v=1.0.0';

            // get customer from database
            $customer = new \main\model\Customer();

            require_once 'src/main/view/ProfileView.php';
        }

        // API
        // changePassword()
        // INPUT: nothing
        // HOW-TO-DO: get password from POST data
        // change password for current acoount
        // echo 'SUCCESS' if change successfully
        // otherwise, 'FAILED'
        public function changePassword() {
            session_start();

            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                // Get password from post data
                $post = json_decode(file_get_contents('php://input'), true);
                $newPassword = sha1($post['new-password']);

                // Get id from session
                $id = $_SESSION['userid'];

                if (\core\model\AccountsTable::updatePassword($newPassword, $id)) {
                    echo "SUCCESS";
                } else {
                    echo "FAILED";
                }
            } else {
                echo "FAILED";
            }
        }
    }
