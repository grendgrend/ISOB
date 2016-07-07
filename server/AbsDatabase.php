<?php
abstract class absDatabase {
    protected $host;
    protected $userName;
    protected $password;
    protected $database;
    function __construct($host, $user, $pas, $DB){
        $this->host=$host;
        $this->userName=$user;
        $this->password=$pas;
        $this->database=$DB;
        $this->connectToDB();
    }
    private function connectToDB (){
        $this->mysqli = new mysqli($this->host, $this->userName, $this->password, $this->database);
        $this->mysqli->set_charset("utf8");
    }
}
?>