<?php
    /**
    * WelcomeController
    */
    class WelcomeController
    {
        public function render()
        {
            session_start();
            if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
                require_once 'src/View/WelcomeView.php';
                $wView = new WelcomeView();

                echo $wView->render();
            } else {
                require_once 'src/View/HomeView.php';
                $hView = new HomeView();

                echo $hView->render();
            }
        }
    }
?>