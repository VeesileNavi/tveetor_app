<?php
include 'config.php';

class DBConnector() {
    public function db_connect() {
        $db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die("Could not connect");

        if (!$db) {
            die("Error while connecting DB");
            exit;
        }

        return $db;
    }
}

?>