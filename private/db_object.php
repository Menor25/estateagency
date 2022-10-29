<?php

    class Db_object
    {
        /**
         * method that set files path
         */
    //     public function set_file($file) { 

    //         if(empty($file) || !$file || !is_array($file)) {
    //         $this->errors[] = "There was no file uploaded here";
    //         return false;
    
    //         }elseif($file['error'] !=0) {
    
    //         $this->errors[] = $this->upload_errors_array[$file['error']];
    //         return false;
    
    //         } else {
    
    
    //         $this->user_image =  basename($file['name']);
    //         $this->tmp_path = $file['tmp_name'];
    //         $this->type     = $file['type'];
    //         $this->size     = $file['size'];
    
    
    //         }
    
    
    
    // }

        /**
         * Method that checks if attribute exists
         *
         * @param $the_attribute
         * @return array_key_exists
         */
        private function has_the_attribute($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        /**
         * Method that instatiate parameters
         *
         * @param $the_record
         * @return $object
         */
        public static function instatiation($the_record) 
        {
            $calling_class =get_called_class();
            $user_object = new $calling_class;

    
        foreach ($the_record as $the_attribute => $value) {
            if ($user_object->has_the_attribute($the_attribute)) {
                $user_object->$the_attribute = $value;
            }
        }
    
           return $user_object;
        }
        /**
         * Method that perform all querys
         *
         * @sql
         */
        public static function find_global_query($sql)
        {
            global $database;

            $result_set = $database->query($sql);
            $the_object_array = array();

            while ($row = mysqli_fetch_array($result_set)) {
                $the_object_array[] = static::instatiation($row);

            }
            return $the_object_array;
        }
        
        /**
         * Method that get all datas from the database randomly
         */
        public static function find_all_rand()
        {
            return static::find_global_query("SELECT * FROM " .static::$db_table ." ORDER BY RAND() LIMIT 3");
        }

         /**
         * Method that get all datas from the database randomly
         */
        public static function find_all_properties_limit()
        {
            return static::find_global_query("SELECT * FROM " .static::$db_table ." LIMIT 6");
        }

        /**
         * Method that get all datas from the database randomly
         */
        public static function find_all_rand_slide()
        {
            return static::find_global_query("SELECT * FROM " .static::$db_table ." ORDER BY RAND() LIMIT 5");
        }

        /**
         * Method that get all datas from the database 
         */
        public static function find_all()
        {
            return static::find_global_query("SELECT * FROM " .static::$db_table ." ");
        }

        /**
         * Method that get all datas from the database by id
         */
        public static function find_all_by_id($id, $column)
        {
            return static::find_global_query("SELECT * FROM " .static::$db_table ." WHERE $column = $id");
        }

        /**
         * Method that gets a data by id
         */
        public static function find_by_id($id)
        {
            global $database;

            $this_result_array = static::find_global_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");

            return !empty($this_result_array) ? array_shift($this_result_array) : false;
        }

        /**
         * Method that get databaase table properties
         * @return  table_properties
         */
        protected function properties()
        {
            $properties = array();
            foreach (static::$db_table_fields as $db_field) {
                if(property_exists($this, $db_field)){
                    $properties[$db_field] = $this->$db_field;
                }
                
            }
            return $properties;
        }

        /**
         * Method that clean the properties
         */
        protected function clean_properties()
        {
            global $database;
            $clean_properties = array();

            foreach ($this->properties() as $key => $value) {
                $clean_properties[$key] = $database->escape_string($value);
            }
            return $clean_properties;
        }

        /**
         * Method that check if id exist, then create or update data
         */
        public function save()
        {
            return isset($this->id) ? $this->update() : $this->create();
        }

        /**
         * Function that add data to the database
         */
        public function create()
        {
            global $database;

            $properties = $this->clean_properties();

            $sql = "INSERT INTO " .static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            

            if ($database->query($sql)) {
                $this->id = $database->the_insert_id();
                return true;
            }else {
                return false;
            }
        }

        public function update()
        {
            global $database;
            $properties = $this->clean_properties();
            $properties_pairs = array();

            foreach ($properties as $key => $value) {
                $properties_pairs[] = "{$key}='{$value}'";

            }
            
            $sql = "UPDATE " .static::$db_table . " SET ";
            $sql .= implode(", ", $properties_pairs);
            $sql .= " WHERE id= " . $database->escape_string($this->id);

            $database->query($sql);

            return (mysqli_affected_rows($database->connection) == 1) ? true : false;

        }

        public function delete()
        {
            global $database;

            $sql = "DELETE FROM " .static::$db_table . " ";
            $sql .= "WHERE id=" . $database->escape_string($this->id);
            $sql .= " LIMIT 1";

            $database->query($sql);

            return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        }
        
    } //EOF for db_objects class
    

?>