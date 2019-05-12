<?php
    class Form{
        private $db;
        private $table;
        function __construct(){
            $this->table = 'forms';
            $this->db = new mysqli('localhost','root','','user');
        }
        function insertForm($userid,$submitter,$subject,$contract,$expire_time,$file,$description){
            //Prepare and Bind
            $query = "INSERT INTO $this->table (userid,subject,contract,expiretime,filename,filetype,description,state,submitter,timesubmit) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("issssssiss",$userid,$subject,$contract,$expire_time,$file_name,$file_extension,$description,$state,$submitter,$timesubmit);
            //Values into databases
            $timesubmit = date("d-m-Y",time());
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_tmp = $file['tmp_name'];
            $string_explode = explode('.',$file_name);
            $file_extension = strtolower(end($string_explode));
            $state = 0;

            
            //Check empty Input
            if (empty($subject) || empty($contract) || empty($expire_time) ){
                return false;
            }
            //Check file upload
            $target_dir = "uploads/";
            $target_file = $target_dir.basename($file_name);
            $check = getimagesize($file_tmp);
            if (!$check || file_exists($target_file) || $file_size > 500000){
                return false;
            }
            if (!in_array($file_extension,['pdf','jpg','jpeg','png','doc','docx'])){
                return false;
            }
            //Check validate expiretime
            $format = 'd-m-Y';
            $d = Datetime::createFromFormat($format,$expire_time);
            if (!($d && $d->format($format) == $expire_time)){
                return false;
            }
            else{
                // If Expire-time < Time Submit
                if (strtotime($expire_time) < strtotime($timesubmit)){
                    return false;
                }
            }
            //Execute it
            $stmt->execute();
            if (!move_uploaded_file($file_tmp, $target_file)){
                return false;
            }
            unset($_POST['submit']);
            return true;
        }

        function fetchForm($userid){
            $query = "SELECT * FROM $this->table WHERE userid = '".$userid."'";
            $result = $this->db->query($query);
            $forms = array();
            while ($obj = $result->fetch_assoc()){
                $forms[] = $obj;
            }
            return $forms;
            /*
            if ($result->num_rows > 0){
                $user = $result->fetch_array();
                foreach($user as $key => $value){
                    echo "$user[$key] => $value";
                    echo '<br>';
                }
                var_dump($user);
            }
            */
        }

    }