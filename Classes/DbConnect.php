<?php
/**
 * Created by PhpStorm.
 * User: erics
 * Date: 2017-05-03
 * Time: 4:41 PM
 */
class DbConnect {

    private $host = "localhost";
    private $dbname = "*****";
    private $user = "*****";
    private $pass = "*****";
    private $db;

    public function getDb() {
        try {
            $this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $this->db;
    }
}
?>
