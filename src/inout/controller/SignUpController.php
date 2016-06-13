<?php
    namespace inout\controller;
    use \DateTime;
    use \PHPMailer;

    /**
    * SignUpController
    */
    class SignUpController {
        public function render() {
            require_once 'src/inout/view/SignUpView.php';
        }

        // API
        // verify($param)
        // INPUT: array of username and tokenhash
        // HOW-TO-DO: verify this username with the tokenhash
        // Notify the user result of verify
        public function verify($param) {
            require_once 'src/core/model/AccountsTable.php';
            $username = $param[0];
            $tokenhash = $param[1];

            $result = \core\model\AccountsTable::verifyEmail($username, $tokenhash);
            if ($result) {
                require_once 'src/inout/controller/NotificationController.php';
                $controller = new \inout\controller\NotificationController();
                $controller->render('Verify email successfully! Now you can use our app with all functions.');
            } else {
                require_once 'src/inout/controller/NotificationController.php';
                $controller = new \inout\controller\NotificationController();
                $controller->render('Unable to verify your email now! Please! Try again after few minutes.');
            }
        }

        // API
        // register()
        // INPUT: nothing
        // HOW-TO-DO: get username and password, email from POST data
        // create new account
        // send email
        // create customer
        public function register() {
            require_once 'src/core/model/AccountsTable.php';
            $usernameRegex = '/^[a-zA-Z0-9]{6,50}$/';
            $emailRegex = '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i';
            $passwordRegex = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,50}/';

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // check valid password and username and email
            // avoid sql injection
            if (preg_match($usernameRegex, $username) == 1
            && preg_match($emailRegex, $email) == 1
            && preg_match($passwordRegex, $password) == 1) {
                // generate seed for rand
                $date = new DateTime();
                $seed = $date->getTimestamp();
                srand($seed);

                // generate a rand tokenhash
                $tokenhash = sha1(''.rand());

                $account = array();
                $account['username'] = $username;
                $account['email'] = $email;
                $account['password'] = sha1($password);
                $account['tokenhash'] = $tokenhash;

                $id = \core\model\AccountsTable::insert($account);
                if ($id != -1) {
                    require_once 'src/core/model/CustomersTable.php';

                    $customer = array();
                    $customer['username'] = $account['username'];
                    $customer['email'] = $account['email'];
                    $customer['id'] = $id;

                    if (\core\model\CustomersTable::insert($customer)) {
                        if (self::sendConfirmEmail($account)) {
                            self::alertSuccess();
                        } else {
                            self::alertFailed();
                        }
                    } else {
                        self::alertFailed();
                    }
                } else {
                    self::alertFailed();
                }
            } else {
                self::alertFailed();
            }
        }

        private function sendConfirmEmail($account = array()) {
            $mailContent = '<a href="http://localhost/api/verify-email/'.$account['username'].'/'.$account['tokenhash'].'">Click Here</a> to verify your account!';

            require_once('src/core/PHPMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();

            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'moneyloverwd@gmail.com'; // SMTP username
            $mail->Password = 'moneylover1235'; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            $mail->setFrom('user@moneylover.pe.hu', 'Moneylover');
            $mail->addReplyTo('user@moneylover.pe.hu', 'Moneylover');
            $mail->addAddress($account['email']);

            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Verify Moneylover Email';
            $mail->Body = $mailContent;

            return $mail->send();
        }

        private function alertFailed() {
            require_once 'src/inout/controller/NotificationController.php';
            $controller = new \inout\controller\NotificationController();
            $controller->render('Register failed!');
        }

        private function alertSuccess() {
            require_once 'src/inout/controller/NotificationController.php';
            $controller = new \inout\controller\NotificationController();
            $controller->render('Register successfully! Check your email for verify account!');
        }
    }