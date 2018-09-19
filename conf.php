<?php
/****************************
 *        Author:           *
 *   Dragoslav Predojevic   *
 *                          *
 *         Date:            *
 *       18/09/2018         *
 * **************************/
/**
 * Connected @DB
 */

class DB{
    public $connection;
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    public function  __construct($db_host,$db_user,$db_pass = null,$db_name = null,$connection = null)
    {
        $this->connection = $connection;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }
    /** Connect with database **/
    public function connect(){
        $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
        if ($this->connection->connect_error) {
            die("ERROR: ".$this->connection->connect_error);
        } else {
            $this->connection->query("SET NAMES utf8mb4");
        }
        return $this->connection;
    }
}
$db = new DB('localhost','root','root','Tasks');