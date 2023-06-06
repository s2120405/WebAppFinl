<!--Index of the transaction page--->

<?php
include_once 'classes/cart.php';
include_once 'classes/transacClass.php';
/* instantiate class object */
$cart = new Cart();
$transacs = new Transac();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'cart-add.php';
                break;
                case 'readC':
                    require_once 'cart-rentals.php';
                break;
                default:
                    require_once 'cart-read.php';
                break;
      }