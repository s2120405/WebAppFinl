<?php
//Include rental Class File
include '../classes/custClass.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_customer();
	break;
    case 'update':
        update_customer();
	break;
    case 'deactivate':
        deactivate_customer();
	break;
}

//function that creates a new rental
function create_new_customer(){
	$customers = new Customers();
    $cfname = ucwords($_POST['cust_fname']);
    $clname = ucwords($_POST['cust_lname']);
    $caddress = $_POST['cust_add'];
    $ctype = ($_POST['cust_type']);
    $cnumb = ($_POST['cust_num']);
   
    $result = $customers->new_customer($cfname,$clname,$caddress,$ctype,$cnumb);
    if($result){
        $id = $customers->get_Cust_id($id);
        header('location: ../index.php?page=customers');
    }
}

//function that creates a updates a rental
function update_customer(){
	$customers = new Customers();
    $cust_id = $_POST['id'];
    $cfname = ucwords($_POST['cust_fname']);
    $clname = ucwords($_POST['cust_lname']);
    $caddress = $_POST['cust_add'];
    $ctype = ($_POST['cust_type']);
    $cnumb = ($_POST['cust_num']);
    
    $result = $customers->update_customer($cfname,$clname,$caddress,$ctype,$cnumb,$cust_id);
    if($result){
        header('location: ../index.php?page=customers');
    }
}
