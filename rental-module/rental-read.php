<!--Displaying the current rental page--->
<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "rental-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<header class="header">
  <div class="search-container">
    <span>Search</span>
    <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
  </div>
</header>
<span id="search-result">
<div id="proList">
<table id="tableP">
<a href="index.php?page=rentals&subpage=add"> Add Rental Item<i></a></i>
<a href="generate_user_excel.php">Download Item List(Excel)</a>
<tr>
<th>Rental ID  </th><th>Name  </th> <th> Individual Item Price  </th> <th>Quantity  </th>
</tr>

<?php
$count = 1;
$count = 1;

if($rentals->list_rental() != false){
foreach($rentals->list_rental() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $rental_id;?></td>
        <td><a href="index.php?page=rentals&subpage=edit&id=<?php echo $rental_id;?>"><?php echo $item_name;?></a></td>
        <td><?php echo $rent_price;?> PHP </td>
        <td><?php echo $item_qty;?></td>
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