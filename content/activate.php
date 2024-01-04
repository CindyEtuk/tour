<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'unn_w21058580';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// First we check if the email and password exists...
if (isset($_GET['email'], $_GET['password'])) {
	if ($stmt = $con->prepare('SELECT * FROM customers WHERE email = ? AND password = ?')) {
		$stmt->bind_param('ss', $_GET['email'], $_GET['password']);
		$stmt->execute();
		// Store the result so we can check if the customer exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// Account exists with the requested email and password.
			if ($stmt = $con->prepare('UPDATE customers SET password = ? WHERE email = ? AND password = ?')) {
				// Set the new activation password to 'activated', this is how we can check if the user has activated their account.
				
				$stmt->bind_param('sss',  $_GET['email'], $_GET['password']);
				$stmt->execute();
				echo 'Your account is now activated! You can now <a href="index.html">login</a>!';
			}
		} else {
			echo 'The account is already activated or doesn\'t exist!';
		}
	}
}
?>






<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<title>Retrieve records from the products table</title>
</head>
<body>
<?php
	require_once("functions.php");
	$conn = getConnection();

	$selectSQL = "SELECT excursion_name, description,img, excursionID, price_per_person FROM excursions
				  ORDER BY excursionID";
	
	$queryresult = mysqli_query($conn,$selectSQL);

	if ($queryresult) {
		// to loop through the record set
		while ($currentrow = mysqli_fetch_assoc($queryresult)) {

		$currentrow['excursion_name'] = filter_var($currentrow['excursion_name'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$currentrow['excursion_name'] = filter_var($currentrow['excursion_name'], FILTER_SANITIZE_SPECIAL_CHARS);

		$currentrow['description'] = filter_var($currentrow['description'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		$currentrow['description'] = filter_var($currentrow['description'], FILTER_SANITIZE_SPECIAL_CHARS);

		$currentrow['price_per_person'] = filter_var($currentrow['price_per_person'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

		echo "<div>{$currentrow['excursion_name']} 
        {$currentrow['description']} {$currentrow['excursionID']} {$currentrow['img']}
         {$currentrow['price_per_person']}</div>\n";
		}
	}
?>

</body>
</html>
