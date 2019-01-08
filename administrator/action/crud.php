<?php
include "../config/config.php";

class Crud extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * getData : untuk menampilkan data
     */
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
        $result = $this->db->query($query);
        //var_dump($query);
        if ($result == false) {
            echo "Cannot execute the command !";
            return false;
        } else {
            return true;
        }
    }

    /**
     * delete() : fungsi untuk mengahapus data
     */
    public function delete($id, $table)
    {
        $query = "DELETE FROM $table WHERE ".$table."_id = '$id'";
        $result = $this->db->query($query);
        if ($result == false) {
            echo "Cannot delete this.";
            return false;
        } else {
            return true;
        }
    }

    /**
     * escape_string() : memfilter data yang akan diolah
     */
    public function escape_string($value)
    {
        return $this->db->real_escape_string($value);
    }

    public function upload_image()
    {
        if(isset($_FILES["gambar"]))
            {
                $extension = explode('.', $_FILES['gambar']['name']);
                $new_name = rand() . '.' . $extension[1];
                $destination = 'upload/' . $new_name;
                move_uploaded_file($_FILES['gambar']['tmp_name'], $destination);
                return $new_name;
            }
    }

    public function cekLogin($uname, $upass)
    {
        $query = "SELECT user_id, username,password FROM user WHERE username='$upass' AND password='$upass'";
        var_dump($query);
        $result = $this->db->query($query);
        $count_row = $result->num_rows;
        while ($data = $result->fetch_assoc()) {
            if ($count_row == 1) {
                $_SESSION['uid'] = $data['user_id'];
                return true;
            }else {
                return false;
            }
        }
    }

    public function login()
    {
        if (isset($_SESSION['uid'])) {
            return true;
        }
    }

    public function logoit()
    {
        session_destroy();
        unset($_SESSION['uid']);
        return true;
    }

    public function redirect($url)
    {
        header("Location: $url");
    }
}