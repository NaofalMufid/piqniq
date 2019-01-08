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

    /*
    * Method untuk enkripsi url
    *
    */
    // public function encrypt( $data ) {
    //     $cryptKey  = 'd8578edf8458ce06fbc5bb76a58c5ca4';
    //     $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $data, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    //     return( $qEncoded );
    // }

    // public function decrypt($data) {
    //     $cryptKey  = 'd8578edf8458ce06fbc5bb76a58c5ca4';
    //     $qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $data ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    //     return( $qDecoded );
    // }

}

?>