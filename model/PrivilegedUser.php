<?php 
    class PrivilegedUser extends User{
        // 1 user might have many roles. So roles is associated array of objects roles[]
        private $roles;
        
    }