<?php
require_once "db_object.php";

    class Property extends Db_object {
        protected static $db_table = "tbl_properties";
        protected static $db_table_fields = array('agent_id', 'property_name', 'property_desc', 'property_type', 
                                                'sales_type', 'property_price', 'property_address', 'bedrooms', 
                                                 'square_ft', 'car_parking', 'year_built', 'dinning_room', 'kitchen', 
                                                'living_room', 'master_bedroom', 'other_room', 
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
        public $upload_directory = "\images\plan";
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


		$this->property_plan =  basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->type     = $file['type'];
		$this->size     = $file['size'];


		}



}

    
public function save_user_and_image() 
{
    if($this->id) {
        $this->update();          
    } else {
    
        if(!empty($this->errors)) {
            return false;
        }
    
        if(empty($this->property_plan) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available";
                    return false;
        }
    
        $target_path = SITE_ROOT . DS . 'estateAdmin' . DS . $this->upload_directory . DS . $this->property_plan;
    
    
        if(file_exists($target_path)) {
                    $this->errors[] = "The file {$this->property_plan} already exists";
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

public function image_path_and_placeholder() {

    return empty($this->property_plan) ? $this->image_placeholder : $this->upload_directory.DS.$this->property_plan;

}

       
    } //EOF of agent class

?>