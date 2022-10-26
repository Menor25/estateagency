<?php
require_once "db_object.php";

    class Agent extends Db_object {
        protected static $db_table = "agent";
        protected static $db_table_fields = array('first_name', 'last_name', 
                                                'other_name', 'gender', 'biography', 
                                                'phone', 'username', 'password', 
                                                 'agent_photo', 'email', 'address', 'state', 
                                                'country', 'facebook', 'twitter', 
                                                'linkedin');
        
        public $id;
        public $first_name;
        public $last_name;
        public $other_name;
        public $gender;
        public $biography;
        public $phone;
        public $username;
        public $password;
        public $confirm_password;
        public $email;
        public $address;
        public $state;
        public $country;
        public $facebook;
        public $twitter;
        public $linkedin;
        public $agent_photo;
        public $upload_directory = "images";
        public $image_placeholder = "http://placehold.it/400x400&text=image";

    // This is passing $_FILES['uploaded_file'] as an argument
	public function set_file($file) { 

		if(empty($file) || !$file || !is_array($file)) {
		$this->errors[] = "There was no file uploaded here";
		return false;

		}elseif($file['error'] !=0) {

		$this->errors[] = $this->upload_errors_array[$file['error']];
		return false;

		} else {


		$this->agent_photo =  basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->type     = $file['type'];
		$this->size     = $file['size'];


		}



}

        /**
         * Method that verifies agent
         */
        public static function verify_user($username, $password)
        {
            global $database;

            $username = $database->escape_string($username);
            $password = $database->escape_string($password);

            $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
            $sql .= "username = '{$username}' ";
            $sql .= "AND password = '{$password}' ";
            $sql .= "LIMIT 1";

            $the_result_array = self::find_global_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }

    
        public function save_user_and_image() 
        {
    
            if($this->id) {
    
                $this->update();
                
            } else {
    
                if(!empty($this->errors)) {
    
                    return false;
    
                }
    
                if(empty($this->agent_photo) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available";
                    return false;
                }
    
                $target_path = SITE_ROOT . DS . 'estateAdmin' . DS . $this->upload_directory . DS . $this->agent_photo;
    
    
                if(file_exists($target_path)) {
                    $this->errors[] = "The file {$this->agent_photo} already exists";
                    return false;
    
    
    
                }
    
                if(move_uploaded_file($this->tmp_path, $target_path)) {
    
                    if(	$this->create()) {
    
                        unset($this->tmp_path);
                        return true;
    
                    }
    
    
    
                } else {
    
                    $this->errors[] = "the file directory probably does not have permission";
                    return false;
    
                }
    
    
               }
     
    
    
        }

       
    } //EOF of agent class

?>