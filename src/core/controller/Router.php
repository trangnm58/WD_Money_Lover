<?php
    namespace core\controller;

    class Router {
        public static function proc() {
            session_start();
                 
            // Explode the URI
            $requestURI = explode('/', strtolower($_SERVER['REQUEST_URI']));
            $scriptName = explode('/', strtolower($_SERVER['SCRIPT_NAME']));
            $commandArray = array_diff_assoc($requestURI, $scriptName);
            $commandArray = array_values($commandArray);

            if (count($commandArray) != 0 && $commandArray[0] == 'api') {
                return self::api($commandArray);
            } else {
                return self::request($commandArray);
            }
        }

        private function api($commandArray) {
            $ret = array();
            $ret['moduleName'] = '';
            $ret['controllerName'] = '';
            $ret['actionName'] = '';
            $ret['parameters'] = array();
            if (count($commandArray) <= 1) {
                echo 'FAILED';
            } elseif ($commandArray[1] == 'login') {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'LoginController';
                $ret['actionName'] = 'login';
            } elseif ($commandArray[1] == 'logout') {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'LoginController';
                $ret['actionName'] = 'logout';
            } elseif ($commandArray[1] == 'test-username' && isset($commandArray[2])) {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'LoginController';
                $ret['actionName'] = 'testUsername';
                $ret['parameters'] = $commandArray[2];
            } elseif ($commandArray[1] == 'test-email' && isset($commandArray[2])) {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'LoginController';
                $ret['actionName'] = 'testEmail';
                $ret['parameters'] = $commandArray[2];
            } elseif ($commandArray[1] == 'sign-up') {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'SignUpController';
                $ret['actionName'] = 'register';
            } elseif ($commandArray[1] == 'verify-email') {
                $ret['moduleName'] = 'inout';
                $ret['controllerName'] = 'SignUpController';
                $ret['actionName'] = 'verify';
                $ret['parameters'] = array_slice($commandArray, 2);
            } elseif ($commandArray[1] == 'change-password') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'ProfileController';
                $ret['actionName'] = 'changePassword';
            } elseif ($commandArray[1] == 'update-basic-information') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'ProfileController';
                $ret['actionName'] = 'updateBasicInformation';
            } elseif ($commandArray[1] == 'update-contact-information') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'ProfileController';
                $ret['actionName'] = 'updateContactInformation';
            } elseif ($commandArray[1] == 'update-education-information') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'ProfileController';
                $ret['actionName'] = 'updateEducationInformation';
            } elseif ($commandArray[1] == 'add-transaction') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'TransactionController';
                $ret['actionName'] = 'addTransaction';
            } elseif ($commandArray[1] == 'delete-transaction') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'TransactionController';
                $ret['actionName'] = 'deleteTransaction';
            } elseif ($commandArray[1] == 'update-transaction') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'TransactionController';
                $ret['actionName'] = 'updateTransaction';
            } elseif ($commandArray[1] == 'get-transaction') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'TransactionController';
                $ret['actionName'] = 'getTransaction';
                $ret['parameters'] = array_slice($commandArray, 2);
			} elseif ($commandArray[1] == 'delete-noti') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'MainLayoutController';
                $ret['actionName'] = 'deleteNoti';
            } elseif ($commandArray[1] == 'add-wallet') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'WalletController';
                $ret['actionName'] = 'addWallet';
            } elseif ($commandArray[1] == 'delete-wallet') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'WalletController';
                $ret['actionName'] = 'deleteWallet';
            } elseif ($commandArray[1] == 'get-wallet') {
                $ret['moduleName'] = 'main';
                $ret['controllerName'] = 'WalletController';
                $ret['actionName'] = 'getWallet';
                $ret['parameters'] = array_slice($commandArray, 2);
            } else {
                echo 'FAILED';
            }
            return $ret;
        }

        private function request($commandArray) {
            // Request to fallback (404-not-found) by default
            $moduleName = 'fallback';
            $controllerName = 'FallbackController';
            $actionName = 'render';
            $parameters = '';

            if (count($commandArray) == 0 || $commandArray[0] == '') {
                $moduleName = 'inout';
                $controllerName = 'WelcomeController';
                $actionName = 'render';
            } elseif ($commandArray[0] == 'home') {
                $moduleName = 'main';
                $controllerName = 'HomeController';
                $actionName = 'render';
            } elseif ($commandArray[0] == 'login') {
                $moduleName = 'inout';
                $controllerName = 'LoginController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'sign-up') {
                $moduleName = 'inout';
                $controllerName = 'SignUpController';
                $actionName = 'render';
            } elseif ($commandArray[0] == 'notification') {
                $moduleName = 'inout';
                $controllerName = 'NotificationController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'profile') {
                $moduleName = 'main';
                $controllerName = 'ProfileController';
                $actionName = 'render';
            } elseif ($commandArray[0] == 'transaction') {
                $moduleName = 'main';
                $controllerName = 'TransactionController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'wallet') {
                $moduleName = 'main';
                $controllerName = 'WalletController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'category') {
                $moduleName = 'main';
                $controllerName = 'CategoryController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'trend') {
                $moduleName = 'main';
                $controllerName = 'TrendController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'help') {
                $moduleName = 'main';
                $controllerName = 'HelpController';
                $actionName = 'render';
                $parameters = array_slice($commandArray, 1);
            } elseif ($commandArray[0] == 'change-password') {
                $moduleName = 'main';
                $controllerName = 'ProfileController';
                $actionName = 'renderChangePassword';
            }

            $ret = array();
            $ret['moduleName'] = $moduleName;
            $ret['controllerName'] = $controllerName;
            $ret['actionName'] = $actionName;
            $ret['parameters'] = $parameters;

            // Return the result after secure function
            return self::secure($ret);
        }

        private function secure($ret) {
            if ($ret['moduleName'] == 'inout') {
                if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
                    header('location:/home');
                }
            } elseif ($ret['moduleName'] == 'main') {
                if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
                    header('location:/login');
                }
            }

            return $ret;
        }
    }
