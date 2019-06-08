<?php 
    class Role{
        protected $permissions;
        private $table;
        protected function __construct(){
            $this->permissions = array();

        }
        // Return a role object with assoc permissions ( pers is array)
        public static function getRolePerms($role_id){
            $sql = "SELECT perm_desc FROM role_perm as t1 JOIN permissions as t2 ON t1.perm_id = t2.perm_id WHERE t1.role_id = ?";
            $role = new Role();
            $stmt = $GLOBALS['DB']->prepare($sql);
            $stmt->bind_param("s",$role_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $role->permissions[$row['perm_desc']] = true;
                }
            }
            return $role;
        }
        public function hasPerm($perms){
            return isset($this->permissions[$perms]);
        }
        public static function insertUserRole($user_id,$role_id){
            $query = "INSERT INTO user_role(user_id,role_id) VALUES(?,?)";
            $stmt = $GLOBALS['DB']->prepare($query);
            $stmt->bind_param("ii",$user_id,$role_id);
            $stmt->execute();
            return true;
        }
        public static function getAllPerms(){
            $query = "SELECT * FROM permissions";
            $result = $GLOBALS['DB']->query($query);
            $perms = array();
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $perms[] = $row;
                }
            }
            return $perms;
        }
        public static function getAllRoles(){
            $query = "SELECT * FROM roles";
            $result = $GLOBALS['DB']->query($query);
            $roles = array();
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $roles[] = $row;
                }
            }
            return $roles;
        }
        public static function updateUserRole($user_id,$role_id){
            $query = "UPDATE user_role SET role_id = ? WHERE user_id = ?";
            $stmt = $GLOBALS['DB']->prepare($query);
            $stmt->bind_param("ii",$role_id,$user_id);
            $stmt->execute();
            return true;
        }
    }