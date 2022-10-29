<?php
require_once "autoload.php";
//$error = "";
/**
 * Functions for various module in the sms
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

/**
 * Encrypt all string
 * 
 * Accept the string as an input
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $string for all string 
 * 
 * @return encrypted string
 */
function h($string = "")
{
    return(htmlspecialchars($string));
}

/**
 * Confirm query function
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $string for all string 
 * 
 * @return true
 */
function confirmQuery($result)
{
    global $conn;
    if (!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
}

/**
 * Function for all post request
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param post request
 * 
 * @return a post request
 */
function Is_Post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Function that handles get request
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param get request
 * 
 * @return a get request
 */
function Is_Get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

/**
 * Function that handles redirection to other pages
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param $location get the location string
 * 
 * @return a page redirection
 */
function Redirect_to($location)
{
    header("Location: " . $location);
    exit;
}

/**
 * Function that encodes an id
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $id
 * 
 * @return a encoded string
 */

function encodeString($string)
{
    return urlencode(base64_encode($string));
}

/**
 * Function that decodes an id
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $id
 * 
 * @return a decoded string
 */

function decodeString($string)
{
    return base64_decode(urldecode($string));
}

/**
 * Function that convert string to initial capital letters
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $string
 * 
 * @return a Initial upper case letter
 */

function initialCap($string)
{
    return ucwords(strtolower($string));
}

/**
 * Function that checks if email exists
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $email
 * 
 * @return true
 */

function email_exists($email, $table)
{
    global $conn;

    $query = "SELECT email FROM $table WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Function that checks if email exists
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $email
 * 
 * @return true
 */

function username_exists($username, $table)
{
    global $conn;

    $query = "SELECT username FROM {$table} WHERE username = '$username'";

    $result = mysqli_query($conn, $query);


    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * Function that checks if column exists
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string $column
 * 
 * @return true
 */

function if_exists($col_name, $col_value, $table)
{
    global $conn;

    $query = "SELECT {$col_name} FROM {$table} WHERE {$col_name} = '$col_value'";
    $result = mysqli_query($conn, $query);

    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}


/**
 * Function that process image
 * 
 * @access public
 * 
 * @author Thephilus Menor
 * 
 * @param string the path to the image $path
 * @param string the image name $image_name
 * 
 * @return true
 */

function processImage($path, $image_name)
{
    global $conn;

    $target_dir = "$path";
    $image = $target_dir . basename($_FILES["$image_name"]["name"]);
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $image_temp_name = $_FILES["$image_name"]["tmp_name"];
    echo $image_temp_name . "hello";

    //Check if image file is an actual image or fake image
    $check = getimagesize($image_temp_name);
    if ($check == false) {
        $_SESSION[$error] = "Uploaded file is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$error]);
    }

    // Check if file already exists
    if (file_exists($image)) {
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

}

