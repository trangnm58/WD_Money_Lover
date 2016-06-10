<?php
    namespace core\controller;

    class Router {
        public static function proc() {
                 
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

        private function api($commandArray)
        {
            if (true) {
                # code...
            } else {
                echo 'FAILED';
            }
        }

        private function request($commandArray)
        {
            // Request to fallback (404-not-found) by default
            $moduleName = 'fallback';
            $controllerName = 'FallbackController';
            $actionName = 'render';
            $parameters = '';

            if (count($commandArray) == 0 || $commandArray[0] == '') {
                $moduleName = 'inout';
                $controllerName = 'WelcomeController';
                $actionName = 'render';
            } elseif ($commandArray[0] == "login") {
                $moduleName = 'inout';
                $controllerName = 'LoginController';
                $actionName = 'render';
            } elseif ($commandArray[0] == "sign-up") {
                $moduleName = 'inout';
                $controllerName = 'SignUpController';
                $actionName = 'render';
            }

            $ret = array();
            $ret['moduleName'] = $moduleName;
            $ret['controllerName'] = $controllerName;
            $ret['actionName'] = $actionName;
            $ret['parameters'] = $parameters;

            // Return the result after secure function
            return self::secure($ret);
        }

        private function secure($ret)
        {
            if ($ret['moduleName'] == 'inout') {
                session_start();
                if (isset($_SESSION['userid']) && isset($_SESSION['username'])) {
                    $ret['moduleName'] = 'main';
                    $ret['controllerName'] = 'HomeController';
                    $ret['actionName'] = 'render';
                    $ret['parameters'] = '';
                }
            } elseif ($ret['moduleName'] == 'main') {
                session_start();
                if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
                    $ret['moduleName'] = 'inout';
                    $ret['controllerName'] = 'SignUpController';
                    $ret['actionName'] = 'render';
                    $ret['parameters'] = '';
                }
            }

            return $ret;
        }
    }

    // $fController = new FrontController(
    //                         $_SERVER['REQUEST_URI'],
    //                         $_SERVER['SCRIPT_NAME'],
    //                         $_POST,
    //                         $_GET
    //                     );
// ucfirst($ret['controllerName']).'Controller'
    // $fController->proc();
    //     private $requestURI;
    //     private $scriptName;
    //     private $requestURIs;
    //     private $scriptNames;

    //     function __construct($requestURI='', $scriptName='', $postData=null, $getData=null)
    //     {
    //         $this->requestURI = $requestURI;
    //         $this->scriptName = $scriptName;
    //         $this->requestURIs = explode('/', $requestURI);
    //         $this->scriptNames = explode('/', $scriptName);
    //         $this->postData = $postData;
    //         $this->getData = $getData;
    //     }

    //     public static function proc()
    //     {
    //         // User requesr home page
    //         if ($this->requestURI == '/'
    //             || $this->requestURI == '/index.php'
    //             || $this->requestURI == '/home')
    //         {
    //             require_once 'src/Controller/WelcomeController.php';
    //             $wControler = new WelcomeController();
    //             $wControler->render();
    //         // User request login page or login action
    //         } elseif ($this->requestURI == '/login') {
    //             // In the case of request the login
    //             // login with the post data
    //             if (isset($this->postData['username']) && isset($this->postData['password'])) {
    //                 // Demo login.
    //                 // In the fact login by call AccountController
    //                 if (($this->postData['username'] == 'trang' && $this->postData['password'] == '123456')
    //                     || ($this->postData['username'] == 'cat' && $this->postData['password'] == '123456')
    //                     || ($this->postData['username'] == 'luong' && $this->postData['password'] == 'luongdo'))
    //                 {
    //                     session_start();
    //                     $_SESSION['username'] = $this->postData['username'];
    //                     $_SESSION['userid'] = 1;
    //                     header('Location:/home');
    //                 } else {
    //                     echo 'Sai mat khau';
    //                 }
    //             // go to login page
    //             } else {
    //                 require_once 'src/Controller/LoginController.php';
    //                 $lControler = new LoginController();
    //                 $lControler->render();
    //             }
    //         // User request signout
    //         } elseif ($this->requestURI == '/signout') {
    //             session_start();
    //             unset($_SESSION['username']);
    //             unset($_SESSION['userid']);

    //             // After sign out go to welcome page 
    //             header('Location:/');
    //         // User request sign up page
    //         } elseif ($this->requestURI == '/sign-up') {
    //             require_once 'src/Controller/SignUpController.php';
    //             $sControler = new SignUpController();
    //             $sControler->render();
    //         } else {
    //             require_once 'src/Template/page-not-found.html';
    //         }
    //     }
    // }
