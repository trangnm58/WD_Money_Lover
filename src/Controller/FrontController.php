<?php
    /**
    * FrontController
    * FrontController is used for rerouting
    */
    class FrontController
    {
        private $requestURI;
        private $scriptName;
        private $requestURIs;
        private $scriptNames;

        function __construct($requestURI='', $scriptName='', $postData=null, $getData=null)
        {
            $this->requestURI = $requestURI;
            $this->scriptName = $scriptName;
            $this->requestURIs = explode('/', $requestURI);
            $this->scriptNames = explode('/', $scriptName);
            $this->postData = $postData;
            $this->getData = $getData;
        }

        public function proc()
        {
            // User requesr home page
            if ($this->requestURI == '/'
                || $this->requestURI == '/index.php'
                || $this->requestURI == '/home')
            {
                require_once 'src/Controller/WelcomeController.php';
                $wControler = new WelcomeController();
                $wControler->render();
            // User request login page or login action
            } elseif ($this->requestURI == '/login') {
                // In the case of request the login
                // login with the post data
                if (isset($this->postData['username']) && isset($this->postData['password'])) {
                    // Demo login.
                    // In the fact login by call AccountController
                    if (($this->postData['username'] == 'trang' && $this->postData['password'] == '123456')
                        || ($this->postData['username'] == 'cat' && $this->postData['password'] == '123456')
                        || ($this->postData['username'] == 'luong' && $this->postData['password'] == 'luongdo'))
                    {
                        session_start();
                        $_SESSION['username'] = $this->postData['username'];
                        $_SESSION['userid'] = 1;
                        header('Location:/home');
                    } else {
                        echo "Sai mat khau";
                    }
                // go to login page
                } else {
                    require_once 'src/Controller/LoginController.php';
                    $lControler = new LoginController();
                    $lControler->render();
                }
            // User request signout
            } elseif ($this->requestURI == '/signout') {
                session_start();
                unset($_SESSION["username"]);
                unset($_SESSION["userid"]);

                // After sign out go to welcome page 
                header('Location:/');
            // User request sign up page
            } elseif ($this->requestURI == '/sign-up') {
                require_once 'src/Controller/SignUpController.php';
                $sControler = new SignUpController();
                $sControler->render();
            } else {
                require_once 'src/Template/page-not-found.html';
            }
        }
    }
?>