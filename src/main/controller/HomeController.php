<?php
    namespace main\controller;
    
    /**
    * HomeController
    */
    class HomeController {
        public function render() {
			date_default_timezone_set('Asia/Bangkok');
			$month = date("m-Y");
        	$content = 'src/main/template/transactions.php';
			$scriptFileName = "transaction.js";
			$cssFileName = "transaction.css";
			
			
			
        	require_once 'src/main/view/HomeView.php';
        }
    }
