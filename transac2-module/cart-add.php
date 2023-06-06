<!--Displaying the transaction creation page--->

<form method="post" name="form1" action="processes/process.cart.php?action=new">
		<table width="100%">
    <tr>
			<label for="cust_lname">Customer</label>
            <select id="cust_lname" name="cust_lname">
              <?php
              if($cart->list_Customers() != false){
                foreach($cart->list_Customers() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $cust_id;?>"><?php echo $cust_lname;?></option>
              <?php
                }
              }
              ?>
        </select>
			</tr>
      <tr>
				<td>Date to Be Returned</td>
				<td><input type="date" name="date_rt"></td>
			</tr>
			<tr>
		
			
		
		</table>
		<div id="edit-wrapper">
		<input id="prodSubmit" type="submit" name="Submit">
</div>
	</form1>


