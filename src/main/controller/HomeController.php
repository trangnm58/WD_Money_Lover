<?php
    namespace main\controller;
    
    /**
    * HomeController
    */
    class HomeController {
        public function render() {
        	$content = 'src/main/template/tranactions.php';
        	require_once 'src/main/view/HomeView.php';
        }
    }
