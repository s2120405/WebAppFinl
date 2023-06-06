<!--Displaying the current transactions page--->
<div id="proList">
<table id="tableP">
<a href="index.php?page=test&subpage=add"> Add Transaction<i></a></i>
<tr>
<th>Transac ID  </th><th>Customer Name  </th> <th>Date-to-be-returned  </th>
</tr>

<?php
$count = 1;
$count = 1;

if($cart->list_cart() != false){
foreach($cart->list_cart() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=test&subpage=readC&id=<?php echo $cust_id;?>"><?php echo $cart->get_Lname($cart->get_Cust_id($cust_id));?></a></td>
        <td><?php echo $date_rt;?></td>

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