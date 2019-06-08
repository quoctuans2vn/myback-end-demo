<?php 
    require 'Role.php';
    class PrivilegedUser extends User{
        // 1 user might have many roles. So roles is associated array of objects roles[]
        private $roles;
        function __construct(){
            parent::__construct();
        }
        //Override User method
        public static function getByUsername($username){
            $sql = "SELECT * FROM users WHERE username = ?";
            $user = new PrivilegedUser();
            $stmt = $user->db->prepare($sql);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();
            //$row = $result->fetch_assoc();
            if ($result->num_rows == 1){
                $arr = $result->fetch_assoc();
                $user->user_id = $arr['id'];
                $user->name_user = $arr['name'];
                $user->username = $username;
                $user->password = $arr['pass'];
                $user->initRoles();
                return $user;
            }
            else return false;
        }
        protected function initRoles(){
            $this->roles = array();
            $sql = "SELECT t1.role_id, t2.role_name FROM user_role as t1
                JOIN roles as t2 ON t1.role_id = t2.role_id
                WHERE t1.user_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s",$this->user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $this->roles[$row['role_name']] = Role::getRolePerms($row['role_id']);
                }
            }
        }
        public function insertUser($name,$user_name,$password,$role_id){
            $query = "INSERT INTO $this->table(username,pass,name) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sss",$user_name,$password,$name);
            $stmt->execute();
            $user = $this->getContract($user_name);
            if ($user){
                Role::insertUserRole($user['id'],$role_id);
            } 
        }
        public function getAllRoles(){
            return Role::getAllRoles();
        }
        public function updateUserRole($user_id,$role_id){
            return Role::updateUserRole($user_id,$role_id);
        }
        public function getOtherRoles($user_name){
            $user = PrivilegedUser::getByUsername($user_name);
            return $user->roles;
        }
        public function hasRole($role){
            return isset($this->roles[$role]);
        }
        public function hasPrivileged($perm){
            foreach($this->roles as $role){
                if ($role->hasPerm($perm)){
                    return true;
                }
            }
            return false;
        }

        
    }