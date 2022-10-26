<?php
// require_once "db_object.php";

    class Amenity extends Db_object {
        protected static $db_table = "amenities";
        protected static $db_table_fields = array('property_id', 'balcony', 'deck', 
                                                'outdoor_kitchen', 'tennis_court', 'sun_room', 
                                                 'cable', 'internet', 'swimming_pool', 'air_conditioning', 'near_church', 
                                                'near_hospital', 'near_school');
        
        public $id;
        public $property_id;
        public $balcony;
        public $deck;
        public $outdoor_kitchen;
        public $tennis_court;
        public $sun_room;
        public $cable;
        public $internet;
        public $swimming_pool;
        public $air_conditioning;
        public $near_church;
        public $near_hospital;
        public $near_school;

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