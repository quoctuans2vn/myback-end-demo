<?php 
    require 'model/Form.php';
    require 'model/User.php';

    class FormController{
        public $view;
        public $form;
        public $data;
        public $user;
        function __construct(){
            $this->form = new Form();
            $this->user = new User();
        }
        function uploadForm(){
            $this->view = 'view/home.php';
            //$name = $_SESSION['name'];
            $submitter = $_SESSION['name'];
            $userid = $_SESSION['id'];
            $_GET['message'] = 'Sorry! Something went wrong';
            if (isset($_POST['submit'])) {
                if (isset($_POST['subject'])&&isset($_POST['contract'])&&isset($_POST['expire_time'])&&isset($_POST['description'])&&isset($_FILES['file'])){
                    
                    $file = $_FILES['file'];
                    //var_dump($_FILES);
                    echo $_POST['contract'];
                    $contract = $this->user->getContract($_POST['contract']);
                    if ($contract){
                        if ($this->form->insertForm($userid,$submitter,$_POST['subject'],$contract['name'],$_POST['expire_time'],$file,$_POST['description'])){
                            header('location: index.php?message=Success&active=createForm');
                        }
                    }
                }
            }
            //$data = ['message' => $mes];
            //$this->data = json_encode($data);
        }

        function loadForm(){
            $this->view = 'view/home.php';
            $forms = $this->form->fetchForm($_SESSION['id']);
            $json = json_encode($forms);
            $this->data = $json;
            return $json;
        }
    }
    $controller = new FormController();