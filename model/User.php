<?php
    require_once 'Form.php';
    class User{
        public $db; //mysqli object
        protected $table;
        protected $user_id;
        protected $name_user;
        protected $username;
        protected $password;
        public $form;
        //protected $role;
        function __construct(){
            $this->table = 'users';
            $this->form = new Form();
            $this->db = new mysqli('localhost','root','','user');
            
        }
        function getUser($username,$password){
            $query = "SELECT * FROM $this->table WHERE username = '".$username."'AND pass = '".$password."'";
            $result = $this->db->query($query);
            if($result->num_rows == 1){
                $arr = $result->fetch_assoc();
                $this->user_id = $arr['id'];
                $this->name_user = $arr['name'];
                $this->username = $username;
                $this->password = $password;
                return true;
            }
            else{
                return false;   
            }
        }
        function setSession(){
            $_SESSION['userid'] = $this->user_id;
            $_SESSION['name'] =  $this->name_user;
            $_SESSION['username'] =  $this->username;
            //$_SESSION['role'] = $this->role;
        }
        function getContract($contract){
            $query = "SELECT * FROM $this->table WHERE username = '".$contract."'";
            $result = $this->db->query($query);
            if ($result->num_rows == 1){
                $user = $result->fetch_assoc();
                return $user;
            }
            else{
                return false;
            }
        }
        public function fetchAllUser($user_id){
            $query = "SELECT * FROM $this->table WHERE id != '".$user_id."'";
            $result = $this->db->query($query);
            $users = array();
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $users[] = $row;
                }
            }
            return $users;
        }
        public function getUserById($user_id){
            $query = "SELECT * FROM $this->table WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i",$user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows == 1){
                $user = $result->fetch_assoc();
                return $user;
            }
            return false;
        }
        public function deleteUser($user_id){
            $query = "DELETE FROM $this->table WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i",$user_id);
            $stmt->execute();
        }
        public function updateUser($user_id,$name,$username,$password){
            $query = "UPDATE $this->table SET name=?, username=?, pass=? WHERE id=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sssi",$name,$username,$password,$user_id);
            $stmt->execute();
        }
    }