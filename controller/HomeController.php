<?php
    require 'model/User.php';
    
    class HomeController {
        public $view;
        public $user;
        public $data;
        public $form;
        function __construct(){
            //$this->users = new User();
            $this->user = new User();
            $this->form = new Form();
        }
        // function pullUser(){
        //     $user = $this->users->getUser(1);
        //     $this->view = 'view/home.php';
        //     $data = ['user' => $user];
        //     $this->data = json_encode($data);
        // }
        function login(){
            $this->view = 'view/login.php';
            if (isset($_POST['submit'])){
                if (isset($_POST['username']) && isset($_POST['password'])){
                    $user = $this->user->getUser($_POST['username'],$_POST['password']);
                    if ($user){
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['role'] = $user['role'];  
                        $_SESSION['section'] = $user['section'];
                        header('Location: index.php?a=index');
                    }
                    else{
                        echo "Username or Password is not correct!";
                    }
                }
            }
        }
        function index(){
            $this->view = 'view/home.php';
            if(!isset($_SESSION['username'])){  
                header('location: index.php?a=login');  
            }
        }
        function logout(){
            $this->view = 'view/login.php';
            $_SESSION = [];
            session_destroy();
        }
        function isValid($subject,$contract,$expire_time,$file_extension,$file_size){
            if (isset($_POST['submit'])){  
                
                if (empty($subject) || empty($contract) || empty($expire_time)){
                    $errorEmpty = true;
                }
                else if (!in_array($file_extension,['pdf','jpg','jpeg','png','doc','docx','xlsx'])){
                    $errorFile = true;
                }
                return $errorEmpty && $errorFile;
            }
            else{
                return false;
            }
        }
        function uploadForm(){
            $name = $_SESSION['name'];
            $username = $_SESSION['username'];
            $subject = $_POST['subject'];
            $contract = $_POST['contract'];
            $expire_time = $_POST['expire_time'];
            $file_name = $_POST['file_name'];
            $file_extension = $_POST['file_extension'];
            $file_size = $_POST['file_size'];

            $errorEmpty = false;
            $errorFile = false;
            if (isValid($subject,$contract,$expire_time,$file_extension,$file_size)) {
                
            }   
        }
    }
       $controller = new HomeController();