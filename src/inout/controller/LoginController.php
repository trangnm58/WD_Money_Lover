<?php
    namespace inout\controller;

    /**
    * LoginController
    */
    class LoginController {
        // REQUEST FUNCTION
        // Render the default Login View
        public function render($param) {
            if (isset($param[0])) {
                $prevUsername = $param[0];

                if (isset($param[1])) {
                    $errorMessage = '';
                } else if ($param[1] == 'failed') {
                    $errorMessage = 'Login failed! Try again!';
                } else if ($param[1] == 'wrong-password! Try again!') {
                    $errorMessage = 'Wrong password!';
                } else {
                    $errorMessage = $param[1];
                }
            } else {
                $prevUsername = '';
                $errorMessage = '';
            }

            require_once 'src/inout/view/LoginView.php';
        }

        // API
        // login()
        // INPUT: nothing
        // HOW-TO-DO: get username and password from POST data
        // check login in if failed echo 'FAILED'
        // otherwise, go home
        public function login() {
            require_once 'src/core/model/AccountsTable.php';
            $usernameRegex = '/^[a-zA-Z0-9]{6,50}$/';
            $passwordRegex = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/';
            $username = $_POST['username'];
            $password = $_POST['password'];

            // check valid password and username
            // avoid sql injection
            if (preg_match($usernameRegex, $username) == 1
            && preg_match($passwordRegex, $password) == 1) {
                // Encrypt password
                $password = sha1($password);

                $id = \core\model\AccountsTable::getIdByLogin($username, $password);
                if ($id != -1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['userid'] = $id;

                    header('location:/');
                } else {
                    header('location:/login/'.$username.'/wrong-password');
                }
            } else {
                header('location:/login/'.$username.'/failed');
            }
        }

        // API
        // logout()
        // INPUT: nothing
        // HOW-TO-DO: end the session
        public function logout() {
            unset($_SESSION['username']);
            unset($_SESSION['userid']);

            header('location:/');
        }

        // API
        // testUsername($username = '')
        // INPUT: username to test
        // HOW-TO-DO: check if this username is existed on the system or not
        // echo 'VALID' if this username doesn't exist,
        // otherwise echo 'INVALID'
        public function testUsername($username = '') {
            require_once 'src/core/model/AccountsTable.php';

            if (\core\model\AccountsTable::checkByUsername($username)) {
                echo 'VALID';
            } else {
                echo 'INVALID';
            }
        }

        // API
        // testEmail($email = '')
        // INPUT: email to test
        // HOW-TO-DO: check if this email is existed on the system or not
        // echo 'VALID' if this email doesn't exist,
        // otherwise echo 'INVALID'
        public function testEmail($email = '') {
            require_once 'src/core/model/AccountsTable.php';

            if (\core\model\AccountsTable::checkByEmail($email)) {
                echo 'VALID';
            } else {
                echo 'INVALID';
            }
        }
    }
