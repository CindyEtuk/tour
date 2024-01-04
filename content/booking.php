<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>booking</title>
	<link href="../assests/stylesheet/style.css" rel="stylesheet" type="text/css">
	<link href="../assests/stylesheet/main.css" rel="stylesheet" type="text/css">
</head>
<body class="">
	
	
<?php
include_once 'functn.php';
template_header('Home');
/* Get each parameter value from the request stream and using ternary if operators 
check each parameter to see if it was set. If it is, store it in a variable. 
Otherwise store a value of null in the variable */
$excursionID = array_key_exists('excursionID', $_REQUEST) ? $_REQUEST['excursionID'] : null;
$customerID = array_key_exists('customerID', $_REQUEST) ? $_REQUEST['customerID'] : null;
$excursion_date = array_key_exists('excursion_date', $_REQUEST) ? $_REQUEST['excursion_date'] : null;
$num_guests = array_key_exists('num_guests', $_REQUEST) ? $_REQUEST['num_guests'] : null;
$total_booking_cost = array_key_exists('total_booking_cost', $_REQUEST) ? $_REQUEST['total_booking_cost'] : null;
$booking_notes = array_key_exists('booking_notes', $_REQUEST) ? $_REQUEST['booking_notes'] : null;

$excursionID = trim($excursionID);
$customerID = trim($customerID);
$excursion_date = trim($excursion_date);
$num_guests = trim($num_guests);
$total_booking_cost = trim($total_booking_cost);
$booking_notes = trim($booking_notes);

$errors = false;

// Check for required variables

if (empty($excursion_date)) {
    echo "<p>You have not entered a Date for Excursion </p>\n";
    $errors = true;
}

// Check product length
else if(strlen($excursion_date) > 50) {
    echo "<p>The product name must be no more than 50 characters</p>\n";
    $errors = true;
}
if (empty($num_guests)) {
    echo "<p>You have not entered Number of Guest</p>\n";
    $errors = true;
}


if ($errors) {
    echo "<p>Please try <a href='booking.html'>again</a></p>\n";
}
else {
	require_once "functions.php";
	$conn = getConnection();

	$insertSQL = "INSERT INTO booking (excursion_date, num_guests, total_booking_cost, booking_notes ) 
				  VALUES( ?, ? ,? , ?)";
				 		
				  
	  if ($stmt = mysqli_prepare($conn,$insertSQL)){
		// Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "ssid", $excursion_date, $num_guests,$total_booking_cost, $booking_notes );
		$queryresult = mysqli_stmt_execute($stmt);//returns boolean
		
		if (!$queryresult) {
			echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
		}
	  mysqli_close($conn);
	}
	else {
		echo "Could not prepare statement";
	}
	
	header('Location: booked.php');

	
}
?>
<?=template_footer()?>
	
</body>
</html>