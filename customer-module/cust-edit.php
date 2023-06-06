<!--Displaying the rental edit page--->

<div id="edit-wrapper">
<form name="update_user" id="proSubmit" method="post"  action="processes/process.customers.php?action=update">
            <tr>
			<td>First Name</td>
				<td><input type="text" name="cust_fname" value="<?php echo $customers->get_Fname($id);?>"> </td>
			</tr>
			<tr>
			<td>Last Name</td>
				<td><input type="text" name="cust_lname" value="<?php echo $customers->get_Lname($id);?>"></td>
			</tr>
			<tr>
			<td>Address</td>
				<td><input type="text" name="cust_add" value="<?php echo $customers->get_address($id);?>"></td>
			</tr>
			<td>Type</td>
				<td><input type="text" name="cust_type" value="<?php echo $customers->get_type($id);?>"></td>
			</tr>
			<tr>
			<td>Contact No.</td>
				<td><input type="text" name="cust_num" value="<?php echo $customers->get_Num($id);?>"></td>
			</tr>
		
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input id="prodSubmit2" type="submit" name="update" value="Update"></td>
			</tr>
			</form>
</div>

