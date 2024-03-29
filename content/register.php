<?php

require_once("functions.php");
$conn = getConnection();

//$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['date_of_birth']) ) {
	// One or more values are empty.
	exit('Please complete the registration form');
}

// We need to check if the account with that username exists.
if ($stmt = $conn->prepare('SELECT customerID, password FROM customers WHERE username = ?')) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    }
    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        exit('Username is not valid!');
    }
    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('Password must be between 5 and 20 characters long!');
    }
	
	if (strlen($_POST['date_of_birth']) > date("dd/mm/yyyy", mktime(0, 0, 0, date('mm'), date('dd'), date('yyyy') > 2001))) {
			('Age must be between above 18 !');
	} 

    
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		// Username doesnt exists, insert new customer account
        if ($stmt = $conn->prepare('INSERT INTO customers (username, password, email, date_of_birth ) VALUES (?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	//$uniqid = uniqid();
    $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $_POST['date_of_birth']);

	$stmt->execute();
	//echo 'You have successfully registered, you can now login!';


//mail($_POST['email'], $subject, $message, $headers);
header("Location: home.php");
} else {
	// Something is wrong with the sql statement, check to make sure customers table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure customers table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$conn->close();
?>