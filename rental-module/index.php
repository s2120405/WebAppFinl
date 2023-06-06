<!--Index of the rental page--->
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
    xmlhttp.open("GET", "event-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<div id="proList">

<?php
include_once 'classes/rentClass.php';
/* instantiate class object */
$rentals = new Rental();
?>

<?php
      switch($subpage){
                case 'add':
                    require_once 'rental-add.php';
                break;
                case 'edit':
                    require_once 'rental-edit.php';
                break;
                default:
                    require_once 'rental-read.php';
                break;
      }