<!--Displaying the current event page--->
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
<header class="header">
  <div class="search-container">
    <span>Search</span>
    <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
  </div>
</header>
<a href="index.php?page=event&subpage=add"> Add Event <i> || </a>  </i>
<a href="index.php?page=event&subpage=readt"> Add Type <i></a></i>
<span id="search-result">
  <div id="subcontent">
    <table>
      <tr>
        <th>Venue</th>
        <th>Event Name</th>
        <th>Event Start</th>
        <th>Event End</th>
        <th>Event Date</th>
        <th>Event Type</th>
      </tr>

      <?php
      $searchResults = $events->list_events(); // Get the search results
      if ($searchResults != false) {
        foreach ($searchResults as $value) {
          extract($value);
          ?>
          <tr>
            <td><?php echo $Venue; ?></td>
            <td><a href="index.php?page=event&subpage=edit&id=<?php echo $event_id; ?>"><?php echo $event_name; ?></a></td>
            <td><?php echo $Event_start; ?></td>
            <td><?php echo $Event_end; ?></td>
            <td><?php echo $Event_date; ?></td>
            <td><?php echo $events->get_Event_type_name($events->get_Events_type($event_id)); ?></td>
          </tr>
        <?php
        }
      } else {
        echo "No Record Found.";
      }
      ?>
    </table>
  </div>
</span>
