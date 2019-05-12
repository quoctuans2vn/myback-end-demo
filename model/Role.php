<?php 
    class Role{
        protected $permissions;
        protected function __construct(){
            $this->permissions = array();
        }
        // Return a role object with assoc permissions ( pers is array)
        public static function getRolePerms($role_id){
            
        }
    }