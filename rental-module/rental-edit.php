<!--Displaying the rental edit page--->

<form name="form1" method="post"  action="processes/process.rental.php?action=update">
<table width="100%">
            <tr>
				<td>Item Name</td>
				<td><input type="text" name="Item_name" value="<?php echo $rentals->get_Rental_name($id);?>"> </td>
			</tr>
			<tr>
				<td>Item Indiv Price</td>
				<td><input type="text" name="rent_price" value="<?php echo $rentals->get_price($id);?>"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="item_qty" value="<?php echo $rentals->get_item_qty($id);?>"></td>
			</tr>
		
			<tr>
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
			</tr>
			</table>
			<div id="edit-wrapper">
			<input id="prodSubmit" type="submit" name="update" value="Update">
			
			</form>
</div>

