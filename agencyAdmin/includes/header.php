<?php
    require_once "../agencyAdmin/private/autoload.php";
    require_once "../agencyAdmin/private/init.php";

	//  Restrict any user that is not logged in
	 if(!isset($_SESSION['agent_id'])){
        redirect_to('login');
        exit();
    }
?>
<?php 
    $welcome = "Elema Igie Ventures";
?>
<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="RealEstate Admin Dashboard template, UI kit, Bootstrap 4x">
<meta name="author" content="Thememakker">
<title><?= $welcome; ?> :: Home</title>
<link rel="icon" href="assets/images/Elema-igie.PNG" type="image/x-icon"> 
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css" />
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />

<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>