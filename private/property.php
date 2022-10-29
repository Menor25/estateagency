<?php
require_once "db_object.php";

    class Property extends Db_object {
        protected static $db_table = "tbl_properties";
        protected static $db_table_fields = array('agent_id', 'property_name', 'property_desc', 'property_type', 
                                                'sales_type', 'property_price', 'property_address', 'bedrooms', 
                                                 'square_ft', 'car_parking', 'year_built', 'dinning_room', 'kitchen', 
                                                'living_room', 'master_bedroom', 'other_room', 'city',  
                                                'state', 'country', 'swimming_pool', 'terrace', 'air_conditioning', 
                                                'internet', 'balcony', 'cable_tv', 'computer', 'dishwasher', 
                                                'near_green_zone', 'near_church', 'near_estate', 'near_school', 'near_hospital', 
                                                'cofee_pot', 'property_plan');
        
        public $id;
        public $agent_id;
        public $property_name;
        public $property_desc;
        public $property_type;
        public $sales_type;
        public $property_price;
        public $property_address;
        public $bedrooms;
        public $square_ft;
        public $car_parking;
        public $year_built;
        public $dinning_room;
        public $kitchen;
        public $living_room;
        public $master_bedroom;
        public $other_room;
        public $city;
        public $state;
        public $country;
        public $swimming_pool;
        public $terrace;
        public $air_conditioning;
        public $internet;
        public $balcony;
        public $cable_tv;
        public $computer;
        public $dishwasher;
        public $near_green_zone;
        public $near_church;
        public $near_estate;
        public $near_school;
        public $near_hospital;
        public $cofee_pot;

        public $property_plan;
       

       
    } //EOF of agent class

?>