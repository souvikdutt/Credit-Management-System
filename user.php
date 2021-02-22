<?php

    class User {
        protected $id;
        protected $name;
        protected $gmail;
        protected $credit;
        private $tableName = 'users';
        private $dbConn;

        function setId($id) { $this->id = $id; }
        function getId() { return $this->id; }
        function setName($name) { $this->name = $name; }
        function getName() { return $this->name; }
        function setGmail($gmail) { $this->gmail = $gmail; }
        function getGmail() { return $this->gmail; }
        function setCredit($credit) { $this->credit = $credit; }
        function getCredit() { return $this->credit; }

        public function __construct() {
            require_once('DbConnect.php');
            $db = new DbConnect();
            $this->dbConn = $db->connect();
        }
    
        function showUser() {
            $stmt = $this->dbConn->prepare("select * from $this->tableName");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        function getUserCreditById() {
            $stmt = $this->dbConn->prepare("select credit from $this->tableName where id=$this->id");
            $stmt->execute();
            $user = $stmt->fetch();
            return $user;
        }

        function updateCredit() {
            $stmt = $this->dbConn->prepare("UPDATE $this->tableName SET `credit`=$this->credit WHERE id=$this->id");
            if($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    
?>