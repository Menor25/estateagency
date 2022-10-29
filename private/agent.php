<?php
require_once "db_object.php";

    class Agent extends Db_object {
        protected static $db_table = "agent";
        protected static $db_table_fields = array('first_name', 'last_name', 
                                                'other_name', 'gender', 'biography', 
                                                'phone', 'username', 'password', 
                                                 'agent_photo', 'email', 'address', 'city', 'state', 
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
        public $city;
        public $state;
        public $country;
        public $facebook;
        public $twitter;
        public $linkedin;
        public $instagram;
        public $agent_photo;
        public $upload_directory = "images";
        public $image_placeholder = "http://placehold.it/400x400&text=image";

   
       
    } //EOF of agent class

?>