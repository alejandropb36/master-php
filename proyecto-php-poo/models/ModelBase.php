<?php

class ModelBase {
    public $db;

    public function __construct() {
        $this->db = Database::connect();
    }
}