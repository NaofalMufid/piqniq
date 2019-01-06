<?php
include "config/config.php";

class View extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query)
    {
        $result = $this->db->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * execute() : fungsi untuk eksekusi terkait DML
     */
    public function execute($query)
    {
        $result = $this->db->multi_query($query);
        if ($result === false) {
            echo "Cannot execute the command !";
            return false;
        } else {
            return true;
        }
    }

    public function escape_string($value)
    {
        return $this->db->real_escape_string($value);
    }
}

?>