<?php
    require 'model/User.php';
    
    class HomeController {
        public $view;
        public $user;
        public $data;
        function __construct(){
            //$this->users = new User();
            $this->user = new User();
            $this->data = '';
            //$this->form = new Form();
        }
        // function pullUser(){
        //     $user = $this->users->getUser(1);
        //     $this->view = 'view/home.php';
        //     $data = ['user' => $user];
        //     $this->data = json_encode($data);
        // }
        function index(){
            $this->view = 'view/home.php';
            if(!isset($_SESSION['username'])){  
                header('location: index.php?a=login');  
            }
        }
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
        function Inbox(){
            $this->view = 'view/home.php';
        }
        function logout(){
            $this->view = 'view/login.php';
            $_SESSION = [];
            session_destroy();
        }
        
    }
       $controller = new HomeController();