<?php
    /**
    * SignUpController
    */
    class SignUpController
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
                require_once 'src/View/SignUpView.php';
                $sView = new SignUpView();

                echo $sView->render();
            } else {
                header('Location:/home');
            }
        }
    }
?>