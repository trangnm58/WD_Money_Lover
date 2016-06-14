<?php
    namespace main\controller;
    require_once 'src/main/model/Customer.php';
    require_once 'src/core/model/AccountsTable.php';
    require_once 'src/core/model/CustomersTable.php';
    
    /**
    * ProfileController
    */
    class ProfileController {
        // REQUEST FUNCTION
        // render the profile page
        public function render() {
            // get customer from database
            $customer = $this->getMyself();

            require_once 'src/main/view/ProfileView.php';
        }

        // REQUEST FUNCTION
        // render the edit profile page
        public function renderEditProfile() {
            // get customer from database
            $customer = $this->getMyself();

            require_once 'src/main/view/EditProfileView.php';
        }

        // REQUEST FUNCTION
        // render the change password page
        public function renderChangePassword() {
            require_once 'src/main/view/ChangePasswordView.php';
        }

        // PRIVATE FUNCTION
        // getMyself()
        // INPUT: nothing
        // HOW-TO-DO: get all customer information by id
        private function getMyself() {
            if (isset($_SESSION['username'])
                && isset($_SESSION['userid'])) {
                $id = $_SESSION['userid'];

                $result = \core\model\CustomersTable::get($id);
                return new \main\model\Customer($result);
            }
        }

        // API
        // updateBasicInformation()
        // INPUT: nothing
        // HOW-TO-DO: get password from POST data
        // change password for current acoount
        // echo 'SUCCESS' if change successfully
        // otherwise, echo 'FAILED' or error log
        public function updateBasicInformation() {
            if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
                // Get data from post data
                $info = array();
                $info['name'] = $_POST['name'];
                $info['dob'] = $_POST['dob'];
                $info['gender'] = $_POST['gender'];

                if (\core\model\CustomersTable::updateBacicInformation($info, $_SESSION['userid'])) {
                    echo "SUCCESS";
                } else {
                    echo "FAILED";
                }
            } else {
                echo "NOT LOGIN";
            }
        }

        // API
        // changePassword()
        // INPUT: nothing
        // HOW-TO-DO: get password from POST data
        // change password for current acoount
        // echo 'SUCCESS' if change successfully
        // otherwise, echo 'FAILED' or error log
        public function changePassword() {
            if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
                $passwordRegex = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/';

                // Get password from post data
                $oldPassword = sha1($_POST['old-password']);
                $newPassword = sha1($_POST['new-password']);

                if (preg_match($passwordRegex, $newPassword) == 1) {
                    // Get id from session
                    $username = $_SESSION['username'];

                    $id = \core\model\AccountsTable::getIdByLogin($username, $password);
                    if ($id != -1 && $id == $_SESSION['userid']) {
                        if (\core\model\AccountsTable::updatePassword($newPassword, $id)) {
                            echo "SUCCESS";
                        } else {
                            echo "FAILED";
                        }
                    } else {
                        echo "WRONG PASSWORD";
                    }
                } else {
                    echo "NEW PASSWORD IS INVALID";
                }
            } else {
                echo "NOT LOGIN";
            }
        }
    }
