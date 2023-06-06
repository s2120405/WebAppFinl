<!--Displaying the current rental page--->

<div id="proList">
<table id="tableP">
<a href="index.php?page=customers&subpage=add"> Add Customer<i></a></i>
<tr>
<th>First Name  </th><th>Last Name  </th> <th> Address  </th> <th>Type  </th> <th>Contact No.</th>
</tr>

<?php
$count = 1;
$count = 1;

if($customers->list_Customers() != false){
foreach($customers->list_Customers() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $cust_fname;?></td>
        <td><?php echo $cust_lname;?></td>
        <td><?php echo $cust_add;?></td>
        <td><?php echo $cust_type;?></td>
        <td><?php echo $cust_num;?></td>
        <td><a href="index.php?page=customers&subpage=edit&id=<?php echo $cust_id;?>"> Edit</a></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>


</table>

</div>