<?php
include 'base_model.php'


class AppUser() extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    public function createAppUser($email, $username, $password) {
        $password_hash = $this->getHash($password);

        $query = "INSERT INTO app_user (email, username, password) VALUES ('$email', '$username', '$password_hash')";
        pg_query($this->$db, $query);
    }

    public function getUserByEmail($email) {
        $query = "SELECT email, username, password FROM app_user WHERE email=$email";
        $result = pg_query($this->$db, $query);

        return $result;
    }

    public function loginByEmail($email, $password) {
        $query = "SELECT * FROM app_user WHERE email=$email";
        $result = pg_query($this->$db, $query);

        if (getHash($password) == pg_fetch_array($result)[1]) {
            return $result;
        }
    }

    private function getHash($password) {
        return hash('sha512', $password);
    }
}