<?php
require_once "db_object.php";

    class PropertyImages extends Db_object {
        protected static $db_table = "property_images";
        protected static $db_table_fields = array('agent_id', 'property_id', 'property_image');
        
        public $id;
        public $agent_id;
        public $property_id;
        public $property_image;


   
       
    } //EOF of agent class

?>