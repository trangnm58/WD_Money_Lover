<?php
    namespace fallback\controller;
    
    /**
    * FallbackController
    */
    class FallbackController {
        public function render() {
            require_once 'src/fallback/view/page-not-found.php';
        }
    }
