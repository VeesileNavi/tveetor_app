<?php
include 'base_model.php'


class Tveet extends BaseModel {
    public function __construct() {
        parent::__construct();
     }

    public function createTveet($text) {
        $query = "INSERT INTO tveet (text, author, date) VALUES ('$text', " . $_SESSION['current_user'] . ", GETDATE())";
        pg_query($this->$db, $query);
    }

    public function getActualTveets() {
        $query = "SELECT text, author, date FROM tveet ORDER BY date DESC LIMIT 20";
        $tveets = pg_query($this->getConnection(), $query);
        return $tveets;
    }
}
