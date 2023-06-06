<!--Displaying the home page--->
<?php
include_once 'classes/eventClass.php';
/* instantiate class object */
$events = new Event();
include 'Calendar.php';
$calendar = new Calendar(date('Y-m-d'));

$count = 1;
$count = 1;

if($events->list_events() != false){
foreach($events->list_events() as $value){
   extract($value);
  

$calendar->add_event($event_name, $Event_date, 1, 'green');

}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/calendar.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>Event Calendar</h1>
	    	</div>
	    </nav>
		<div class="content home">
			<?=$calendar?>
		</div>
	</body>
</html>