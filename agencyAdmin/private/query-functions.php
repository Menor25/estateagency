<?php

/**
 * Query Functions for various module in the sms
 * 
 * Functions queries the database
 * 
 * PHP version 5
 * 
 * @category  Functions
 * @package   Functions
 * @author    Theophilus Menor <ajirimenor@gmail.com>
 * @copyright 2022 Menor SMS
 * @license   https://www.baseoncode.com Menor SMS License
 * @link      https://www.baseoncode.com
 */

require_once "autoload.php";

//Variable for error messages
$error = "";

 /**
 * Function that add a new school
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $school_name 
 * @param string $school_address 
 * 
 * @return school
 */

function addAgent($first_name, $last_name, $other_name, $gender, $biography, $phone, 
    $username, $password, $confirm_password, $agent_photo,  $email, $address, $city,  
    $state, $country, $facebook, $twitter, $linkedin, $instagram
) {
    global $conn;
    global $error;
    
   
    if (isset($first_name) && $first_name == " ") {
        $_SESSION[$error] = "Please enter first name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($last_name) && $last_name == " ") {
        $_SESSION[$error] = "Please enter last name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($email) && $email == " ") {
        $_SESSION[$error] = "Please enter your email address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($phone) && $phone == " ") {
        $_SESSION[$error] = "Please enter a mobile number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($gender) && $gender == " ") {
        $_SESSION[$error] = "Please select your gender"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($username) && $username == " ") {
        $_SESSION[$error] = "Please enter your username"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($password) && $password == " ") {
        $_SESSION[$error] = "Please enter your password"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($confirm_password) && $confirm_password == " ") {
        $_SESSION[$error] = "Please enter confirm password"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($agent_photo) && $agent_photo == " ") {
        $_SESSION[$error] = "Please upload a photo of the agent"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($address) && $address == " ") {
        $_SESSION[$error] = "Please enter your address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($state) && $state == " ") {
        $_SESSION[$error] = "Please enter your state"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($country) && $country == " ") {
        $_SESSION[$error] = "Please enter your country"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } 

    $first_name = initialCap($first_name);
    $last_name = initialCap($last_name);
    $other_name = initialCap($other_name);
    $state = initialCap($city);
    $state = initialCap($state);
    $state = initialCap($country);
    $address = initialCap($address);

    //Check for valid first name
    if (!preg_match("/^[A-Za-z]+$/", $first_name)) {
        $_SESSION[$error] = "First name field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid last name
    if (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $_SESSION[$error] = "Last name field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check if it is a valid phone number
    if (!preg_match("/^\\+?[1-9][0-9]{7,14}$/", $phone)) {
        $_SESSION[$error] = "Please enter a valid phone number";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);

    }

    //Check for valid school motto
    if (!preg_match("/^[A-Za-z ]+$/", $username)) {
        $_SESSION[$error] = "username can only contain words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid social url
    if (!empty($facebook) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $facebook)) {
        $_SESSION[$error] = "Please enter a valid facebook url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($twitter) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $twitter)) {
        $_SESSION[$error] = "Please enter a valid twitter url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($linkedin) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $linkedin)) {
        $_SESSION[$error] = "Please enter a valid linkedin url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //check if username already exist
    if (username_exists($username, "agent")) {
        $_SESSION[$error] = "This username has been taken. Please try another username.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for the length of username
    if (strlen($username) < 5) {
        $_SESSION[$error] = "username should be more than 5 words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //check for valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION[$error] = "Please enter a valid email address"; 
        $_SESSION['msg_type'] = "danger";
    }

    //check if email already exist
    if (email_exists($email, "agent")) {
        $_SESSION[$error] = "This email has been taken. Please try another email.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //check if password match
    if ($password == $confirm_password) {
        $sql_salt = "SELECT rand_salt FROM agent";
        $sql_salt_query = mysqli_query($conn, $sql_salt);

        $row_salt = mysqli_fetch_array($sql_salt_query);

        $salt = $row_salt['rand_salt'];
        //echo $salt;

        $password = crypt($password, $salt);
    } else {
        $_SESSION[$error] = "Your password did not match, please try again!"; 
        $_SESSION['msg_type'] = "danger";
        exit;
    }

    //Processing Image
    $target_dir = "images/agent/";
    $agent_photo = $target_dir . basename($_FILES["agent_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($agent_photo, PATHINFO_EXTENSION));
    $image_temp_name = $_FILES["agent_photo"]["tmp_name"];

    //Check if image file is an actual image or fake image
    $check = getimagesize($image_temp_name);
    if ($check == false) {
        $_SESSION[$error] = "Uploaded file is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    // Check if file already exists
    if (file_exists($agent_photo)) {
        $_SESSION[$error] = "Sorry, this image already exist.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    // Allowed file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    

    //if there is no error then perfrom query
    if ($error == "") {
        $sql = "SELECT * FROM agent ";
        $sql .= "WHERE first_name='". $first_name ."' ";
        $sql .= "AND email='". $email ."'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row > 0) {
            $_SESSION[$error] = "$first_name record already exist";
            $_SESSION['msg_type'] = "danger";
        } else {
            
            $sqlAdd  = "INSERT INTO agent ";
            $sqlAdd .= "(first_name, last_name, other_name, gender, biography, phone, 
                    username, password, agent_photo, email, address, city, state, country,
                    facebook, twitter, linkedin, instagram) ";
            $sqlAdd .= "VALUES ('". $first_name ."', '". $last_name ."', '". $other_name ."', '". $gender ."', 
                '". $biography ."', '". $phone ."', '". $username ."', '". $password ."', 
                '". $agent_photo ."', '". $email ."', '". $address ."', '". $city ."', '". $state ."', '". $country ."',
                '". $facebook ."', '". $twitter ."', '". $linkedin ."', '". $instagram ."')";
            //echo $sqlAdd;
            $adminQuery = mysqli_query($conn, $sqlAdd);
           
            if ($adminQuery) {
                // $new_id = mysqli_insert_id($conn);
                move_uploaded_file($image_temp_name, $agent_photo);
                redirect_to('agent');
            } else {
                $_SESSION[$error] = "Error in creating agent";
                $_SESSION['msg_type'] = "danger";
                redirect_to('add-agent');
            }
        } 
    } else {
            $_SESSION[$error] = "Unable to create agent, please contact the support team!";
            $_SESSION['msg_type'] = "danger";
            // redirect_to('add-school');
    }
}

/**
 * Function that Update agent details
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $agent_name 
 * @param string $email 
 * 
 * @return school staff
 */

function editAgent($first_name, $last_name, $other_name, $gender, $biography, $phone,  
    $username, $password, $confirm_password, $agent_photo, $email,
    $address, $city, $state, $country, 
     $facebook, $twitter, $linkedin, $instagram, $agnt_id) 
{
    global $conn;
    global $error;

    if (isset($first_name) && $first_name == " ") {
        $_SESSION[$error] = "Please enter first name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($last_name) && $last_name == " ") {
        $_SESSION[$error] = "Please enter last name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($email) && $email == " ") {
        $_SESSION[$error] = "Please enter your email address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($phone) && $phone == " ") {
        $_SESSION[$error] = "Please enter a mobile number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($gender) && $gender == " ") {
        $_SESSION[$error] = "Please select your gender"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($username) && $username == " ") {
        $_SESSION[$error] = "Please enter your username"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($password) && $password == " ") {
        $_SESSION[$error] = "Please enter your password"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($confirm_password) && $confirm_password == " ") {
        $_SESSION[$error] = "Please enter confirm password"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($agent_photo) && $agent_photo == " ") {
        $_SESSION[$error] = "Please upload a photo of the agent"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($address) && $address == " ") {
        $_SESSION[$error] = "Please enter your address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($city) && $city == " ") {
        $_SESSION[$error] = "Please enter your city"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($state) && $state == " ") {
        $_SESSION[$error] = "Please enter your state"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($country) && $country == " ") {
        $_SESSION[$error] = "Please enter your country"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } 

    $first_name = initialCap($first_name);
    $last_name = initialCap($last_name);
    $other_name = initialCap($other_name);
    $city = initialCap($city);
    $state = initialCap($state);
    $address = initialCap($address);

    //Check for valid first name
    if (!preg_match("/^[A-Za-z]+$/", $first_name)) {
        $_SESSION[$error] = "First name field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid last name
    if (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $_SESSION[$error] = "Last name field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check if it is a valid phone number
    if (!preg_match("/^\\+?[1-9][0-9]{7,14}$/", $phone)) {
        $_SESSION[$error] = "Please enter a valid phone number";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);

    }

    //Check for valid school motto
    if (!preg_match("/^[A-Za-z ]+$/", $username)) {
        $_SESSION[$error] = "username can only contain words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid social url
    if (!empty($facebook) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $facebook)) {
        $_SESSION[$error] = "Please enter a valid facebook url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($twitter) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $twitter)) {
        $_SESSION[$error] = "Please enter a valid twitter url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($linkedin) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $linkedin)) {
        $_SESSION[$error] = "Please enter a valid linkedin url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for the length of username
    if (strlen($username) < 5) {
        $_SESSION[$error] = "username should be more than 5 words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //check for valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION[$error] = "Please enter a valid email address"; 
        $_SESSION['msg_type'] = "danger";
    }

    
    //check if password match
    if ($password == $confirm_password) {
        $sql_salt = "SELECT rand_salt FROM agent";
        $sql_salt_query = mysqli_query($conn, $sql_salt);
        //echo $sql_salt;
        $row_salt = mysqli_fetch_array($sql_salt_query);

        $salt = $row_salt['rand_salt'];
        //echo $salt;

        $password = crypt($password, $salt);
    } else {
        $_SESSION[$error] = "Your password did not match, please try again!"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
        // exit;
    }

    if (empty($agent_photo) || $agent_photo == " ") {
        $get_image = "SELECT agent_photo FROM agent WHERE id=$agnt_id";
        $get_image_query = mysqli_query($conn, $get_image);
        //echo $get_image;
        while ($row = mysqli_fetch_assoc($get_image_query)) {
            $agent_photo = $row['agent_photo'];
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE agent SET ";
            $sqlUpdate .= "first_name = '".$first_name."', last_name = '".$last_name."', 
                            other_name = '".$other_name."', ";
            $sqlUpdate .= "gender = '".$gender."', biography = '".$biography."', ";
            $sqlUpdate .= "phone = '".$phone."', username = '".$username."', ";
            $sqlUpdate .= "password = '".$password."', agent_photo = '".$agent_photo."', ";
            $sqlUpdate .= "email = '".$email."', address = '".$address."', city = '".$city."', "; 
            $sqlUpdate .= "state = '".$state."', country = '".$country."', ";
            $sqlUpdate .= "facebook = '".$facebook."', twitter = '".$twitter."', ";
            $sqlUpdate .= "linkedin = '".$linkedin."', instagram = '".$instagram."' WHERE id='$agnt_id' LIMIT 1 ";
    
            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            if ($updateQuery) {
                // $new_id = mysqli_insert_id($conn);
                
                redirect_to('agent');
            } else {
                $_SESSION[$error] = "Unable to update agent details";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update agent details, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        
        
    } else {
        //Processing Image
        $target_dir = "images/agent/";
        $agent_photo = $target_dir . basename($_FILES["agent_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($agent_photo, PATHINFO_EXTENSION));
        $agent_photo_temp = $_FILES["agent_photo"]["tmp_name"];

        // Check if file already exists
        if (file_exists($agent_photo)) {
            $_SESSION[$error] = "Sorry, this image already exist.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        // Allowed file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE agent SET ";
            $sqlUpdate .= "first_name = '".$first_name."', last_name = '".$last_name."', 
                            other_name = '".$other_name."', ";
            $sqlUpdate .= "gender = '".$gender."', biography = '".$biography."', ";
            $sqlUpdate .= "phone = '".$phone."', username = '".$username."', ";
            $sqlUpdate .= "password = '".$password."', agent_photo = '".$agent_photo."', ";
            $sqlUpdate .= "email = '".$email."', address = '".$address."', city = '".$city."', "; 
            $sqlUpdate .= "state = '".$state."', country = '".$country."', ";
            $sqlUpdate .= "facebook = '".$facebook."', twitter = '".$twitter."', ";
            $sqlUpdate .= "linkedin = '".$linkedin."', instagram = '".$instagram."' WHERE id='$agnt_id' LIMIT 1 ";

            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            if ($updateQuery) {
                // $new_id = mysqli_insert_id($conn);
                move_uploaded_file($agent_photo_temp, $agent_photo);
                redirect_to('agent');
            } else {
                $_SESSION[$error] = "Unable to update agent details";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update agent details, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        }
}

/**
 * Function that delete a super admin
 * 
 * Delete all the details
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $id 
 * 
 * @return school
 */
function deleteAgent($id, $tables, $location) 
{
    global $conn;
    global $error;
    //echo "The id is " . $id;
   
        $get_image = "SELECT agent_photo FROM {$tables} WHERE id=$id";
            $get_image_query = mysqli_query($conn, $get_image);
            //echo $get_image;
            while ($row = mysqli_fetch_assoc($get_image_query)) {
                $agent_photo = $row['agent_photo'];
                unlink($agent_photo);
            }
   
        $delete_admin = "DELETE FROM {$tables} WHERE id=$id";
        $delete_admin_query = mysqli_query($conn, $delete_admin);



    if ($delete_admin_query) {
        redirect_to($location);
        
    } else {
        $_SESSION[$error] = "Unable to delete record.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
 
}

/**
 * Function that select data from database
 * 
 * Accept one input
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $table  
 * 
 * @return data
 *
*/

function getAllData($table) 
{
    global $conn;
    global $error;
    $data = array();
    $get_data = "SELECT * FROM {$table}";
    $get_data_query = mysqli_query($conn, $get_data);

    if ($get_data_query->num_rows === 0)
    {
        $_SESSION[$error] = "No record to display.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$error]);
    }
    while ($row = $get_data_query ->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

 /**
 * Function that select data from database
 * 
 * Accept one input
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $table  
 * 
 * @return data
 *
*/

function getDataById($id, $table) 
{
    global $conn;
    global $error;
    $data = array();
    $get_data = "SELECT * FROM {$table} WHERE id = {$id} LIMIT 1";
    $get_data_query = mysqli_query($conn, $get_data);

    if ($get_data_query->num_rows === 0)
    {
        $_SESSION[$error] = "No record to display.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$error]);
    }
    while ($row = $get_data_query ->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

/**
 * Function that logs user in
 *
 * @param string $username
 * @param string $password
 * @return void
 */
function login($username, $password) 
{
    global $conn;
    global $error;

    if (isset($username) && $username == " ") {
        $_SESSION[$error] = "Please enter your username"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($password) && $password == " ") {
        $_SESSION[$error] = "Please enter your password"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $result = getAllData("agent");

    foreach ($result as $agent) {
        $agent_id = $agent['id'];
        $db_username = $agent['username'];
        $db_pasword = $agent['password'];
        $first_name = $agent['first_name'];
        $last_name = $agent['last_name'];
        $other_name = $agent['other_name'];
        $gender = $agent['gender'];
        $biography = $agent['biography'];
        $phone = $agent['phone'];
        $agent_photo = $agent['agent_photo'];
        $email = $agent['email'];
        $address = $agent['address'];
        $state = $agent['state'];
        $country = $agent['country'];
        $facebook = $agent['facebook'];
        $twitter = $agent['twitter'];
        $linkedin = $agent['linkedin'];
        $instagram = $agent['instagram'];

    }
    $password = crypt($password, $db_pasword);

    if ($username == $db_username && $password == $db_pasword) {
        $_SESSION["agent_id"] = $agent_id;
        $_SESSION["username"] = $username;
        $_SESSION["first_name"] = $first_name;
        $_SESSION["last_name"] = $last_name;
        $_SESSION["other_name"] = $other_name;
        $_SESSION["gender"] = $gender;
        $_SESSION["email"] = $email;
        $_SESSION["agent_photo"] = $agent_photo;
        $_SESSION["address"] = $address;
        $_SESSION["state"] = $state;
        $_SESSION["phone"] = $phone;
        $_SESSION["country"] = $country;
        $_SESSION["facebook"] = $facebook;
        $_SESSION["twitter"] = $twitter;
        $_SESSION["linkedin"] = $linkedin;
        $_SESSION["instagram"] = $instagram;

        Redirect_to("home");
    }else {
        $_SESSION[$error] = "Username or password is incorrect."; 
        $_SESSION['msg_type'] = "danger";
    }
}

/**
 * Funtion that logs user out
 *
 * @return void
 */
function logout() 
{
        $_SESSION["agent_id"] = null;
        $_SESSION["username"] = null;
        $_SESSION["first_name"] = null;
        $_SESSION["last_name"] = null;
        $_SESSION["other_name"] = null;
        $_SESSION["gender"] = null;
        $_SESSION["email"] = null;
        $_SESSION["agent_photo"] = null;
        $_SESSION["address"] = null;
        $_SESSION["state"] = null;
        $_SESSION["phone"] = null;
        $_SESSION["country"] = null;
        $_SESSION["facebook"] = null;
        $_SESSION["twitter"] = null;
        $_SESSION["linkedin"] = null;

        Redirect_to("login");
}

/**
 * Function that Update agent details
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $agent_name 
 * @param string $email 
 * 
 * @return school staff
 */

function editSetting($company_address, $city, $state, $country, $company_email, $company_phone,  
    $company_mobile, $terms_of_usage, $privacy_policy, $international_office, $company_logo, $facebook,
    $twitter, $linkedin, $instagram, $id) 
{
    global $conn;
    global $error;

    if (isset($company_address) && $company_address == " ") {
        $_SESSION[$error] = "Please enter the company address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($city) && $city == " ") {
        $_SESSION[$error] = "Please enter the city"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($state) && $state == " ") {
        $_SESSION[$error] = "Please enter the state"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($country) && $country == " ") {
        $_SESSION[$error] = "Please enter the country"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($company_email) && $company_email == " ") {
        $_SESSION[$error] = "Please select the company email"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($company_phone) && $company_phone == " ") {
        $_SESSION[$error] = "Please enter the company phone number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($company_mobile) && $company_mobile == " ") {
        $_SESSION[$error] = "Please enter the company mobile number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($terms_of_usage) && $terms_of_usage == " ") {
        $_SESSION[$error] = "Please enter the company terms of usage"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($privacy_policy) && $privacy_policy == " ") {
        $_SESSION[$error] = "Please enter the company privacy policy"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }  elseif (isset($company_logo) && $company_logo == " ") {
        $_SESSION[$error] = "Please upload the company logo"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } 

    //Check for valid first name
    if (!preg_match("/^[A-Za-z]+$/", $city)) {
        $_SESSION[$error] = "City field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid last name
    if (!preg_match("/^[a-zA-Z]+$/", $state)) {
        $_SESSION[$error] = "State field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check if it is a valid phone number
    if (!preg_match("/^\\+?[1-9][0-9]{7,14}$/", $company_mobile)) {
        $_SESSION[$error] = "Please enter a valid mobile number";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);

    }


    //Check for valid social url
    if (!empty($facebook) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $facebook)) {
        $_SESSION[$error] = "Please enter a valid facebook url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($twitter) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $twitter)) {
        $_SESSION[$error] = "Please enter a valid twitter url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($linkedin) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $linkedin)) {
        $_SESSION[$error] = "Please enter a valid linkedin url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!empty($instagram) && !preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i', $linkedin)) {
        $_SESSION[$error] = "Please enter a valid instagram url";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }


    //check for valid email
    if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION[$error] = "Please enter a valid company email address"; 
        $_SESSION['msg_type'] = "danger";
    }


    if (empty($company_logo) || $company_logo == " ") {
        $get_image = "SELECT company_logo FROM web_setting WHERE id=$id";
        $get_image_query = mysqli_query($conn, $get_image);
        //echo $get_image;
        while ($row = mysqli_fetch_assoc($get_image_query)) {
            $company_logo = $row['company_logo'];
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE web_setting SET ";
            $sqlUpdate .= "company_address = '".$company_address."', city = '".$city."', 
                            state = '".$state."', ";
            $sqlUpdate .= "country = '".$country."', company_email = '".$company_email."', ";
            $sqlUpdate .= "company_phone = '".$company_phone."', company_mobile = '".$company_mobile."', ";
            $sqlUpdate .= "terms_of_usage = '".$terms_of_usage."', privacy_policy = '".$privacy_policy."', ";
            $sqlUpdate .= "international_office = '".$international_office."', company_logo = '".$company_logo."', facebook = '".$facebook."', "; 
            $sqlUpdate .= "twitter = '".$twitter."', linkedin = '".$linkedin."', ";
            $sqlUpdate .= "instagram = '".$instagram."' WHERE id='$id' LIMIT 1 ";
    
            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            if ($updateQuery) {
                // $new_id = mysqli_insert_id($conn);
                
                redirect_to('setting');
            } else {
                $_SESSION[$error] = "Unable to update settings";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update settings, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        
        
    } else {
        //Processing Image
        $target_dir = "images/logo/";
        $company_logo = $target_dir . basename($_FILES["company_logo"]["name"]);
        $imageFileType = strtolower(pathinfo($company_logo, PATHINFO_EXTENSION));
        $company_logo_temp = $_FILES["company_logo"]["tmp_name"];

        // Check if file already exists
        if (file_exists($company_logo)) {
            $_SESSION[$error] = "Sorry, this logo already exist.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        // Allowed file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE web_setting SET ";
            $sqlUpdate .= "company_address = '".$company_address."', city = '".$city."', 
                            state = '".$state."', ";
            $sqlUpdate .= "country = '".$country."', company_email = '".$company_email."', ";
            $sqlUpdate .= "company_phone = '".$company_phone."', company_mobile = '".$company_mobile."', ";
            $sqlUpdate .= "terms_of_usage = '".$terms_of_usage."', privacy_policy = '".$privacy_policy."', ";
            $sqlUpdate .= "international_office = '".$international_office."', company_logo = '".$company_logo."', facebook = '".$facebook."', "; 
            $sqlUpdate .= "twitter = '".$twitter."', linkedin = '".$linkedin."', ";
            $sqlUpdate .= "instagram = '".$instagram."' WHERE id='$id' LIMIT 1 ";

            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            if ($updateQuery) {
                // $new_id = mysqli_insert_id($conn);
                move_uploaded_file($company_logo_temp, $company_logo);
                redirect_to('setting');
            } else {
                $_SESSION[$error] = "Unable to update settings";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update settings, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        }
}

/**
 * Function that delete a super admin
 * 
 * Delete all the details
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $id 
 * 
 * @return school
 */
function deleteProperty($id, $tables, $location) 
{
    global $conn;
    global $error;
    //echo "The id is " . $id;
   
        $get_image = "SELECT property_plan FROM {$tables} WHERE id=$id";
            $get_image_query = mysqli_query($conn, $get_image);
            //echo $get_image;
            while ($row = mysqli_fetch_assoc($get_image_query)) {
                $property_plan = $row['property_plan'];
                unlink($property_plan);
            }
   
        $delete_admin = "DELETE FROM {$tables} WHERE id=$id";
        $delete_admin_query = mysqli_query($conn, $delete_admin);



    if ($delete_admin_query) {
        redirect_to($location);
        
    } else {
        $_SESSION[$error] = "Unable to delete record.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
 
}

/**
 * Function that delete a super admin
 * 
 * Delete all the details
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $id 
 * 
 * @return school
 */
function deletePropertyImage($id, $tables, $location) 
{
    global $conn;
    global $error;
    //echo "The id is " . $id;
   
        $get_image = "SELECT property_image FROM {$tables} WHERE id=$id";
            $get_image_query = mysqli_query($conn, $get_image);
            //echo $get_image;
            while ($row = mysqli_fetch_assoc($get_image_query)) {
                $property_image = $row['property_image'];
                unlink($property_image);
            }
   
        $delete_admin = "DELETE FROM {$tables} WHERE id=$id";
        $delete_admin_query = mysqli_query($conn, $delete_admin);



    if ($delete_admin_query) {
        redirect_to($location);
        
    } else {
        $_SESSION[$error] = "Unable to delete image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
 
}

/**
 * Function that Update agent details
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $agent_name 
 * @param string $email 
 * 
 * @return property agent
 */

function edit_property($property_name, $property_desc, $property_type, $sales_type, $property_price, 
    $property_address, $bedrooms, $square_ft, $car_parking, $year_built, $dinning_room,  
    $kitchen, $living_room, $master_bedroom, $other_room, $city, $state, $country, $swimming_pool, 
    $terrace, $air_conditioning, $internet, $balcony, $cable_tv, $computer, $dishwasher, 
    $near_green_zone, $near_church, $near_estate, $near_school, $near_hospital, $cofee_pot, $property_plan, $id) 
{
    global $conn;
    global $error;

    if (isset($property_name) && $property_name == " ") {
        $_SESSION[$error] = "Please enter the property name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_desc) && $property_desc == " ") {
        $_SESSION[$error] = "Please enter property description"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_price) && $property_price == " ") {
        $_SESSION[$error] = "Please enter property price"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_address) && $property_address == " ") {
        $_SESSION[$error] = "Please enter property address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($city) && $city == " ") {
        $_SESSION[$error] = "Please enter property city"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }elseif (isset($state) && $state == " ") {
        $_SESSION[$error] = "Please enter property state"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($country) && $country == " ") {
        $_SESSION[$error] = "Please enter country located for the property"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($company_mobile) && $company_mobile == " ") {
        $_SESSION[$error] = "Please enter the company mobile number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } 

    //Check for valid first name
    if (!preg_match("/^[A-Za-z]+$/", $city)) {
        $_SESSION[$error] = "City field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!preg_match("/^[A-Za-z]+$/", $state)) {
        $_SESSION[$error] = "State field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid last name
    if (!preg_match("/^[a-zA-Z]+$/", $country)) {
        $_SESSION[$error] = "Country field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    $get_property_plan = "SELECT property_plan FROM tbl_properties WHERE id=$id";
    $get_image_query = mysqli_query($conn, $get_property_plan);
    //echo $get_image;
    while ($row = mysqli_fetch_assoc($get_image_query)) {
        $property_plan_database = $row['property_plan'];
    }

    echo $property_plan_database;
    if (empty($property_plan) || $property_plan == " ") {
        $get_image = "SELECT property_plan FROM tbl_properties WHERE id=$id";
        $get_image_query = mysqli_query($conn, $get_image);
        //echo $get_image;
        while ($row = mysqli_fetch_assoc($get_image_query)) {
            $property_plan = $row['property_plan'];
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE tbl_properties SET ";
            $sqlUpdate .= "property_name = '".$property_name."', property_desc = '".$property_desc."', 
                            property_type = '".$property_type."', sales_type = '".$sales_type."', ";
            $sqlUpdate .= "property_price = '".$property_price."', property_address = '".$property_address."', ";
            $sqlUpdate .= "bedrooms = '".$bedrooms."', square_ft = '".$square_ft."', ";
            $sqlUpdate .= "car_parking = '".$car_parking."', year_built = '".$year_built."', ";
            $sqlUpdate .= "dinning_room = '".$dinning_room."', kitchen = '".$kitchen."', living_room = '".$living_room."', "; 
            $sqlUpdate .= "master_bedroom = '".$master_bedroom."', other_room = '".$other_room."', city = '".$city."', ";
            $sqlUpdate .= "state = '".$state."', country = '".$country."', swimming_pool = '".$swimming_pool."', "; 
            $sqlUpdate .= "terrace = '".$terrace."', air_conditioning = '".$air_conditioning."', ";
            $sqlUpdate .= "internet = '".$internet."', balcony = '".$balcony."', cable_tv = '".$cable_tv."', "; 
            $sqlUpdate .= "computer = '".$computer."', dishwasher = '".$dishwasher."', ";
            $sqlUpdate .= "near_green_zone = '".$near_green_zone."', near_church = '".$near_church."', near_estate = '".$near_estate."', "; 
            $sqlUpdate .= "near_school = '".$near_school."', near_hospital = '".$near_hospital."', ";
            $sqlUpdate .= "cofee_pot = '".$cofee_pot."', property_plan = '".$property_plan."' WHERE id='$id' LIMIT 1 ";
    
            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            if ($updateQuery) {
                // $new_id = mysqli_insert_id($conn);
                
                redirect_to('property-list');
            } else {
                $_SESSION[$error] = "Unable to update property";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update property, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        
        
    } else {
        //Processing Image
        $target_dir = "images/plan/";
        $property_plan = $target_dir . basename($_FILES["property_plan"]["name"]);
        $imageFileType = strtolower(pathinfo($property_plan, PATHINFO_EXTENSION));
        $image_temp_name = $_FILES["property_plan"]["tmp_name"];

        // Check if file already exists
        if (file_exists($property_plan)) {
            $_SESSION[$error] = "Sorry, this property plan already exist.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        // Allowed file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$error]);
        }

        //if there is no error then perfrom query
        if ($error == "") {
            $sqlUpdate  = "UPDATE tbl_properties SET ";
            $sqlUpdate .= "property_name = '".$property_name."', property_desc = '".$property_desc."', 
                            property_type = '".$property_type."', sales_type = '".$sales_type."', ";
            $sqlUpdate .= "property_price = '".$property_price."', property_address = '".$property_address."', ";
            $sqlUpdate .= "bedrooms = '".$bedrooms."', square_ft = '".$square_ft."', ";
            $sqlUpdate .= "car_parking = '".$car_parking."', year_built = '".$year_built."', ";
            $sqlUpdate .= "dinning_room = '".$dinning_room."', kitchen = '".$kitchen."', living_room = '".$living_room."', "; 
            $sqlUpdate .= "master_bedroom = '".$master_bedroom."', other_room = '".$other_room."', city = '".$city."', ";
            $sqlUpdate .= "state = '".$state."', country = '".$country."', swimming_pool = '".$swimming_pool."', "; 
            $sqlUpdate .= "terrace = '".$terrace."', air_conditioning = '".$air_conditioning."', ";
            $sqlUpdate .= "internet = '".$internet."', balcony = '".$balcony."', cable_tv = '".$cable_tv."', "; 
            $sqlUpdate .= "computer = '".$computer."', dishwasher = '".$dishwasher."', ";
            $sqlUpdate .= "near_green_zone = '".$near_green_zone."', near_church = '".$near_church."', near_estate = '".$near_estate."', "; 
            $sqlUpdate .= "near_school = '".$near_school."', near_hospital = '".$near_hospital."', ";
            $sqlUpdate .= "cofee_pot = '".$cofee_pot."', property_plan = '".$property_plan."' WHERE id='$id' LIMIT 1 ";

            //echo $sqlUpdate;
            $updateQuery = mysqli_query($conn, $sqlUpdate);

            // Delete old image from directory
            
            

            if ($updateQuery) {
                unlink($property_plan_database);
                move_uploaded_file($image_temp_name, $property_plan);
                 
                redirect_to('property-list');
            } else {
                $_SESSION[$error] = "Unable to update property";
                $_SESSION['msg_type'] = "danger";
                
            }
        
            } else {
                    $_SESSION[$error] = "Unable to update property, please contact the support team!";
                    $_SESSION['msg_type'] = "danger";
                    // redirect_to('add-school');
            }
        }
    }


/**
 * Function that Update agent details
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $agent_name 
 * @param string $email 
 * 
 * @return add-property
 */

function addProperty($agent_id, $property_name, $property_desc, $property_type, $sales_type, $property_price, 
    $property_address, $bedrooms, $square_ft, $car_parking, $year_built, $dinning_room,  
    $kitchen, $living_room, $master_bedroom, $other_room, $city, $state, $country, $swimming_pool, 
    $terrace, $air_conditioning, $internet, $balcony, $cable_tv, $computer, $dishwasher, 
    $near_green_zone, $near_church, $near_estate, $near_school, $near_hospital, $cofee_pot, $property_plan) 
{
    global $conn;
    global $error;

    if (isset($property_name) && $property_name == " ") {
        $_SESSION[$error] = "Please enter the property name"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_desc) && $property_desc == " ") {
        $_SESSION[$error] = "Please enter property description"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_price) && $property_price == " ") {
        $_SESSION[$error] = "Please enter property price"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($property_address) && $property_address == " ") {
        $_SESSION[$error] = "Please enter property address"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($city) && $city == " ") {
        $_SESSION[$error] = "Please enter property city"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }elseif (isset($state) && $state == " ") {
        $_SESSION[$error] = "Please enter property state"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($country) && $country == " ") {
        $_SESSION[$error] = "Please enter country located for the property"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } elseif (isset($company_mobile) && $company_mobile == " ") {
        $_SESSION[$error] = "Please enter the company mobile number"; 
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    } 

    //Check for valid first name
    if (!preg_match("/^[A-Za-z]+$/", $city)) {
        $_SESSION[$error] = "City field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    if (!preg_match("/^[A-Za-z]+$/", $state)) {
        $_SESSION[$error] = "State field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    //Check for valid last name
    if (!preg_match("/^[a-zA-Z]+$/", $country)) {
        $_SESSION[$error] = "Country field should only contain words.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }


    //Processing Image
    $target_dir = "images/plan/";
    $property_plan = $target_dir . basename($_FILES["property_plan"]["name"]);
    $imageFileType = strtolower(pathinfo($property_plan, PATHINFO_EXTENSION));
    $image_temp_name = $_FILES["property_plan"]["tmp_name"];

    //Check if image file is an actual image or fake image
    $check = getimagesize($image_temp_name);
    if ($check == false) {
        $_SESSION[$error] = "Uploaded file is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    // Check if file already exists
    if (file_exists($property_plan)) {
        $_SESSION[$error] = "Sorry, this property plan already exist.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    // Allowed file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }
    

    //if there is no error then perfrom query
    if ($error == "") {
        $sql = "SELECT * FROM tbl_properties ";
        $sql .= "WHERE agent_id ='". $agent_id  ."' ";
        $sql .= "AND property_address='". $property_address ."'";
        //echo $sql;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row > 0) {
            $_SESSION[$error] = "This property already exist";
            $_SESSION['msg_type'] = "danger";
        } else {
            
            $sqlAdd  = "INSERT INTO tbl_properties ";
            $sqlAdd .= "(agent_id, property_name, property_desc, property_type, sales_type, property_price, 
                    property_address, bedrooms, square_ft, car_parking, year_built, dinning_room, kitchen, living_room,
                    master_bedroom, other_room, city, state, country, swimming_pool, terrace, air_conditioning, internet,
                    balcony, cable_tv, computer, dishwasher, near_green_zone, near_church, near_estate, near_school, 
                    near_hospital, cofee_pot, property_plan) ";
            $sqlAdd .= "VALUES ('". $agent_id ."', '". $property_name ."', '". $property_desc ."', '". $property_type ."', 
                '". $sales_type ."', '". $property_price ."', '". $property_address ."', '". $bedrooms ."', 
                '". $square_ft ."', '". $car_parking ."', '". $year_built ."', '". $dinning_room ."', '". $kitchen ."', '". $living_room ."',
                '". $master_bedroom ."', '". $other_room ."', '". $city ."', '". $state ."', '". $country ."', 
                '". $swimming_pool ."', '". $terrace ."', '". $air_conditioning ."', '". $internet ."', 
                '". $balcony ."', '". $cable_tv ."', '". $computer ."', '". $dishwasher ."', 
                '". $near_green_zone ."', '". $near_church ."', '". $near_estate ."', '". $near_school ."', 
                '". $near_hospital ."', '". $cofee_pot ."', '". $property_plan ."')";
            //echo $sqlAdd;
            $adminQuery = mysqli_query($conn, $sqlAdd);
           
            if ($adminQuery) {
                // $new_id = mysqli_insert_id($conn);
                move_uploaded_file($image_temp_name, $property_plan);
                redirect_to('property-list');
            } else {
                $_SESSION[$error] = "Error in adding property";
                $_SESSION['msg_type'] = "danger";
                redirect_to('add-property');
            }
        } 
    } else {
            $_SESSION[$error] = "Unable to add property, please contact the support team!";
            $_SESSION['msg_type'] = "danger";
            // redirect_to('add-school');
}

}


 /**
 * Function that add a new school
 * 
 * Accept all the inputs
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $school_name 
 * @param string $school_address 
 * 
 * @return school
 */

function addPropertyImage($agent_id, $property_id, $property_images) {
    global $conn;
    global $error;
    
     //Processing Image
     $target_dir = "images/property/";
     $property_image = $target_dir . basename($_FILES["property_images"]["name"]);
     $imageFileType = strtolower(pathinfo($property_image, PATHINFO_EXTENSION));
     $image_temp_name = $_FILES["property_images"]["tmp_name"];
 
     //Check if image file is an actual image or fake image
     $check = getimagesize($image_temp_name);
     if ($check == false) {
         $_SESSION[$error] = "Uploaded file is not an image.";
         $_SESSION['msg_type'] = "danger";
         return ($_SESSION[$error]);
     }
 
     // Check if file already exists
     if (file_exists($property_image)) {
         $_SESSION[$error] = "Sorry, this image already exist.";
         $_SESSION['msg_type'] = "danger";
         return ($_SESSION[$error]);
     }
 
     // Allowed file formats
     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
         $_SESSION[$error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
         $_SESSION['msg_type'] = "danger";
         return ($_SESSION[$error]);
     }
     
 
     //if there is no error then perfrom query
     if ($error == "") {

             
             $sqlAdd  = "INSERT INTO property_images ";
             $sqlAdd .= "(agent_id, property_id, property_image) ";
             $sqlAdd .= "VALUES ('". $agent_id ."', '". $property_id ."', '". $property_image ."')";
             //echo $sqlAdd;
             $adminQuery = mysqli_query($conn, $sqlAdd);
            
             if ($adminQuery) {
                 // $new_id = mysqli_insert_id($conn);
                 move_uploaded_file($image_temp_name, $property_image);
                 redirect_to('property-images');
             } else {
                 $_SESSION[$error] = "Error in adding property image";
                 $_SESSION['msg_type'] = "danger";
                 redirect_to('add-property-image');
  
            }
     } else {
             $_SESSION[$error] = "Unable to add property image, please contact the support team!";
             $_SESSION['msg_type'] = "danger";
             // redirect_to('add-school');
 }

    
}