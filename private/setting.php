<?php
require_once "db_object.php";

    class Setting extends Db_object {
        protected static $db_table = "web_setting";
        protected static $db_table_fields = array('company_address', 'city', 'state', 'country', 
                                                'company_email', 'company_phone', 'company_mobile', 'terms_of_usage', 
                                                 'privacy_policy', 'international_office', 'company_logo');
        
        public $id;
        public $company_address;
        public $city;
        public $state;
        public $country;
        public $company_email;
        public $company_phone;
        public $company_mobile;
        public $terms_of_usage;
        public $privacy_policy;
        public $international_office;
        public $company_logo;
        public $facebook;
        public $twitter;
        public $linkedin;
        public $instagram;
        public $upload_directory = "\images\logo";
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


		$this->company_logo =  basename($file['name']);
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
    
        if(empty($this->company_logo) || empty($this->tmp_path)){
                    $this->errors[] = "the file was not available";
                    return false;
        }
    
        $target_path = SITE_ROOT . DS . 'agencyAdmin' . DS . $this->upload_directory . DS . $this->company_logo;
    
    
        if(file_exists($target_path)) {
                    $this->errors[] = "The file {$this->company_logo} already exists";
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

    return empty($this->company_logo) ? $this->image_placeholder : $this->upload_directory.DS.$this->company_logo;

}

       
    } //EOF of agent class

?>