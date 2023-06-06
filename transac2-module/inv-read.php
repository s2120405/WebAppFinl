<!--Displaying the current transactions page--->
<div id="proList">
<table id="tableP">
<a href="index.php?page=transac&subpage=add"> Add Transaction<i></a></i>
<tr>
<th>Transac ID  </th> <th>Item Name</th> <th>Item Name</th> <th>Quantity Ordered</th> <th>Amount</th>
</tr>

<?php
$count = 1;
$count = 1;

if($transacs->list_transac() != false){
foreach($transacs->list_transac() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $transacs->get_item_name($transacs->get_rental_itemsC($trans_id));?></td>
        <td><?php echo $cust_qty;?></td>
        <td><?php echo $transacs->get_multiply($trans_id);?></td>
      </tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>


</table>

</div>