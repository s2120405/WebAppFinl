<?php
include_once '../classes/rentClass.php';
//include '../config/config.php';
$rentals = new Rental();

// get the q parameter from URL
$q = $_GET["q"];
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
<th>Rental ID  </th><th>Name  </th> <th> Individual Item Price  </th> <th>Quantity  </th>
</tr>';
$data = $rentals->list_rentals_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$Venue. '</li>';
        $hint .= '
       <tr>
        <td>'.$rental_id.'</td>
        <td>'.$item_name.'</td>
        <td>'.$rent_price.'</td>
        <td>'.$item_qty.'</td>
        </tr>';
      
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>