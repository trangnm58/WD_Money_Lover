<?php
    namespace inout\controller;

    /**
    * LoginController
    */
    class NotificationController {
        // REQUEST FUNCTION
        // Render the default inout View
        public function render($param) {
            if ($param[0] == 'verify-success') {
                $notiContent = 'Verify email successfully! Now you can use our app with all functions.';
            } elseif ($param[0] == 'verify-failed') {
                $notiContent = 'Unable to verify your email now! Please! Try again after few minutes.';
            } else {
                $notiContent = $param;
            }
            require_once 'src/inout/view/NotificationView.php';
        }
    }
