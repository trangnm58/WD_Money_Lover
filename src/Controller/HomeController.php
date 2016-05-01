<?php
    /**
    * WelcomeController
    */
    class HomeController
    {
        public function render()
        {
            session_start();
            if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
                header('Location:login')
            } else {
                require_once 'src/View/HomeView.php';
                $hView = new HomeView();

                echo $hView->render();
            }
        }

        public function login()
        {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                if ((strcmp($_POST['username'], 'trang') == 0 && 
                    strcmp($_POST['password'], '123456') == 0)
                    || (strcmp($_POST['username'], 'cat') == 0 && 
                    strcmp($_POST['password'], '123456') == 0)
                    || (strcmp($_POST['username'], 'luong') == 0 && 
                    strcmp($_POST['password'], 'luongdo') == 0)) {
                        session_start();
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['userid'] = 1;
                        header('Location:src/Template/home.html');
                } else {

                }
            }
        }
    }
?>