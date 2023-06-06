<?php

//Include rental Class File
include '../classes/cart.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        new_cart();
	break;
    case 'additem':
        new_cart_item();
	break;
    case 'saveitem':
        save_cart_items();
	break;
}

//function that creates a new transactions
function new_cart(){
	$cart = new Cart();
    $cust_id = $_POST['cust_lname'];
    $date_rt = $_POST['date_rt'];
    $rid = $cart->new_cart($cust_id, $date_rt);
    if($rid){
        header('location: ../index.php?page=test&subpage=readC&id='.$rid);
    }
}

function new_cart_item(){
	$cart = new Cart();
    $cart_id= $_POST['cart_id'];
    $rental_id= $_POST['rental_id']; 
    $cust_qty= $_POST['cust_qty']; 
    $rid = $cart->new_cart_item($cart_id,$rental_id, $cust_qty);
    if($rid){
        header('location: ../index.php?page=test&subpage=readC&id='.$cart_id);
    }
}

function save_cart_items(){
	$cart = new Cart();
    $id = $_POST['cart_id'];
    $cart->save_to_inventory($id);
    $rid = $cart->save_cart_items($id);
    if($rid){
        header('location: ../index.php?page=test&subpage=readC&id='.$rid);
    }
}
