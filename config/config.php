<?php
class Database{
    private $host = "localhost";
    private $user = "sapa";
    private $pass = "melbu";
    private $dbnm = "piknik";
    public $db;
    public function __construct()
    {
        if(!isset($this->db)){
            $this->db = new mysqli($this->host, $this->user, $this->pass, $this->dbnm);
            if (!$this->db) {
                echo "Cannot connect to Databases";
            }
        }
        return $this->db;
    }
}
?>