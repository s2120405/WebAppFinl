<?php
include_once '../classes/eventClass.php';
//include '../config/config.php';
$events = new Event();

// get the q parameter from URL
$q = $_GET["q"];
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
<th>Venue  </th> <th>Event Name</th> <th>Event Start  </th> <th>Event End  </th> <th>Event Date  </th> <th>Event Type </th> <th>Modify</th>
</tr>';
$data = $events->list_events_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$Venue. '</li>';
        $hint .= '
       <tr>
        <td>'.$Venue.'</td>
        <td>'.$event_name.'</td>
        <td>'.$Event_start.'</td>
        <td>'.$Event_end.'</td>
        <td>'.$Event_date.'</td>
        <td>'.$events->get_Event_type_name($events->get_Events_type($event_id)).'</td> 
        </tr>';
      
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>