<?php
 
class DB {
    
    private static $instance = null;
    private $dbconn;
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "slimapp";

    private function __construct() {
        try {
            $this->dbconn = new PDO(
                "mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            //echo "I'm here, all good";
        } catch (PDOException $ex) {
            print "Error!: " . $ex->getMessage() . "<br/>";
            die();
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->dbconn;
    }

    function getLastInsertID() {
        return $this->dbconn->lastInsertId();
    }


}