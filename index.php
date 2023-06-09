<!-- 
Web App Submission
Event Planner & Item Rental System
Company: Melrose Blooms & Events

BSIT2-A
Kirby Jayrich R. Calampinay
John Armor E. Espinosa
-->

<?php

/* include the class file (global - within application) */
include_once 'classes/classUser.php';
include 'config/config1.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();

// checks login
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);

?>

<!--Main Index page-->
<!DOCTYPE html>
<html>
<head>
    <title> Main Page </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>

    <div id="header">
   
    </div>
<div id="wrapper">
  <div id="box">
  <ul>
  <li class="left-item"><i> Melrose Blooms & Events </i> </li>
     <li class="right-item"><a href="logout.php"><i> Log Out </i></a> </li>
     <li class="right-item"><a href="index.php?page=test"><i> Transactions </i></a> </li>
     <li class="right-item"><a href="index.php?page=chart"><i> Rental Chart </i></a> </li>
     <li class="right-item"><a href="index.php?page=rentals"><i> Rentals </i></a> </li>
     <li class="right-item"><a href="index.php?page=customers"><i> Customers </a></i> </li>
     <li class="right-item"><a href="index.php?page=event"><i> View Events </a></i> </li>
     <li class="right-item"><a href="index.php"><i> Overview </a></i> </li>
  

     
     
</ul>
  </div>
  <?php
      switch($page){
                case 'event':
                  require_once 'event-module/index.php';
                break;
                case 'transac':
                  require_once 'transac-module/index.php';
                break;
                case 'rentals':
                  require_once 'rental-module/index.php';
                break;
                case 'customers':
                  require_once 'customer-module/index.php';
                break;
                case 'test':
                  require_once 'transac2-module/index.php';
                break;
                case 'chart':
                  require_once 'main.php';
                break;
                default:
                  require_once 'overview-module/index.php';
                break;
      }