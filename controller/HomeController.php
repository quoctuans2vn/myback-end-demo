<?php
    require 'model/User.php';
    require 'model/PrivilegedUser.php';
    class HomeController {
        public $view;
        public $user;
        public $data;
        function __construct(){
            $this->user = new User();
            $this->data = '';
        }
        function index(){
            $this->view = 'view/staff/staff-home.php';
            if(!isset($_SESSION['username'])){  
                header('location: Home/login');
                exit;
            }
            else{
                $this->user = PrivilegedUser::getByUsername($_SESSION['username']);
                if ($this->user->hasRole('admin')){

                    header('location: ../Admin/loadAllForm');
                }
                else{
                    header('location: ../Home/loadForm');
                }
                
                
            }
        }
        function login(){
            $this->view = 'view/public/login.php';
            if (isset($_POST['submit'])){
                if (isset($_POST['username']) && isset($_POST['password'])){
                    if ($this->user->getUser($_POST['username'],$_POST['password'])){
                        $this->user->setSession();
                        header('location: index.php?c=Home&a=Index');
                    }
                    else{
                        echo "Username or Password is not correct!";
                    }
                }
            }
        }
        function loadForm(){
            $this->view = 'view/staff/staff-home.php';
            $this->user = PrivilegedUser::getByUsername($_SESSION['username']);
            $forms = $this->user->form->fetchForm($_SESSION['userid']);
            $json = json_encode($forms);
            $this->data = $json;
        }
        function uploadForm(){
            $this->view = 'view/staff/staff-home.php';
            //$this->user = PrivilegedUser::getByUsername($_SESSION['username']);
            $submitter = $_SESSION['name'];
            $userid = $_SESSION['userid'];
                if (isset($_POST['subject'])&&isset($_POST['contract'])&&isset($_POST['expire_time'])&&isset($_POST['description'])&&isset($_FILES['file'])){
                    var_dump($_FILES);
                    $file = $_FILES['file'];
                    $contract = $this->user->getContract($_POST['contract']);
                    if ($contract){
                        if ($this->user->form->insertForm($userid,$submitter,$_POST['subject'],$contract['name'],$_POST['expire_time'],$file,$_POST['description'])){
                        }
                    }
                }
            header('location: ../Home/loadForm');
        }
        function Inbox(){
        }
        function logout(){
            $this->view = 'view/public/login.php';
            $_SESSION = [];
            session_destroy();
        }
        
    }