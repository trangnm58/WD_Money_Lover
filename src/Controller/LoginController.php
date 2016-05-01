<?php
    /**
    * LoginController
    */
    class LoginController
    {
        private $request;

        function __construct()
        {
            $this->request = $request;
        }

        public function render()
        {
            session_start();
            if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
                require_once 'src/View/LoginView.php';
                $lView = new LoginView();

                echo $lView->render();
            } else {
                header('Location:/home');
            }
        }
    }
?>