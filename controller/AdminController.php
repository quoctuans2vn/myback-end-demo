<?php 
    require 'model/Form.php';
    require 'model/User.php';
    require 'model/PrivilegedUser.php';
    class AdminController{
        public $view;
        public $form;
        public $data;
        public $user;
        function __construct(){
            $this->form = new Form();
            if (!isset($_SESSION['username'])){
                exit;
            }
            $this->user = PrivilegedUser::getByUsername($_SESSION['username']);
        }
        function loadAllForm(){
            if ($this->user->hasPrivileged('LoadAllForm')){
                $forms = $this->form->fetchAllForm();
                $this->view = 'view/admin/AllForm.php';
            }
            else{
                exit;
            }
            // Someone just load some form.
            $json = json_encode($forms);
            $this->data = $json;
        }
        function loadAllUser(){
            if ($this->user->hasPrivileged('LoadAllUser')){
                $users = $this->user->fetchAllUser($_SESSION['userid']);
                $json = json_encode($users);
                $this->data = $json;
                $this->view = 'view/admin/AllUser.php';
            }
            else{
                exit;
            }
        }
        /**
         * 
         * 
         * update state db
         * add Ajax button state 
         */
        public function changeStatusForm(){
            //$this->view = 'view/home.php';
            //$this->user = PrivilegedUser::getByUsername($_SESSION['username']);
            if ($this->user->hasPrivileged('ChangeStatusForm')){
                if ($_GET['form_state'] == '0'){
                    if ($this->form->checkForm($_GET['form_id'],$_GET['form_state'])){
                        $this->form->updateForm($_GET['form_id']);
                    }
                }
                $this->loadAllForm();
            }
            else exit;
            //Some one just load some form
            $this->view = 'view/ajax/StateButton.php';
        }
        /**
         * 
         * 
         * delete user db
         * use Ajax to delete element after delete 
         */
        public function deleteUser(){
            if($_GET['user_id']){
                if ($this->user->hasPrivileged('DeleteUser')){
                    if ($this->user->getUserById($_GET['user_id'])){
                        $this->user->deleteUser($_GET['user_id']);
                    }
                }
            }
            $this->view = 'view/ajax/StateButton.php';
        }
        /**
         * 
         * 
         * add user db
         * add Ajax card element
         */
        public function addUser(){
            $this->view = 'view/admin/AllUser.php';
            if ($this->user->hasPrivileged('AddUser')){
                if (isset($_POST['create_name']) && isset($_POST['create_usrname']) && isset($_POST['create_pass']) && isset($_POST['change_role'])){
                    if(!$this->user->getContract($_POST['create_usrname'])){
                        $this->user->insertUser($_POST['create_name'],$_POST['create_usrname'],$_POST['create_pass'],$_POST['change_role']);
                        header ('location: ../Admin/loadAllUser');
                    }else exit;
                }
            }else exit;
        }
        public function editUser(){
            $this->view = 'view/admin/AllUser.php';
            $this->loadAllUser();
            var_dump($_POST);   
            if ($this->user->hasPrivileged('EditUser')){
                if (isset($_POST['userid']) && isset($_POST['change_name']) && isset($_POST['change_usrname']) && isset($_POST['change_pass']) && isset($_POST['change_role'])){
                    if ($user = $this->user->getUserById($_POST['userid'])){
                        $this->user->updateUser($_POST['userid'],$_POST['change_name'],$_POST['change_usrname'],$_POST['change_pass']);
                        $this->user->updateUserRole($_POST['userid'],$_POST['change_role']);
                    }
                }
            }
        }

        /**
         * 
         * 
         * get permissions db
         * add Ajax div element
         */
        public function getPermissions(){
            if ($this->user->hasRole('admin')){
                $perms = Role::getAllPerms();
                $json = json_encode($perms);
                $this->data = $json;
                $this->view = 'view/ajax/ShowPermissions.php';
            }else exit;
        }
        public function getRoles(){
            if ($this->user->hasRole('admin')){
                $roles = Role::getAllRoles();
                $json = json_encode($roles);
                $this->data = $json;
                $this->view = 'view/ajax/ShowRoles.php';
            }else exit;
        }
        
        function logout(){
            $this->view = 'view/public/login.php';
            $_SESSION = [];
            session_destroy();
        }


    }