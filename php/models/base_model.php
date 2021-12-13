<?php
include '../db_connect/db_connector.php'


class BaseModel {
    private static $db;

    // Getting DB connection
    public function __construct() {
        if (is_null($db)) {
            $connector = new DBConnector();
            $this->$db = $connector->db_connect();
        }
    }

    protected function getConnection() {
        return $db;
    }