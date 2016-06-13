<?php
	namespace main\controller;

    /**
    * HomeController
    */
    class HomeController {
        // REQUEST FUNCTION
        // render the profile page
        // Home page is now transaction so call TransactionController->render
        public function render() {
			require_once 'src/main/controller/TransactionController.php';			
			$controller = new \main\controller\TransactionController();
			$controller->render();
        }
    }
