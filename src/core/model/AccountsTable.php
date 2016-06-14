<?php
    namespace core\model;
    require_once 'src/core/model/PDOData.php';

    /**
     * Class to interact with accounts table
     *
     * API
     * insert($account = array())
     * getIdByLogin($username = '', $password = '')
     * checkByEmail($email = '')
     * checkByUsername($username = '')
     * updatePassword($newPassword = 'error', $id = '')
     */
    class AccountsTable {
        // insert($account = array())
        // INPUT: associative array
        // require username, email, password, tokenhash
        // HOW-TO-DO: insert a new account record
        // OUTPUT: id of created account
        public static function insert($account = array()) {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('INSERT INTO accounts (username, email, password, tokenhash) VALUES (:username, :email, :password, :tokenhash);');

                $stmt->bindParam(':username', $account['username']);
                $stmt->bindParam(':email', $account['email']);
                $stmt->bindParam(':password', $account['password']);
                $stmt->bindParam(':tokenhash', $account['tokenhash']);

                if ($stmt->execute()) {
                    return $conn->lastInsertId();
                } else {
                    return -1;
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // getIdByLogin($username = '', $password = '')
        // INPUT: username and password to check
        // HOW-TO-DO: check if this username and password is matched or not
        // OUTPUT: int (id of the matched username, if not matched return -1)
        public static function getIdByLogin($username = '', $password = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('SELECT id FROM accounts WHERE username = :username and password = :password;');

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);

                $stmt->execute();

                $result = $stmt->fetch();
                if ($result != false) {
                    return intval($result['id']);
                } else {
                    return -1;
                }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // checkByEmail($email = '')
        // INPUT: email to check
        // HOW-TO-DO: check if this email is existed on the system or not
        // OUTPUT: bool (result of the check)
        public static function checkByEmail($email = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('SELECT 1 FROM accounts WHERE email = :email;');

                $stmt->bindParam(':email', $email);

                $stmt->execute();

                return $stmt->fetch() == false;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // checkByUsername($username = '')
        // INPUT: username to check
        // HOW-TO-DO: check if this username is existed on the system or not
        // OUTPUT: bool (result of the check)
        public static function checkByUsername($username = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('SELECT 1 FROM accounts WHERE username = :username;');

                $stmt->bindParam(':username', $username);

                $stmt->execute();

                return $stmt->fetch() == false;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // updatePassword($newPassword = 'error', $id = '')
        // INPUT: id of the account to change and the new password
        // HOW-TO-DO: change password of the id to new password
        // OUTPUT: bool (success or not)
        public static function updatePassword($newPassword = 'error', $id = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('UPDATE accounts SET password = :password WHERE id = :id;');

                $stmt->bindParam(':password', $newPassword);
                $stmt->bindParam(':id', $id);

                return $stmt->execute();
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }

        // verifyEmail($username = '', $tokenhash = '')
        // INPUT: username and tokenhash of the account
        // HOW-TO-DO: verify email with the tokenhash and username
        // OUTPUT: bool (success or not)
        public static function verifyEmail($username = '', $tokenhash = '') {
            try {
                $conn = &PDOData::connect();
                $stmt = $conn->prepare('UPDATE accounts SET activate = 1 WHERE username = :username AND tokenhash = :tokenhash;');

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':tokenhash', $tokenhash);

                $stmt->execute();

                return $stmt->rowCount() != 0;
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            PDOData::disconnect();
        }
    }
