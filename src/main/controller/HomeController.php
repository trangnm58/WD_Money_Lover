<?php
	namespace main\controller;

    /**
    * HomeController
    */
    class HomeController {
        public function render() {
			require_once 'src/main/controller/TransactionController.php';			

			$controller = new \main\controller\TransactionController();
			$controller->render();
        }
    }
