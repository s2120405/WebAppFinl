<!--Index of the rental page--->

<?php
include_once 'classes/custClass.php';
/* instantiate class object */
$customers = new Customers();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'cust-add.php';
                break;
                case 'edit':
                    require_once 'cust-edit.php';
                break;
                default:
                    require_once 'cust-read.php';
                break;
      }