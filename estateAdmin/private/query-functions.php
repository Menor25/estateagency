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

function addAgent($first_name, $last_name, $other_name, $phone, $gender, $email,
    $username, $password, $confirm_password, $address, $state, $country, 
    $agent_photo, $biography, $facebook, $twitter, $linkedin
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
                    username, password, agent_photo, email, address, state, country,
                    facebook, twitter, linkedin) ";
            $sqlAdd .= "VALUES ('". $first_name ."', '". $last_name ."', '". $other_name ."', '". $gender ."', 
                '". $biography ."', '". $phone ."', '". $username ."', '". $password ."', 
                '". $agent_photo ."', '". $email ."', '". $address ."', '". $state ."', '". $country ."',
                '". $facebook ."', '". $twitter ."', '". $linkedin ."')";
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

function editAgent($first_name, $last_name, $other_name, $phone, $gender, $email,
    $username, $password, $confirm_password, $address, $state, $country, 
    $agent_photo, $biography, $facebook, $twitter, $linkedin, $a_id) 
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
        $get_image = "SELECT agent_photo FROM agent WHERE id=$a_id";
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
            $sqlUpdate .= "email = '".$email."', address = '".$address."', ";
            $sqlUpdate .= "state = '".$state."', country = '".$country."', ";
            $sqlUpdate .= "facebook = '".$facebook."', twitter = '".$twitter."', ";
            $sqlUpdate .= "linkedin = '".$linkedin."' WHERE id='$a_id' LIMIT 1 ";
    
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
            $sqlUpdate .= "email = '".$email."', address = '".$address."', ";
            $sqlUpdate .= "state = '".$state."', country = '".$country."', ";
            $sqlUpdate .= "facebook = '".$facebook."', twitter = '".$twitter."', ";
            $sqlUpdate .= "linkedin = '".$linkedin."' WHERE id='$a_id' LIMIT 1 ";

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