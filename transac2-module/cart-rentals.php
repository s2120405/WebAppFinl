
<div class="header1">
  <h3>Cart Transaction</h3>
  <div>
    <label for="cust_id">Customer</label>
    <span class="info-text"><?php echo $cart->get_Lname($cart->get_Cust_id($id));?></span>
  </div>



  <?php
    if($cart->get_Customer_save($id) == 0){
  ?>
<a class="btn-jsactive" onclick="document.getElementById('id01').style.display='block'">Add Product</a>
    <?php
    }
    ?>
    </div>
 
<div id="proList">
    <table id="tableP">
      <tr>
        <th>#</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Total Price</th>
      </tr>
  
<?php
$count = 1;
$count = 1;
if($cart->list_Customer_inventory($id) != false){
foreach($cart->list_Customer_inventory($id) as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><?php echo $cart->get_item_name($cart->get_rental_items($rental_id));?></td>
        <td><?php echo $cust_qty;?></td>
        <td><?php echo $cart->get_multiply($cart_inv_id);?></td>
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
<div id="id01" class="modal">
  <div #id="form-update" class="modal-content">
    <div class="container">
   
      <h2>Select Item</h2>
      <p>Provide required...</p>

      <form method="POST" id="itemForm" action="processes/process.cart.php?action=additem">
      <input type="hidden" id="cart_id" name="cart_id" value="<?php echo $id;?>"/>
        <label for="rental_id">Item</label>
            <select name="rental_id" id="rental_id">
            <?php
            $count = 1;
            $count = 1;
            if($cart->list_rental() != false){
            foreach($cart->list_rental() as $value){
            extract($value);
            ?>
                <option value="<?php echo $rental_id;?>"><?php echo $item_name;?></option>
            <?php
                }
            }
            ?>
            </select>
            <label for="cust_qty"> Quantity</label>
            <input type="number" id="cust_qty" class="input" name="cust_qty" placeholder="Quantity..">
       </form> 
      <div class="clearfix">
      <button class="submitbtn" onclick="itemSubmit()">Add</button>
        <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
        
      </div>
      </div>
    </div>
  </div>
</div>
<div id="id02" class="modal">
<form method="POST" id="itemSave" action="processes/process.cart.php?action=saveitem">
      <input type="hidden" id="cart_id" name="cart_id" value="<?php echo $id;?>"/>
      </form>
      <div #id="form-update" class="modal-content">
    <div class="container">
      <h2>Save Transaction</h2>
      <p>Are you sure you want to save this transaction?</p>
      <div class="clearfix">
        <button class="confirmbtn" onclick="saveSubmit()">Confirm</button>
        <button class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</button>
      </div>
    </div>
    </div>
       
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal_save = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }else if(event.target == modal_save){
    modal_save.style.display = "none";
  }
}
function saveSubmit() {
    window.location.href = "processes/process.cart.php?action=save&id=<?php echo $id;?>";
    document.getElementById("itemSave").submit();
  }

function itemSubmit() {
  document.getElementById("itemForm").submit();
}
</script>