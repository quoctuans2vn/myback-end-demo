<?php
    class User{
        private $db; //mysqli object
        private $table;
        function __construct(){
            $this->table = 'users';
            $this->db = new mysqli('localhost','root','','user');
            
        }
        function getUser($username,$password){
            $query = "SELECT * FROM $this->table WHERE username = '".$username."'AND pass = '".$password."'";
            $result = $this->db->query($query);
            if($result->num_rows > 0){
                $user = $result->fetch_assoc();
                return $user;
            }
            else{
                return false;   
            }
        }
    }